<?php

class UserLoginHandler {

    /**
     * CSRF protect
     * 
     * @return bool
     */
    private static function _checkLoginToken() {
        $t = new Token();
        return $t->verifyCSRFToken($_POST['token'], 'loginpage');
    }

    /**
     * get user object by posted username and password
     * 
     * @return object
     */
    private static function _checkLogin() {
        $useremail = $_POST['UserEmail'];
        $password = $_POST['Password'];
        if (!isset($useremail) || !isset($password)) {
            self::_failed();
        }

        $c = new Criteria();
        $c->add(UserPeer::EMAIL, $useremail);
        $c->add(UserPeer::PASSWORD, sha1($password));
        return UserPeer::doSelectOne($c);
    }

    /**
     *  Main login process function
     * 
     */
    public function doLogin() {

        if (!self::_checkLoginToken()) {
            self::_failed();
        }

        $user = self::_checkLogin();
        if (!$user) {
            $_SESSION['tmp_error'] = 'Incorrect Login.';
            self::_failed();
        } else {
            self::_success($user);
        }
    }

    /**
     * process login success
     *
     * @param Object $user 
     */
    private static function _success($user) {
        // unset temps
        unset($_SESSION['tmp_useremail']);
        unset($_SESSION['tmp_password']);
        unset($_SESSION['tmp_token']);
        unset($_SESSION['tmp_error']);
        unset($_SESSION['tmp_remeber_pwd']);

        $_SESSION['valid_user'] = $user->getId();
        $user->setLastLogin(time());
        $user->save();
        // redirect
        if (UserPeer::hasAdminAccess()) {
            header('Location: /admin.php');
        } else { // default redirect
            header('Location: /user.php');
        }
        exit;
    }

    /**
     * process login failed
     * 
     */
    private static function _failed() {
        header('Location: /landing/login');
        exit;
    }

}

?>