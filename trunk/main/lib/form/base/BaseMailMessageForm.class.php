<?php

/**
 * MailMessage form base class.
 *
 * @method MailMessage getObject() Returns the current form's model object
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseMailMessageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'message'    => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'MailMessage', 'column' => 'id', 'required' => false)),
      'message'    => new sfValidatorPass(),
      'created_at' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mail_message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MailMessage';
  }


}
