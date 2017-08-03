<?php

class defaultActions extends sfActions {

    public function executeIndex() {

        $this->forward('sfAdminDash', 'dashboard');
    }
    
    public function executeRedirect() {
        $this->redirect('/admin.php' . $this->getRequestParameter('url'));
    }

}
