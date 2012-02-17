<?php

/**
 * BaseHistoricoAlarma
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nombre
 * @property date $fecha
 * @property string $detalle
 * @property string $origen
 * @property integer $user_id
 * @property sfGuardUser $sfGuardUser
 * 
 * @method integer         getId()          Returns the current record's "id" value
 * @method string          getNombre()      Returns the current record's "nombre" value
 * @method date            getFecha()       Returns the current record's "fecha" value
 * @method string          getDetalle()     Returns the current record's "detalle" value
 * @method string          getOrigen()      Returns the current record's "origen" value
 * @method integer         getUserId()      Returns the current record's "user_id" value
 * @method sfGuardUser     getSfGuardUser() Returns the current record's "sfGuardUser" value
 * @method HistoricoAlarma setId()          Sets the current record's "id" value
 * @method HistoricoAlarma setNombre()      Sets the current record's "nombre" value
 * @method HistoricoAlarma setFecha()       Sets the current record's "fecha" value
 * @method HistoricoAlarma setDetalle()     Sets the current record's "detalle" value
 * @method HistoricoAlarma setOrigen()      Sets the current record's "origen" value
 * @method HistoricoAlarma setUserId()      Sets the current record's "user_id" value
 * @method HistoricoAlarma setSfGuardUser() Sets the current record's "sfGuardUser" value
 * 
 * @package    paranoid-web
 * @subpackage model
 * @author     Paranoid Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseHistoricoAlarma extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('historico_alarmas');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('nombre', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('fecha', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('detalle', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('origen', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}