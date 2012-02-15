<?php

/**
 * BasePrefijo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $descripcion
 * @property integer $numero
 * 
 * @method integer getId()          Returns the current record's "id" value
 * @method string  getDescripcion() Returns the current record's "descripcion" value
 * @method integer getNumero()      Returns the current record's "numero" value
 * @method Prefijo setId()          Sets the current record's "id" value
 * @method Prefijo setDescripcion() Sets the current record's "descripcion" value
 * @method Prefijo setNumero()      Sets the current record's "numero" value
 * 
 * @package    paranoid-web
 * @subpackage model
 * @author     Paranoid Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePrefijo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('prefijo');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('descripcion', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('numero', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}