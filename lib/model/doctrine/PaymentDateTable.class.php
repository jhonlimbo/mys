<?php

/**
 * PaymentDateTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PaymentDateTable extends Doctrine_Table
{
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
        ->orderBy('p.date ASC');

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


}