<?php

//load db config

require_once(dirname(__FILE__).'./../../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
$context = sfContext::createInstance($configuration);

$to_ver = (isset($argv[1]) && is_int(intval($argv[1]) )) ?  intval($argv[1]) : null;
MyDB::connectdb();

mysql_query("set names 'UTF-8'");

updateRelease(null);
update($to_ver);
echo "all done \n";

function update($to_ver){
    $current_verion = getDBVersion();
    $db_upgrade_ignore_versions = getDBUpgradeIgnoreVersions();
        
    $next_version = $current_verion + 1;
    $next_sql_file = dirname(__FILE__).'/upgrades/'.$next_version.'.php';
    echo "current db version: $current_verion\n";    
    
    if((is_null($to_ver) || $next_version <= $to_ver ) && file_exists($next_sql_file)) {
       
        // if not ignored
        if(!in_array($next_version, $db_upgrade_ignore_versions)){
            echo "upgrading... \n";
            $sqls = explode(';',file_get_contents($next_sql_file));
            foreach ($sqls as $sql){
    		   $sql = trim($sql);
               if(!empty($sql)){
        	       mysql_query($sql) or die(mysql_error());
               }
            }
        }else{
             echo "upgrading... ignored \n";
        }
        
    	$current_verion++;
        updateDBVersion($current_verion);
        update($to_ver);
    }
}

function updateRelease($to_ver){
    $current_verion = getReleaseDBVersion();
    $next_version = $current_verion + 1;
    $next_sql_file = dirname(__FILE__).'/release_patches/'.$next_version.'.php';
    
    if((is_null($to_ver) || $next_version <= $to_ver ) && file_exists($next_sql_file)) {
        echo "current db release patch version: $current_verion \n";    
        echo "patching... \n";
        $sqls = explode(';',file_get_contents($next_sql_file));
        foreach ($sqls as $sql){
		   $sql = trim($sql);
           if(!empty($sql)){
    	       mysql_query($sql) or die(mysql_error());
           }
        }
    	$current_verion++;
        updateReleaseDBVersion($current_verion);
        updateRelease($to_ver);
    }
}

function getDBVersion(){
    $result = mysql_query('select * from config where name = "db_version"');
    $row = mysql_fetch_array($result);
    return $row['value'];
}

function getReleaseDBVersion(){
    $result = mysql_query('select * from config where name = "release_db_version"');
    $row = mysql_fetch_array($result);
    return $row['value'];
}

function updateDBVersion($version){
    mysql_query('update config set value = "'.$version.'" where name = "db_version"');
}

function updateReleaseDBVersion($version){
    mysql_query('update config set value = "'.$version.'" where name = "release_db_version"');
}

function getDBUpgradeIgnoreVersions(){
    $data = array();
    $result = mysql_query('select * from `db_upgrade_ignore_version`');
    while($row = mysql_fetch_array($result)){
        $data[] = $row['version'];
    }
    return $data;
}