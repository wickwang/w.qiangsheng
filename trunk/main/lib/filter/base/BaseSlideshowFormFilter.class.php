<?php

/**
 * Slideshow filter form base class.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseSlideshowFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'         => new sfWidgetFormFilterInput(),
      'image_width'  => new sfWidgetFormFilterInput(),
      'image_height' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'         => new sfValidatorPass(array('required' => false)),
      'image_width'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'image_height' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('slideshow_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Slideshow';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'name'         => 'Text',
      'image_width'  => 'Number',
      'image_height' => 'Number',
    );
  }
}
