<?php

/**
 * User filter form base class.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_group_id' => new sfWidgetFormFilterInput(),
      'username'      => new sfWidgetFormFilterInput(),
      'email'         => new sfWidgetFormFilterInput(),
      'password'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_group_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'username'      => new sfValidatorPass(array('required' => false)),
      'email'         => new sfValidatorPass(array('required' => false)),
      'password'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'user_group_id' => 'Number',
      'username'      => 'Text',
      'email'         => 'Text',
      'password'      => 'Text',
    );
  }
}
