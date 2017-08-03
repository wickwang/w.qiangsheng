<?php

/**
 * SlideshowItem form base class.
 *
 * @method SlideshowItem getObject() Returns the current form's model object
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSlideshowItemForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'slideshow_id' => new sfWidgetFormPropelChoice(array('model' => 'Slideshow', 'add_empty' => true)),
      'title'        => new sfWidgetFormInputText(),
      'url'          => new sfWidgetFormInputText(),
      'photo'        => new sfWidgetFormInputText(),
      'image_token'  => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormTextarea(),
      'position'     => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormInputText(),
      'updated_at'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'SlideshowItem', 'column' => 'id', 'required' => false)),
      'slideshow_id' => new sfValidatorPropelChoice(array('model' => 'Slideshow', 'column' => 'id', 'required' => false)),
      'title'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'url'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'photo'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'image_token'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'  => new sfValidatorString(array('required' => false)),
      'position'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'updated_at'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('slideshow_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SlideshowItem';
  }


}
