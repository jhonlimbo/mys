<?php

/**
 * Invoice form.
 *
 * @package    MyS
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BackendInvoiceForm extends BaseInvoiceForm {
  public function configure() {
/*    unset($this['date']);*/
    unset($this['payment_date_id']);
 /*   unset($this['supplier_id']);*/

  }
}
