<?php

/**
 * PaymentDate
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    MyS
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PaymentDate extends BasePaymentDate {

  public function assignDefaultValues($overwrite = false) {
    parent::assignDefaultValues($overwrite);
    $this->date = date('Y-m-d');
  }
   
}