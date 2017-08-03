<?php

// Pass session id by post params for flash uploader control (Firefox)
if (isset($_POST['SYMFONY_SSID'])) {
    session_id($_POST['SYMFONY_SSID']);
    session_start();
}

require_once(dirname(__FILE__) . '/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'prod', false);
$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
