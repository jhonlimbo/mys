<?php

/**
 * Invoice filter form base class.
 *
 * @package    MyS
 * @subpackage filter
 * @author     Ferbal
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseInvoiceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'number'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'value'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'supplier_id'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'building_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Building'), 'add_empty' => true)),
      'payment_date_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaymentDate'), 'add_empty' => true)),
      'paid'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'number'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'value'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'date'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'supplier_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'building_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Building'), 'column' => 'id')),
      'payment_date_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PaymentDate'), 'column' => 'id')),
      'paid'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('invoice_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Invoice';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'number'          => 'Number',
      'value'           => 'Number',
      'date'            => 'Date',
      'supplier_id'     => 'Number',
      'building_id'     => 'ForeignKey',
      'payment_date_id' => 'ForeignKey',
      'paid'            => 'Boolean',
    );
  }
}
