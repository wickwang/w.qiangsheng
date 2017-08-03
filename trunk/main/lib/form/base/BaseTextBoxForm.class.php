<?php

/**
 * TextBox form base class.
 *
 * @method TextBox getObject() Returns the current form's model object
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTextBoxForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'box_type_id' => new sfWidgetFormPropelChoice(array('model' => 'BoxType', 'add_empty' => true)),
      'title'       => new sfWidgetFormInputText(),
      'body'        => new sfWidgetFormTextarea(),
      'created_at'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'TextBox', 'column' => 'id', 'required' => false)),
      'box_type_id' => new sfValidatorPropelChoice(array('model' => 'BoxType', 'column' => 'id', 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'body'        => new sfValidatorString(array('required' => false)),
      'created_at'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('text_box[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TextBox';
  }


}
