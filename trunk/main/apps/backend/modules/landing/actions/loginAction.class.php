<?php

class loginAction extends sfAction {

    public function execute($request) {
        $this->form = new signinForm();
        $this->setLayout('layout_login');
        if ($request->isMethod(sfRequest::POST)) {
            $this->dopost($request);
        }
    }

    private function dopost($request) {
        $this->form->bind($request->getParameter('signin'));
        if ($this->form->isValid()) {
            $user = AdminUserPeer::retrieveByUsername($this->form->getValue('username'));
            $_SESSION['valid_admin_user'] = $user->getId();
            $this->redirect('/admin.php');
        }
    }

}

?>
