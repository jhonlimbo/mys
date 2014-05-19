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
  public function configure() {
//    unset($this['paid']);
    $this->embedRelation('Invoices');
//    var_dump($this->embedRelation('Invoices'));die;

    $culture = sfContext::getInstance()->getUser()->getCulture();
//    $this->widgetSchema['date'] = new sfWidgetFormI18nDate(array('culture'=>'es_AR'));
//    $this->widgetSchema['date']= new sfWidgetFormDateJQueryUI(array("change_month" => true, "change_year" => true, 'culture' => $culture));
    $this->widgetSchema['date']= new sfWidgetFormDateJQueryUI();
    $this->widgetSchema['date']->setAttribute('readonly', 'readonly');
    // Datepicker
    $this->validatorSchema['date'] = new sfValidatorDate(array('date_format' => '~(?P<day>\d{2})/(?P<month>\d{2})/(?P<year>\d{4})~', 'date_format_error' => 'dd/mm/YYYY'));
  
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
        var_dump($dbDates->id);
      }
      die;
      var_dump($values);
    var_dump($formatedDbDates);die;      
      // Format pay date from form to Year-month
      $formatedFormDate = date('Y-m',strtotime($values['date']));

      //if()


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

    parent::bind($taintedValues, $taintedFiles);
  }
}
