<?php

/**
 * Invoice form base class.
 *
 * @method Invoice getObject() Returns the current form's model object
 *
 * @package    MyS
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseInvoiceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'number'          => new sfWidgetFormInputText(),
      'value'           => new sfWidgetFormInputText(),
      'date'            => new sfWidgetFormDate(),
      'supplier_id'     => new sfWidgetFormInputText(),
      'building_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Building'), 'add_empty' => false)),
      'payment_date_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaymentDate'), 'add_empty' => false)),
      'paid'            => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'number'          => new sfValidatorInteger(),
      'value'           => new sfValidatorInteger(),
      'date'            => new sfValidatorDate(array('required' => false)),
      'supplier_id'     => new sfValidatorInteger(),
      'building_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Building'))),
      'payment_date_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PaymentDate'))),
      'paid'            => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Invoice', 'column' => array('number', 'supplier_id')))
    );

    $this->widgetSchema->setNameFormat('invoice[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Invoice';
  }

}
