<?php // apps/frontend/modules/paymentDate/actions/actions.class.php

class paymentDateActions extends sfActions{

  public function executeIndex(sfWebRequest $request){

 //   var_dump($request->getParameterHolder()->getAll());
    $this->paymentDates = Doctrine_Core::getTable('PaymentDate')->getOrdered();

//    New Paydate form
//    if (!$request->isMethod('post')) {
      $paymentDate = new PaymentDate();
   
      $this->form = new PaymentDateForm($paymentDate);
      $this->form->formTitle = 'Nueva';
//    Set initial quiuantity of invoices on new form
      $this->form->numberOfInvoices = '3';
      $this->form->addNewFields($this->form->numberOfInvoices);


//   }
  }



  public function executeShow(sfWebRequest $request){
/*    $this->paymentDates = Doctrine_Core::getTable('PaymentDate')->findAll();*/
  }

  public function executeCreate(sfWebRequest $request) {
    $this->form = new PaymentDateForm();

    $this->processForm($request, $this->form);
  }

  public function executeEdit(sfWebRequest $request){
    #TODO: translate logs
//    var_dump($request->getParameterHolder()->getAll());
//    $this->paymentDate = $this->getRoute()->getObject();


    $this->forward404Unless($paymentDate = Doctrine::getTable('PaymentDate')->find(array($request->getParameter('id'))), sprintf('La Fecha de Pago no existe (%s).', $request->getParameter('id')));
    $this->form = new PaymentDateForm($paymentDate);
//    $this->form->addNewFields(0);
    $this->form->formTitle = "Editar";
    $this->setTemplate('index');

  }

  public function executeUpdate(sfWebRequest $request){
//  var_dump($this->form);die;
    $this->processForm($request, $this->form);

// $this->form = new PaymentDateForm($this->getRoute()->getObject());
// $this->processForm($request, $this->form);
  }

  public function executeDelete(sfWebRequest $request) {
  //  var_dump($paymentDate);die;
  //  $out = paymentDate::getJsonFormat();
  //  $this->writeFile($out);
    $paymentDate = $this->getRoute()->getObject();
    $cololo = $this->getRoute()->getAction();
    var_dump($cololo);die;
    $paymentDate->delete();
    $this->redirect('homepage');
  }

  public function processForm(sfWebRequest $request, sfForm $form) {
    $tainted_values = $request->getParameter('payment_date');

    // Get total_value of supplier invoices
    $invoiceValues = array();
    $sumNew = array();
    if(isset($tainted_values['Invoices'])) {
      foreach ($tainted_values['Invoices'] as $invoice) {
        $invoiceValues[] = $invoice['value'];
      }
    }

    if(isset($tainted_values['new'])){
      $tainted_values['new'] = $this->cleanUpNewInvoices($tainted_values['new']);

      foreach ($tainted_values['new'] as $invoiceNew) {
        $bobo = $tainted_values['new'];
        $sumNew[] = $invoiceNew['value'];
      }
    }
//    var_dump($tainted_values);die;
      // var_dump($request->getParameterHolder()->getAll());die;
//    var_dump($form->getEmbeddedForms());die;
//    if ($tainted_values['id'] == '') {
  
//    }

    //add total_value to tainted_values for save it on DB
    $tainted_values['total_value'] = array_sum($invoiceValues) + array_sum($sumNew);

    // var_dump($request->getParameterHolder()->getAll());die;
    $paymentDate = Doctrine::getTable('PaymentDate')->find($tainted_values['id']);
    $this->form = new PaymentDateForm($paymentDate);

    if ($request->isMethod('post') && $this->form->bindAndSave($tainted_values)) {

      $this->redirect('homepage');
    }
    $this->form->formTitle = $this->form->isNew()? "Nueva" : 'Editar';
    $this->setTemplate('index');  
  }

  public function compareInvoicesFromDb(){

  }


// Cleanup empty invoices (No number and value)
  public function cleanUpNewInvoices($tainted_values){
    foreach ($tainted_values as $invoice) {
      if ($invoice['number'] !== '' || $invoice['value'] !== '') {
        $tainted_values['new'][] = $invoice;
      }
    }
    if (!isset($tainted_values['new'])) {
     $this->redirect('homepage'); 
    }
    return($tainted_values['new']);
  }

  public function executeAdd(sfWebRequest $request){
    $this->forward404unless($request->isXmlHttpRequest());
    $number = intval($request->getParameter("num"));

    $this->form = new PaymentDateForm();

    $this->form->addNewFields($number);

    return $this->renderPartial('addNew',array('form' => $this->form, 'number' => $number));
  }


//  public function executeSubmit(sfWebRequest $request){
//    $tainted_values = $request->getParameter('payment_date');
//    $paymentDate = Doctrine::getTable('PaymentDate')->find($tainted_values['id']);

//    $this->form = new PaymentDateForm($paymentDate);

//    if ($request->isMethod('post') && $this->form->bindAndSave($tainted_values))
//      $this->redirect('homepage');

//  Redirect to edit. I'll try not to use it
//    $this->setTemplate('edit');
//    Get back to index form

//    $this->setTemplate('index');
//  }



}