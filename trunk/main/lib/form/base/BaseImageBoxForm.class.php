<?php

/**
 * ImageBox form base class.
 *
 * @method ImageBox getObject() Returns the current form's model object
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseImageBoxForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'box_type_id' => new sfWidgetFormPropelChoice(array('model' => 'BoxType', 'add_empty' => true)),
      'title'       => new sfWidgetFormInputText(),
      'url'         => new sfWidgetFormInputText(),
      'width'       => new sfWidgetFormInputText(),
      'height'      => new sfWidgetFormInputText(),
      'image_src'   => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'ImageBox', 'column' => 'id', 'required' => false)),
      'box_type_id' => new sfValidatorPropelChoice(array('model' => 'BoxType', 'column' => 'id', 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'url'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'width'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'height'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'image_src'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('image_box[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ImageBox';
  }


}
