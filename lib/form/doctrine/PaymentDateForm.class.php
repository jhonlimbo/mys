<?php

/**
 * PaymentDate form.
 *
 * @package    MyS
 * @subpackage form
 * @author     Ferbal
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PaymentDateForm extends BasePaymentDateForm {

  // Bookmarks scheduled for deletion
  protected $scheduledForDeletion = array();

  public function configure() {
//    unset($this['paid']);
    $this->embedRelation('Invoices');

    $culture = sfContext::getInstance()->getUser()->getCulture();
//    $this->widgetSchema['date'] = new sfWidgetFormI18nDate(array('culture'=>'es_AR'));
//    $this->widgetSchema['date']= new sfWidgetFormDateJQueryUI(array("change_month" => true, "change_year" => true, 'culture' => $culture));
    $this->widgetSchema['date']= new sfWidgetFormDateJQueryUI();
    $this->widgetSchema['date']->setAttribute('readonly', 'readonly');

    // Datepicker
    $this->validatorSchema['date'] = new sfValidatorDate(array('date_format' => '~(?P<year>\d{4})-(?P<month>\d{2})-(?P<day>\d{2})~', 'date_format_error' => 'YYYY/mm/dd'));
  
    $this->widgetSchema['supplier_id'] = new sfWidgetFormDoctrineChoice(array(
            'model' => $this->getRelatedModelName('Supplier'), 
            'add_empty' => false, 
            'order_by' => array('name', 'asc')
          ));

//    Validations
//    $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback' => array($this, 'valForm'))));

  }



  public function valForm($validator, $values) {
 //   var_dump($this->defaults['new']['0']);
     // var_dump($this->object->references['Invoices']);
//    var_dump($this->taintedValues['date']['month']);
//    var_dump($this->taintedValues['date']['year']);
//    var_dump(date('Y-m',strtotime($values['date'])));
//    die;

    //Validate Weekend
    $evDate = (date('N', strtotime($values['date'])) >= 6);
    if($evDate ==  true){
      $error = new sfValidatorError($validator, 'La fecha de pago debe ser un dia laboral');
      throw new sfValidatorErrorSchema($validator, array('date' => $error));
    }
    //Validate if supplier already has a payment date for that month
    //TODO On paydate edit, When sumbit throws an error takes the paydate like new an on second submit throws that the supplier already have a paydate fot that month
    //Query to db to bring al dates of supplier_id
    $supplierPaymentDates = Doctrine_Core::getTable('PaymentDate')->getSupplierXdate($values['supplier_id']);

      //Format pay date from db to Year-month
      $formatedDbDates = array();
      foreach ($supplierPaymentDates as $dbDates) {
        $formatedDbDates[] = date('Y-m',strtotime($dbDates->date));

      }

      // Format pay date from form to Year-month
      $formatedFormDate = date('Y-m',strtotime($values['date']));

    //if($this->isNew()){
    //  $paymentDates = Doctrine_Core::getTable('PaymentDate')->getSupplierXdate($values['supplier_id']);
      
    //  $formatedDbDates = array();
    //  foreach ($paymentDates as $dbDates) {
    //    $formatedDbDates[] = date('Y-m',strtotime($dbDates->date));
    //  }
    //}
    //  $formatedFormDate = date('Y-m',strtotime($values['date']));
      



/*
      if(in_array($formatedFormDate, $formatedDbDates)){
        $error = new sfValidatorError($validator, 'Este proveedor ya tiene asignada una fecha de pago para este mes');
        throw new sfValidatorErrorSchema($validator, array('date' => $error));
      }    
    }*/
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
    if(isset($taintedValues['new'])){
      foreach($taintedValues['new'] as $key => $new_invoice){
        $invoice = new Invoice();
        $invoice->setPaymentDate($this->getObject());
        $invoice_form = new InvoiceForm($invoice);

        $new_invoices->embedForm($key,$invoice_form);
      }
    }

    $this->embedForm('new',$new_invoices);
    if (isset($taintedValues['Invoices'])) {
      foreach ($taintedValues['Invoices'] as $i => $deleteInvoiceValues) {
        if (isset($deleteInvoiceValues['delete']) && $deleteInvoiceValues['id']) {
          $this->scheduledForDeletion[$i] = $deleteInvoiceValues['id'];
        }
      }
    }

    parent::bind($taintedValues, $taintedFiles);
  }

// Updates object with provided values, dealing with evantual relation deletion

  protected function doUpdateObject($taintedValues) {
    if (count($this->scheduledForDeletion)) {
      foreach ($this->scheduledForDeletion as $index => $id) {
        $deletedInvoice = Doctrine::getTable('Invoice')->findOneById($id);
        $invoicePaymentDateId = $deletedInvoice->getPaymentDateId();
        $deletedInvoiceValue = $deletedInvoice->getValue();
        $paymentDate = Doctrine::getTable('PaymentDate')->findOneById($invoicePaymentDateId);
        $totalValue = $paymentDate->getTotalValue();
        $newValue = $totalValue - $deletedInvoiceValue;
        $paymentDate->setTotalValue($newValue);




        unset($taintedValues['Invoices'][$index]);
        unset($this->object['Invoices'][$index]);
        unset($taintedValues['new'], $this['new']);


        
        Doctrine::getTable('Invoice')->findOneById($id)->delete();
        $paymentDate->save();
      }
    }

    $this->getObject()->fromArray($taintedValues);
  }

//  Saves embedded form objects.
public function saveEmbeddedForms($con = null, $forms = null) {
    if (null === $con) {
      $con = $this->getConnection();
    }

    if (null === $forms) {
      $forms = $this->embeddedForms;
    }
    
    foreach ($forms as $form) {
      if ($form instanceof sfFormObject) {
        if (!in_array($form->getObject()->getId(), $this->scheduledForDeletion)) {
          $form->saveEmbeddedForms($con);
          $form->getObject()->save($con);
        }
      }
      else {
        $this->saveEmbeddedForms($con, $form->getEmbeddedForms());
      }
    }
  }
}
