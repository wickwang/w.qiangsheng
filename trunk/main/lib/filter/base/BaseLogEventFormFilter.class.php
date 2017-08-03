<?php

/**
 * LogEvent filter form base class.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseLogEventFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'category' => new sfWidgetFormFilterInput(),
      'source1'  => new sfWidgetFormFilterInput(),
      'source2'  => new sfWidgetFormFilterInput(),
      'action'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'category' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'source1'  => new sfValidatorPass(array('required' => false)),
      'source2'  => new sfValidatorPass(array('required' => false)),
      'action'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('log_event_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LogEvent';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'category' => 'Number',
      'source1'  => 'Text',
      'source2'  => 'Text',
      'action'   => 'Text',
    );
  }
}
