<?php

/**
 * BaseNotificaciones
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property date $fecha
 * @property string $accion
 * @property string $masInfoURL
 * @property integer $regla_id
 * @property integer $user_id
 * @property boolean $leida
 * @property Regla $Regla
 * @property sfGuardUser $Usuario
 * 
 * @method integer        getId()         Returns the current record's "id" value
 * @method date           getFecha()      Returns the current record's "fecha" value
 * @method string         getAccion()     Returns the current record's "accion" value
 * @method string         getMasInfoURL() Returns the current record's "masInfoURL" value
 * @method integer        getReglaId()    Returns the current record's "regla_id" value
 * @method integer        getUserId()     Returns the current record's "user_id" value
 * @method boolean        getLeida()      Returns the current record's "leida" value
 * @method Regla          getRegla()      Returns the current record's "Regla" value
 * @method sfGuardUser    getUsuario()    Returns the current record's "Usuario" value
 * @method Notificaciones setId()         Sets the current record's "id" value
 * @method Notificaciones setFecha()      Sets the current record's "fecha" value
 * @method Notificaciones setAccion()     Sets the current record's "accion" value
 * @method Notificaciones setMasInfoURL() Sets the current record's "masInfoURL" value
 * @method Notificaciones setReglaId()    Sets the current record's "regla_id" value
 * @method Notificaciones setUserId()     Sets the current record's "user_id" value
 * @method Notificaciones setLeida()      Sets the current record's "leida" value
 * @method Notificaciones setRegla()      Sets the current record's "Regla" value
 * @method Notificaciones setUsuario()    Sets the current record's "Usuario" value
 * 
 * @package    paranoid-web
 * @subpackage model
 * @author     Paranoid Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNotificaciones extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('notificaciones');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('fecha', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('accion', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('masInfoURL', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('regla_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('leida', 'boolean', null, array(
             'type' => 'boolean',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Regla', array(
             'local' => 'regla_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as Usuario', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}