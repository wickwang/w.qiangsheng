<?php

/**
 * Skeleton subclass for performing query and update operations on the 'config' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class ConfigPeer extends BaseConfigPeer {

    public static function isInTheModuleAction($p_module, $p_action = '') {
        $module = sfContext::getInstance()->getModuleName();
        $action = sfContext::getInstance()->getActionName();
        if ($p_module && $p_action) {
            return $module == $p_module && $p_action == $action;
        } else if ($p_module && !$p_action) {
            return $module == $p_module;
        }
        return false;
    }

}

// ConfigPeer
