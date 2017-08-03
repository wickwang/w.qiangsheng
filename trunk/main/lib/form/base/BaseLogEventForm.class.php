<?php

/**
 * LogEvent form base class.
 *
 * @method LogEvent getObject() Returns the current form's model object
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLogEventForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'category' => new sfWidgetFormInputText(),
      'source1'  => new sfWidgetFormInputText(),
      'source2'  => new sfWidgetFormInputText(),
      'action'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorPropelChoice(array('model' => 'LogEvent', 'column' => 'id', 'required' => false)),
      'category' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'source1'  => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'source2'  => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'action'   => new sfValidatorString(array('max_length' => 500, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('log_event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LogEvent';
  }


}
