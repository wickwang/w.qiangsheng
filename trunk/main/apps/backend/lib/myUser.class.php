<?php

class myUser extends sfBasicSecurityUser {

    public function signIn($username, $remember = false, $con = null) {
        // signin
        $user = MUserPeer::retrieveByUsername($username);
        $this->use = $user;
        $this->setAttribute('user', $user);
        $this->setAuthenticated(true);
        $this->clearCredentials();
    }

    public function signOut() {
        $this->getAttributeHolder()->removeNamespace('sfGuardSecurityUser');
        $this->user = null;
        $this->setAuthenticated(false);
    }

    public function __toString() {
        return $this->getAttribute('user') ? $this->getAttribute('user')->getUserName() : '';
    }

}
