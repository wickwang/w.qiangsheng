<?php

class oneoffsearchindexrebuildTask extends sfBaseTask {

    protected function configure() {
        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
                // add your own options here
        ));

        $this->export_name = 'searchindexrebuild';
        $this->namespace = 'admin';
        $this->name = 'oneoff-' . $this->export_name;
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
The [oneoff-insertcleantext|INFO] task does things.
Call it with:

  [php symfony admin:oneoff-searchindexrebuild|INFO]

EOF;
    }

    protected function execute($arguments = array(), $options = array()) {
        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

        // add your code here
        set_time_limit(0);
        $start_time = time();
        MyDB::connectdb();

        $sql = "select * from page";
        $result = mysql_query($sql);

        while ($row = mysql_fetch_assoc($result)) {
            $rebuild = new searchManage();
            $page_i18n_objs = PageI18nPeer::retrieveById($row['id']);

            foreach ($page_i18n_objs as $page_i18n_obj) {
                $search_index_page_title = $rebuild->normalizeText($page_i18n_obj->getTitle());
                $search_index_page_summary = $rebuild->normalizeText($page_i18n_obj->getSummary());
                $search_index_page_body = $rebuild->normalizeText($page_i18n_obj->getBody());

                //重构title seachindex
                $seach_index = SearchindexPeer::retrieveByPageIdLanguage($page_i18n_obj->getId(), $page_i18n_obj->getCulture());
                if (!$seach_index) {
                    $seach_index = new Searchindex();
                }
                $seach_index->setPageId($page_i18n_obj->getId());
                $seach_index->setTitle($search_index_page_title);
                $seach_index->setSummary($search_index_page_summary);
                $seach_index->setBody($search_index_page_body);
                $seach_index->setLanguage($page_i18n_obj->getCulture());
                $seach_index->save();
            }
            echo '.';
            flush();
        }

        echo "\nDone. Time consuming: " . (time() - $start_time) . "sec\n";
    }

}

