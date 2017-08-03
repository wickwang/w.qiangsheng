<?php

/**
 * SettingGeneral form base class.
 *
 * @method SettingGeneral getObject() Returns the current form's model object
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSettingGeneralForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'system_email_smtp_host'     => new sfWidgetFormInputText(),
      'system_email_smtp_port'     => new sfWidgetFormInputText(),
      'system_email_smtp_use_ssl'  => new sfWidgetFormInputText(),
      'system_email_smtp_username' => new sfWidgetFormInputText(),
      'system_email_smtp_password' => new sfWidgetFormInputText(),
      'system_email_from_accout'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorPropelChoice(array('model' => 'SettingGeneral', 'column' => 'id', 'required' => false)),
      'system_email_smtp_host'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'system_email_smtp_port'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'system_email_smtp_use_ssl'  => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'system_email_smtp_username' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'system_email_smtp_password' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'system_email_from_accout'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('setting_general[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SettingGeneral';
  }


}
