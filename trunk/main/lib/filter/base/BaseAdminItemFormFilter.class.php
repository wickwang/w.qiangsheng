<?php

/**
 * AdminItem filter form base class.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAdminItemFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'admin_category_id' => new sfWidgetFormPropelChoice(array('model' => 'AdminCategory', 'add_empty' => true)),
      'name'              => new sfWidgetFormFilterInput(),
      'url'               => new sfWidgetFormFilterInput(),
      'image'             => new sfWidgetFormFilterInput(),
      'module'            => new sfWidgetFormFilterInput(),
      'is_enabled'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'admin_category_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'AdminCategory', 'column' => 'id')),
      'name'              => new sfValidatorPass(array('required' => false)),
      'url'               => new sfValidatorPass(array('required' => false)),
      'image'             => new sfValidatorPass(array('required' => false)),
      'module'            => new sfValidatorPass(array('required' => false)),
      'is_enabled'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('admin_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdminItem';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'admin_category_id' => 'ForeignKey',
      'name'              => 'Text',
      'url'               => 'Text',
      'image'             => 'Text',
      'module'            => 'Text',
      'is_enabled'        => 'Number',
    );
  }
}
