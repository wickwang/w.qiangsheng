<?php

/**
 * Log form base class.
 *
 * @method Log getObject() Returns the current form's model object
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLogForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'log_event_id' => new sfWidgetFormPropelChoice(array('model' => 'LogEvent', 'add_empty' => true)),
      'category'     => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Log', 'column' => 'id', 'required' => false)),
      'log_event_id' => new sfValidatorPropelChoice(array('model' => 'LogEvent', 'column' => 'id', 'required' => false)),
      'category'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'description'  => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'created_at'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Log';
  }


}
