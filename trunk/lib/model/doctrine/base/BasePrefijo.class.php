<?php

/**
 * BasePrefijo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $descripcion
 * @property integer $numero
 * @property float $costoPorMinuto
 * @property Doctrine_Collection $Reglas
 * 
 * @method integer             getId()             Returns the current record's "id" value
 * @method string              getDescripcion()    Returns the current record's "descripcion" value
 * @method integer             getNumero()         Returns the current record's "numero" value
 * @method float               getCostoPorMinuto() Returns the current record's "costoPorMinuto" value
 * @method Doctrine_Collection getReglas()         Returns the current record's "Reglas" collection
 * @method Prefijo             setId()             Sets the current record's "id" value
 * @method Prefijo             setDescripcion()    Sets the current record's "descripcion" value
 * @method Prefijo             setNumero()         Sets the current record's "numero" value
 * @method Prefijo             setCostoPorMinuto() Sets the current record's "costoPorMinuto" value
 * @method Prefijo             setReglas()         Sets the current record's "Reglas" collection
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
        $this->hasColumn('costoPorMinuto', 'float', null, array(
             'type' => 'float',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('ReglaDestino as Reglas', array(
             'refClass' => 'ReglaPrefijo',
             'local' => 'prefijo_id',
             'foreign' => 'regla_id'));
    }
}