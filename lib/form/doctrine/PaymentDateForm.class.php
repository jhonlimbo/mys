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
    unset($this['paid']);
    $this->embedRelation('Invoices');
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
