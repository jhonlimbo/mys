<?php

/**
 * PaymentDate form.
 *
 * @package    MyS
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PaymentDateForm extends BasePaymentDateForm {
  public function configure() {
//    unset($this['paid']);
    $this->embedRelation('Invoices');
    //if (1==1)
    //{
    //  throw new InvalidArgumentException('Este proveedor ya tiene una fecha de pago este mes.');
    //}

    //var_dump($this->paymentDate->date);

    $this->validatorSchema->setPostValidator(
       new sfValidatorCallback(array('callback' => array($this, 'isWeekend')))
      );
  }
  public function isWeekend($validator, $values) {
    $caca = (date('N', strtotime($values['date'])) >= 6);
     if($caca ==  true){
      $error = new sfValidatorError($validator, 'La fecha de pago debe ser un dia laboral');
      throw new sfValidatorErrorSchema($validator, array('date' => $error));
    }
   return $values;
  }

  public function addNewFields($number){
    $new_invoices = new BaseForm();
//TODO: Resolve incident in validation of dupplicated supplier_id in the same date.
//When a supplier is set and exist in the same date, it throws object already exists 
//must handle the error on validation and stop creating a new form
    for($i=0; $i <= $number; $i+=1){
      $invoice = new Invoice();
      $invoice->setPaymentDate($this->getObject());
      $invoice_form = new InvoiceForm($invoice);

      $new_invoices->embedForm($i,$invoice_form);
    }

    $this->embedForm('new', $new_invoices);
  }
  public function bind(array $taintedValues = null, array $taintedFiles = null){

    $new_invoices = new BaseForm();
    foreach($taintedValues['new'] as $key => $new_invoice){
      $invoice = new Invoice();
      $invoice->setPaymentDate($this->getObject());
      $invoice_form = new InvoiceForm($invoice);

      $new_invoices->embedForm($key,$invoice_form);
    }

    $this->embedForm('new',$new_invoices);

    parent::bind($taintedValues, $taintedFiles);
  }
}
