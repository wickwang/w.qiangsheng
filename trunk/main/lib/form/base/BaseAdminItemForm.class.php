<?php

/**
 * AdminItem form base class.
 *
 * @method AdminItem getObject() Returns the current form's model object
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAdminItemForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'admin_category_id' => new sfWidgetFormPropelChoice(array('model' => 'AdminCategory', 'add_empty' => true)),
      'name'              => new sfWidgetFormInputText(),
      'url'               => new sfWidgetFormInputText(),
      'image'             => new sfWidgetFormInputText(),
      'module'            => new sfWidgetFormInputText(),
      'is_enabled'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'AdminItem', 'column' => 'id', 'required' => false)),
      'admin_category_id' => new sfValidatorPropelChoice(array('model' => 'AdminCategory', 'column' => 'id', 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'url'               => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'image'             => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'module'            => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'is_enabled'        => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('admin_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdminItem';
  }


}
