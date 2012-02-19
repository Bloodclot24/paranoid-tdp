<?php

/**
 * BaseEstadisticasLlamadas
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $fecha
 * @property integer $llamadas_ok
 * @property integer $llamadas_sospechosas
 * @property integer $llamadas_fallidas
 * 
 * @method integer              getId()                   Returns the current record's "id" value
 * @method string               getFecha()                Returns the current record's "fecha" value
 * @method integer              getLlamadasOk()           Returns the current record's "llamadas_ok" value
 * @method integer              getLlamadasSospechosas()  Returns the current record's "llamadas_sospechosas" value
 * @method integer              getLlamadasFallidas()     Returns the current record's "llamadas_fallidas" value
 * @method EstadisticasLlamadas setId()                   Sets the current record's "id" value
 * @method EstadisticasLlamadas setFecha()                Sets the current record's "fecha" value
 * @method EstadisticasLlamadas setLlamadasOk()           Sets the current record's "llamadas_ok" value
 * @method EstadisticasLlamadas setLlamadasSospechosas()  Sets the current record's "llamadas_sospechosas" value
 * @method EstadisticasLlamadas setLlamadasFallidas()     Sets the current record's "llamadas_fallidas" value
 * 
 * @package    paranoid-web
 * @subpackage model
 * @author     Paranoid Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEstadisticasLlamadas extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('estadisticas_llamadas');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('fecha', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('llamadas_ok', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('llamadas_sospechosas', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('llamadas_fallidas', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}