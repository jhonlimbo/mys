<?php

/**
 * Invoice form.
 *
 * @package    MyS
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InvoiceForm extends BaseInvoiceForm {
  public function configure() {
    unset($this['date']);
    unset($this['payment_date_id']);
    unset($this['supplier_id']);
    unset($this['paid']);

    $this->widgetSchema['building_id'] = new sfWidgetFormDoctrineChoice(array(
          'model' => $this->getRelatedModelName('Building'), 
          'add_empty' => false, 
          'order_by' => array('name', 'asc')
         ));

    if ($this->object->exists()) {
          $this->widgetSchema['delete'] = new sfWidgetFormInputCheckbox();
          $this->validatorSchema['delete'] = new sfValidatorPass();
    }
  }
}
