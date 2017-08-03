<?php

/**
 * Log filter form base class.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseLogFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'log_event_id' => new sfWidgetFormPropelChoice(array('model' => 'LogEvent', 'add_empty' => true)),
      'category'     => new sfWidgetFormFilterInput(),
      'description'  => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'log_event_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'LogEvent', 'column' => 'id')),
      'category'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'description'  => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Log';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'log_event_id' => 'ForeignKey',
      'category'     => 'Number',
      'description'  => 'Text',
      'created_at'   => 'Number',
    );
  }
}
