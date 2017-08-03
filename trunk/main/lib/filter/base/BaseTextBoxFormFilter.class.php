<?php

/**
 * TextBox filter form base class.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTextBoxFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'box_type_id' => new sfWidgetFormPropelChoice(array('model' => 'BoxType', 'add_empty' => true)),
      'title'       => new sfWidgetFormFilterInput(),
      'body'        => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'box_type_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'BoxType', 'column' => 'id')),
      'title'       => new sfValidatorPass(array('required' => false)),
      'body'        => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('text_box_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TextBox';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'box_type_id' => 'ForeignKey',
      'title'       => 'Text',
      'body'        => 'Text',
      'created_at'  => 'Number',
    );
  }
}
