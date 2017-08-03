<?php

/**
 * Catalogue filter form base class.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCatalogueFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'type_id'       => new sfWidgetFormFilterInput(),
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'   => new sfWidgetFormFilterInput(),
      'source_lang'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'target_lang'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_created'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_modified' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'author'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'type_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'          => new sfValidatorPass(array('required' => false)),
      'description'   => new sfValidatorPass(array('required' => false)),
      'source_lang'   => new sfValidatorPass(array('required' => false)),
      'target_lang'   => new sfValidatorPass(array('required' => false)),
      'date_created'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_modified' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'author'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('catalogue_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Catalogue';
  }

  public function getFields()
  {
    return array(
      'cat_id'        => 'Number',
      'type_id'       => 'Number',
      'name'          => 'Text',
      'description'   => 'Text',
      'source_lang'   => 'Text',
      'target_lang'   => 'Text',
      'date_created'  => 'Number',
      'date_modified' => 'Number',
      'author'        => 'Text',
    );
  }
}
