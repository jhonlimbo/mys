<?php

/**
 * PaymentDateTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PaymentDateTable extends Doctrine_Table {
  /**
   * Returns an instance of this class.
   *
   * @return object PaymentDateTable
   */
  public static function getInstance() {
      return Doctrine_Core::getTable('PaymentDate');
  }

  public function getOrdered() {
    $q = Doctrine_Query::create()
      ->from('PaymentDate p')
      ->leftJoin('p.Supplier s')
      ->orderBy('p.date, s.name ASC');

    return $q->execute();
  }

  public function getSupplierXdate($supplier) {
    $q = Doctrine_Query::create()
      ->from('PaymentDate p')
      ->where('p.supplier_id = ?', $supplier);

    return $q->execute();
  }

  public function getTotalXdate($date) {

  }    

/*
  static public function updatePayDateTotalValue($payDateId, $deletedValue) {
    $q = Doctrine_Query::create()
      ->update('PaymentDate p')
      ->set('total_value', '?', 'total_value' - $deletedValue)
      ->where('id = ?', $payDateId)->execute();
  }
*/
}