<?php

class Theuser {

    /**
     * Get cucrent admin_user id/ user name
     *
     * @return string
     */
    public static function getCurrentAdminUserEmail() {
        $user = self::getCurrentUser();
        return $user->getEmail();
    }

    /**
     * Get current admin_user int id
     * 
     * @return int or null 
     */
    public static function getCurrentAdminUserIntId() {
        $result = null;
        $user = self::getCurrentAdminUser();
        if ($user) {
            $result = $user->getId();
        }
        return $result;
    }

    /**
     * Get current admin_user object
     *
     * @return object
     */
    public static function getCurrentAdminUser() {
        static $result;

        if (!isset($result)) {
            $user_id = isset($_SESSION['valid_admin_user']) ? $_SESSION['valid_admin_user'] : '';
            $c = new Criteria();
            $c->add(AdminUserPeer::ID, $user_id);
            $result = AdminUserPeer::doSelectOne($c);
        }
        return $result;
    }

}

?>