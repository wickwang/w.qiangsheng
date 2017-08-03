<?php

require_once dirname(__FILE__) . '/../lib/setting_generalGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/setting_generalGeneratorHelper.class.php';

/**
 * setting_general actions.
 *
 * @package    armstrongpoint
 * @subpackage setting_general
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class setting_generalActions extends autoSetting_generalActions {

    public function preExecute() {
        $this->configuration = new setting_generalGeneratorConfiguration();

        if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName()))) {
            $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
        }

        $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

        $this->helper = new setting_generalGeneratorHelper();

    }

    public function executeIndex(sfWebRequest $request) {
        $this->redirect('/admin.php/setting_general/1/edit');
    }

    public function executeFilter(sfWebRequest $request) {
        $this->redirect('/admin.php/setting_general/1/edit');
    }

    public function executeNew(sfWebRequest $request) {
        $this->redirect('/admin.php/setting_general/1/edit');
    }

    public function executeCreate(sfWebRequest $request) {
        $this->redirect('/admin.php/setting_general/1/edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $this->redirect('/admin.php/setting_general/1/edit');
    }

    protected function executeBatchDelete(sfWebRequest $request) {
        $this->redirect('/admin.php/setting_general/1/edit');
    }

}
