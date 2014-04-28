<?php // apps/frontend/modules/paymentDate/actions/actions.class.php

class paymentDateActions extends sfActions{

  public function executeIndex(sfWebRequest $request){

    var_dump($request->getParameterHolder()->getAll());
    $this->paymentDates = Doctrine_Core::getTable('PaymentDate')->getOrdered();
    //Pager
    //$this->pager = new sfDoctrinePager(
    //  'PaymentDate',
    //  sfConfig::get('max_pay_date_on_homepage')
    //);
    //$this->pager->setQuery($this->paymentDates);
    //$this->pager->setPage($request->getParameter('page', 1));
    //$this->pager->init();

    // New Paydate form
    $paymentDate = new PaymentDate();
    $this->form = new PaymentDateForm($paymentDate);

    $this->form->addNewFields(0);

  }

  public function executeShow(sfWebRequest $request){
    $this->paymentDates = Doctrine_Core::getTable('PaymentDate')->findAll();
  }

  public function executeEdit(sfWebRequest $request){
    #TODO: translate logs
    var_dump($request->getParameterHolder()->getAll());
    $this->forward404Unless($paymentDate = Doctrine::getTable('PaymentDate')->find(array($request->getParameter('id'))), sprintf('La Fecha de Pago no existe (%s).', $request->getParameter('id')));
    $this->form = new PaymentDateForm($paymentDate);
    $this->form->addNewFields(0);
    $this->setTemplate('index');

  }

  public function executeCreate(sfWebRequest $request) {
    $this->form = new PaymentDateForm();
//    var_dump($request->getParameterHolder()->getAll());die;
    $this->processForm($request, $this->form);

  }

  public function executeUpdate(sfWebRequest $request){
    $this->processForm($request, $this->form);
    //    $this->form = new PaymentDateForm($this->getRoute()->getObject());
   // $this->processForm($request, $this->form);
  }

public function processForm(sfWebRequest $request, sfForm $form) {
    $tainted_values = $request->getParameter('payment_date');
      //  var_dump($request->getParameterHolder()->getAll());die;
    $paymentDate = Doctrine::getTable('PaymentDate')->find($tainted_values['id']);
//    $this->form = new PaymentDateForm($paymentDate);

    if ($request->isMethod('post') && $this->form->bindAndSave($tainted_values)) {
      $this->redirect('homepage');
    }

    $this->setTemplate('index');  
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

  public function executeAdd(sfWebRequest $request){
    $this->forward404unless($request->isXmlHttpRequest());
    $number = intval($request->getParameter("num"));

    $this->form = new PaymentDateForm();

    $this->form->addNewFields($number);

    return $this->renderPartial('addNew',array('form' => $this->form, 'number' => $number));
  }

//  public function executeNew(sfWebRequest $request){
//    $paymentDate = new PaymentDate();
//    $this->form = new PaymentDateForm($paymentDate);

//    $this->form->addNewFields(0);

//    $this->setTemplate('edit');
//  }

}