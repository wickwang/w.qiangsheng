<?php

/**
 * Skeleton subclass for representing a row from the 'user' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class User extends BaseUser {

    public function __toString() {
        return $this->getUsername();
    }

    public function checkPassword($password) {
        return sha1($password) == $this->getPassword();
    }

}

// User
