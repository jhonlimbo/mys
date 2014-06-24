<?php

require_once dirname(__FILE__).'/../lib/invoiceGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/invoiceGeneratorHelper.class.php';

/**
 * invoice actions.
 *
 * @package    MyS
 * @subpackage invoice
 * @author     Ferbal
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class invoiceActions extends autoInvoiceActions {

  protected function addSortQuery($query) {
    if (array(null, null) == ($sort = $this->getSort())) {
      return;
    }

    if (!in_array(strtolower($sort[1]), array('asc', 'desc'))) {
      $sort[1] = 'asc';
    }

    switch ($sort[0]) {
      case 'supplier':
      $sort[0] = 's.name';
      break;
      case 'building':
      $sort[0] = 'b.name';
      break;
      case 'payment_date':
      $sort[0] = 'p.date';
      break;
    }

    $query->addOrderBy($sort[0] . ' ' . $sort[1]);
  }

  protected function isValidSortColumn($column) {
    return Doctrine_Core::getTable('Invoice')->hasColumn($column);
  }
}
