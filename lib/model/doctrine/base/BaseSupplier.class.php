<?php

/**
 * BaseSupplier
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property Doctrine_Collection $Invoice
 * @property Doctrine_Collection $PaymentDate
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method string              getName()        Returns the current record's "name" value
 * @method string              getAddress()     Returns the current record's "address" value
 * @method string              getEmail()       Returns the current record's "email" value
 * @method string              getPhone()       Returns the current record's "phone" value
 * @method Doctrine_Collection getInvoice()     Returns the current record's "Invoice" collection
 * @method Doctrine_Collection getPaymentDate() Returns the current record's "PaymentDate" collection
 * @method Supplier            setId()          Sets the current record's "id" value
 * @method Supplier            setName()        Sets the current record's "name" value
 * @method Supplier            setAddress()     Sets the current record's "address" value
 * @method Supplier            setEmail()       Sets the current record's "email" value
 * @method Supplier            setPhone()       Sets the current record's "phone" value
 * @method Supplier            setInvoice()     Sets the current record's "Invoice" collection
 * @method Supplier            setPaymentDate() Sets the current record's "PaymentDate" collection
 * 
 * @package    MyS
 * @subpackage model
 * @author     Ferbal
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSupplier extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('supplier');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('address', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('phone', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));

        $this->option('type', 'INNODB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Invoice', array(
             'local' => 'id',
             'foreign' => 'supplier_id'));

        $this->hasMany('PaymentDate', array(
             'local' => 'id',
             'foreign' => 'supplier_id'));
    }
}