<?php

/**
 * Supplier filter form base class.
 *
 * @package    MyS
 * @subpackage filter
 * @author     Ferbal
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSupplierFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address' => new sfWidgetFormFilterInput(),
      'email'   => new sfWidgetFormFilterInput(),
      'phone'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'    => new sfValidatorPass(array('required' => false)),
      'address' => new sfValidatorPass(array('required' => false)),
      'email'   => new sfValidatorPass(array('required' => false)),
      'phone'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('supplier_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Supplier';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'name'    => 'Text',
      'address' => 'Text',
      'email'   => 'Text',
      'phone'   => 'Text',
    );
  }
}
