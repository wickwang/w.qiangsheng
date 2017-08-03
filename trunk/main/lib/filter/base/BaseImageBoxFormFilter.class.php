<?php

/**
 * ImageBox filter form base class.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseImageBoxFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'box_type_id' => new sfWidgetFormPropelChoice(array('model' => 'BoxType', 'add_empty' => true)),
      'title'       => new sfWidgetFormFilterInput(),
      'url'         => new sfWidgetFormFilterInput(),
      'width'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'height'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image_src'   => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'box_type_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'BoxType', 'column' => 'id')),
      'title'       => new sfValidatorPass(array('required' => false)),
      'url'         => new sfValidatorPass(array('required' => false)),
      'width'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'height'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'image_src'   => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('image_box_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ImageBox';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'box_type_id' => 'ForeignKey',
      'title'       => 'Text',
      'url'         => 'Text',
      'width'       => 'Number',
      'height'      => 'Number',
      'image_src'   => 'Text',
      'created_at'  => 'Number',
    );
  }
}
