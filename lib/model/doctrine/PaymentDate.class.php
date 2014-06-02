<?php

/**
 * PaymentDate
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    MyS
 * @subpackage model
 * @author     Ferbal
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PaymentDate extends BasePaymentDate {

/*
  public function assignDefaultValues($overwrite = false) {
    parent::assignDefaultValues($overwrite);
    $this->date = date('d-m-Y');
  }
*/

  public function save(Doctrine_Connection $conn = null) {
    sfApplicationConfiguration::getActive()->loadHelpers(array('Url'));
    $result = parent::save($conn);

    $out = $this->getJsonFormat();
    $this->writeFile($out);
    return $result;
  }


  public function delete(Doctrine_Connection $conn = null) {
    sfApplicationConfiguration::getActive()->loadHelpers(array('Url'));
    $result = parent::delete($conn);

    $out = $this->getJsonFormat();
    $this->writeFile($out);
    return $result;
  }

  public function getJsonFormat() {
    $paymentDates = Doctrine_Core::getTable('PaymentDate')->getOrdered();
 //   $eventClass = array(
 //                       0 => 'event-important',
 //                       1 => 'event-info',
 //                       2 => 'event-warning',
 //                       3 => 'event-inverse',
 //                       4 => 'event-success',
 //                       5 => 'event-special'
 //                       );
    $i = 0;
    $k = 0;
    $out = array();
    foreach ($paymentDates as $eventJson) {
      $out[] = array(
          'id' => $eventJson->getId(),
          'title' => $eventJson->getSupplier()->name,
          'url' => url_for('paymentDate/edit?id='.$eventJson->getId()),
          'class' => ($i==5?'event-special':'event-important'),
          'start' => strtotime($eventJson->getDate()) . '000',
          'end' => strtotime($eventJson->getDate()) . '000',
          'total_value' => $eventJson->getTotalValue()
      );
      $i++;
      $k++;
      if($i==6 || $paymentDates[$k]->date !== $paymentDates[$k-1]->date){$i=0;}
    }
    return $out;
  }

//  public function isWeekend() {
//      return (date('N', strtotime($date)) >= 6);
//  }
//  var_dump(isWeekend('2014-03-21'));

  public function writeFile($out) {
//TODO: Only add the last paymentDate on event.json.php. Not write all file again.
    $fileName = sfConfig::get('sf_web_dir') . "/events.json.php";
    $fileHandle = fopen($fileName, 'w') or die("No se puede abrir el archivo");
    fputs($fileHandle ,json_encode(array('success' => 1, 'result' => $out)));
    fclose($fileHandle);
  }
}