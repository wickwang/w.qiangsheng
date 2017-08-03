<?php

/**
 * Skeleton subclass for performing query and update operations on the 'admin_user' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AdminUserPeer extends BaseAdminUserPeer {

    public static function hasAdminAccess() {
        return Theuser::getCurrentAdminUser() ? true : false;
    }

    public static function hasAdminModuleAccess() {
        return Theuser::getCurrentAdminUser();
    }

    public static function retrieveByUsername($username) {
        $c = new Criteria();
        $c->add(self::USERNAME, $username);
        return self::doSelectOne($c);
    }

}

// AdminUserPeer
