<?php

/**
 * TransUnit filter form base class.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTransUnitFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cat_id'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'source'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'target'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comments'      => new sfWidgetFormFilterInput(),
      'date_added'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_modified' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'author'        => new sfWidgetFormFilterInput(),
      'translated'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'cat_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id'            => new sfValidatorPass(array('required' => false)),
      'source'        => new sfValidatorPass(array('required' => false)),
      'target'        => new sfValidatorPass(array('required' => false)),
      'comments'      => new sfValidatorPass(array('required' => false)),
      'date_added'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_modified' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'author'        => new sfValidatorPass(array('required' => false)),
      'translated'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('trans_unit_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TransUnit';
  }

  public function getFields()
  {
    return array(
      'msg_id'        => 'Number',
      'cat_id'        => 'Number',
      'id'            => 'Text',
      'source'        => 'Text',
      'target'        => 'Text',
      'comments'      => 'Text',
      'date_added'    => 'Number',
      'date_modified' => 'Number',
      'author'        => 'Text',
      'translated'    => 'Number',
    );
  }
}
