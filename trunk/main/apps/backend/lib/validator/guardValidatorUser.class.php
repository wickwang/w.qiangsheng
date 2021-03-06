<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Validates a user login.
 * 
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardValidatorUser.class.php 15779 2009-02-25 17:37:38Z Kris.Wallsmith $
 */
class guardValidatorUser extends sfValidatorBase {

    /**
     * Configures the user validator.
     * 
     * Available options:
     * 
     *  * username_field      Field name of username field (username by default)
     *  * password_field      Field name of password field (password by default)
     *  * throw_global_error  Throws a global error if true (false by default)
     * 
     * @see sfValidatorBase
     */
    public function configure($options = array(), $messages = array()) {
        $this->addOption('username_field', 'username');
        $this->addOption('password_field', 'password');
        $this->addOption('throw_global_error', false);

        $this->setMessage('invalid', '用户密码错误.');
    }

    /**
     * @see sfValidatorBase
     */
    protected function doClean($values) {
        // only validate if username and password are both present
        if (isset($values[$this->getOption('username_field')]) && isset($values[$this->getOption('password_field')])) {
            $username = $values[$this->getOption('username_field')];
            $password = $values[$this->getOption('password_field')];

            // admin user exists?
            if ($admin_user = AdminUserPeer::retrieveByUsername($username)) {
                // password is ok?
                if ($admin_user->checkPassword($password)) {
                    return array_merge($values, array('user' => $admin_user));
                }
            }

            if ($this->getOption('throw_global_error')) {
                throw new sfValidatorError($this, 'invalid');
            }

            throw new sfValidatorErrorSchema($this, array(
                $this->getOption('username_field') => new sfValidatorError($this, 'invalid'),
            ));
        }

        // assume a required error has already been thrown, skip validation
        return $values;
    }

}
