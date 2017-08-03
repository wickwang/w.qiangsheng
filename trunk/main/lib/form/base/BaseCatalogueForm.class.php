<?php

/**
 * Catalogue form base class.
 *
 * @method Catalogue getObject() Returns the current form's model object
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCatalogueForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cat_id'        => new sfWidgetFormInputHidden(),
      'type_id'       => new sfWidgetFormInputText(),
      'name'          => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormInputText(),
      'source_lang'   => new sfWidgetFormInputText(),
      'target_lang'   => new sfWidgetFormInputText(),
      'date_created'  => new sfWidgetFormInputText(),
      'date_modified' => new sfWidgetFormInputText(),
      'author'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'cat_id'        => new sfValidatorPropelChoice(array('model' => 'Catalogue', 'column' => 'cat_id', 'required' => false)),
      'type_id'       => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 100)),
      'description'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'source_lang'   => new sfValidatorString(array('max_length' => 100)),
      'target_lang'   => new sfValidatorString(array('max_length' => 100)),
      'date_created'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'date_modified' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'author'        => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('catalogue[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Catalogue';
  }


}
