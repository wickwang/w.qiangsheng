<?php

/**
 * MailMessage filter form base class.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseMailMessageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'message'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'message'    => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('mail_message_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MailMessage';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'message'    => 'Text',
      'created_at' => 'Number',
    );
  }
}
