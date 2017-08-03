<?php

class logoutAction extends sfAction {

    public function execute($request) {
        session_unset();
        session_destroy();
        session_regenerate_id();

        header('location: ' . $_SERVER["HTTP_REFERER"] . '');
        exit;
    }

}