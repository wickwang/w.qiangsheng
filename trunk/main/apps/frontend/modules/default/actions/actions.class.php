<?php

class defaultActions extends sfActions {

    public function executeIndex() {
        $this->forward('home', 'index');
    }

    public function executeError403() {
        header('HTTP/1.1 403 Error');
        echo '<h1>Error</h1>';
        exit;
    }

    public function executeError404() {
        header('HTTP/1.1 404 Error');
        echo '<h1>Error</h1>';
        exit;
    }

    public function executeRedirect() {
        $this->redirect('/index.php' . $this->getRequestParameter('url'));
    }

}
