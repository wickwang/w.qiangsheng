<?php

/**
 * SettingGeneral form.
 *
 * @package    armstrongpoint
 * @subpackage form
 * @author     Your name here
 */
class SettingGeneralForm extends BaseSettingGeneralForm {

    public function configure() {
        parent::configure();
        
        $this->widgetSchema['system_email_smtp_use_ssl'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => 1));
        $this->widgetSchema['system_email_smtp_password'] = new sfWidgetFormInputPassword(array('always_render_empty' => false));
        
        $this->validatorSchema['system_email_smtp_use_ssl'] = new sfValidatorPass();
        $this->validatorSchema['system_email_smtp_password'] = new sfValidatorPass();
    }

}
