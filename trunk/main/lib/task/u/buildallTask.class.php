<?php

/**
 * This will replace 'CURRENT_TIMESTAMP' with '0' on schema.yml
 *
 */
class buildallTask extends sfBaseTask {

    protected function configure() {
        // // add your own arguments here
        // $this->addArguments(array(
        //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
        // ));

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
                // add your own options here
        ));

        $this->namespace = 'u';
        $this->name = 'build-all';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
The [export-orders|INFO] task does things.
Call it with:

  [php symfony u:build-all|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array()) {
        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

        sfContext::createInstance(sfProjectConfiguration::getApplicationConfiguration('backend', 'dev', true));

        // add your code here
        set_time_limit(0);

        echo "===== build-schema =====\r\n";
        echo exec('symfony propel:build-schema');

        echo "\r\n\r\n===== build-propel-class =====\r\n";
        echo exec('symfony propel:build --all-classes');

        echo "\r\n\r\nDone\r\n";
    }
    
}
