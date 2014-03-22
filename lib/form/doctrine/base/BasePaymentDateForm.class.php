<?php

/**
 * PaymentDate form base class.
 *
 * @method PaymentDate getObject() Returns the current form's model object
 *
 * @package    MyS
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePaymentDateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'date'        => new sfWidgetFormDate(),
      'supplier_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Supplier'), 'add_empty' => false)),
      'paid'        => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'date'        => new sfValidatorDate(),
      'supplier_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Supplier'), 'required' => false)),
      'paid'        => new sfValidatorBoolean(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'PaymentDate', 'column' => array('date', 'supplier_id')))
    );

    $this->widgetSchema->setNameFormat('payment_date[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PaymentDate';
  }

}
