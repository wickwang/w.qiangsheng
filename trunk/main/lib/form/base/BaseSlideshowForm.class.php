<?php

/**
 * Slideshow form base class.
 *
 * @method Slideshow getObject() Returns the current form's model object
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSlideshowForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInputText(),
      'image_width'  => new sfWidgetFormInputText(),
      'image_height' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Slideshow', 'column' => 'id', 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'image_width'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'image_height' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('slideshow[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Slideshow';
  }


}
