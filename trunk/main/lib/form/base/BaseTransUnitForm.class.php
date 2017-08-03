<?php

/**
 * TransUnit form base class.
 *
 * @method TransUnit getObject() Returns the current form's model object
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTransUnitForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'msg_id'        => new sfWidgetFormInputHidden(),
      'cat_id'        => new sfWidgetFormInputText(),
      'id'            => new sfWidgetFormInputText(),
      'source'        => new sfWidgetFormTextarea(),
      'target'        => new sfWidgetFormTextarea(),
      'comments'      => new sfWidgetFormTextarea(),
      'date_added'    => new sfWidgetFormInputText(),
      'date_modified' => new sfWidgetFormInputText(),
      'author'        => new sfWidgetFormInputText(),
      'translated'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'msg_id'        => new sfValidatorPropelChoice(array('model' => 'TransUnit', 'column' => 'msg_id', 'required' => false)),
      'cat_id'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'id'            => new sfValidatorString(array('max_length' => 255)),
      'source'        => new sfValidatorString(),
      'target'        => new sfValidatorString(),
      'comments'      => new sfValidatorString(array('required' => false)),
      'date_added'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'date_modified' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'author'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'translated'    => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
    ));

    $this->widgetSchema->setNameFormat('trans_unit[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TransUnit';
  }


}
