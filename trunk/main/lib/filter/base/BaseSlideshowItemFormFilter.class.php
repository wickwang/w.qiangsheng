<?php

/**
 * SlideshowItem filter form base class.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseSlideshowItemFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'slideshow_id' => new sfWidgetFormPropelChoice(array('model' => 'Slideshow', 'add_empty' => true)),
      'title'        => new sfWidgetFormFilterInput(),
      'url'          => new sfWidgetFormFilterInput(),
      'photo'        => new sfWidgetFormFilterInput(),
      'image_token'  => new sfWidgetFormFilterInput(),
      'description'  => new sfWidgetFormFilterInput(),
      'position'     => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterInput(),
      'updated_at'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'slideshow_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Slideshow', 'column' => 'id')),
      'title'        => new sfValidatorPass(array('required' => false)),
      'url'          => new sfValidatorPass(array('required' => false)),
      'photo'        => new sfValidatorPass(array('required' => false)),
      'image_token'  => new sfValidatorPass(array('required' => false)),
      'description'  => new sfValidatorPass(array('required' => false)),
      'position'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('slideshow_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SlideshowItem';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'slideshow_id' => 'ForeignKey',
      'title'        => 'Text',
      'url'          => 'Text',
      'photo'        => 'Text',
      'image_token'  => 'Text',
      'description'  => 'Text',
      'position'     => 'Number',
      'created_at'   => 'Number',
      'updated_at'   => 'Number',
    );
  }
}
