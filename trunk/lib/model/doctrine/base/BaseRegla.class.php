<?php

/**
 * BaseRegla
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nombre
 * @property boolean $importante
 * @property string $type
 * @property boolean $lunes
 * @property boolean $martes
 * @property boolean $miercoles
 * @property boolean $jueves
 * @property boolean $viernes
 * @property boolean $sabado
 * @property boolean $domingo
 * @property time $desde
 * @property time $hasta
 * @property integer $cantidadLlamadas
 * @property float $costoMaximo
 * @property Doctrine_Collection $Perfiles
 * @property Doctrine_Collection $Notificaciones
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method string              getNombre()           Returns the current record's "nombre" value
 * @method boolean             getImportante()       Returns the current record's "importante" value
 * @method string              getType()             Returns the current record's "type" value
 * @method boolean             getLunes()            Returns the current record's "lunes" value
 * @method boolean             getMartes()           Returns the current record's "martes" value
 * @method boolean             getMiercoles()        Returns the current record's "miercoles" value
 * @method boolean             getJueves()           Returns the current record's "jueves" value
 * @method boolean             getViernes()          Returns the current record's "viernes" value
 * @method boolean             getSabado()           Returns the current record's "sabado" value
 * @method boolean             getDomingo()          Returns the current record's "domingo" value
 * @method time                getDesde()            Returns the current record's "desde" value
 * @method time                getHasta()            Returns the current record's "hasta" value
 * @method integer             getCantidadLlamadas() Returns the current record's "cantidadLlamadas" value
 * @method float               getCostoMaximo()      Returns the current record's "costoMaximo" value
 * @method Doctrine_Collection getPerfiles()         Returns the current record's "Perfiles" collection
 * @method Doctrine_Collection getNotificaciones()   Returns the current record's "Notificaciones" collection
 * @method Regla               setId()               Sets the current record's "id" value
 * @method Regla               setNombre()           Sets the current record's "nombre" value
 * @method Regla               setImportante()       Sets the current record's "importante" value
 * @method Regla               setType()             Sets the current record's "type" value
 * @method Regla               setLunes()            Sets the current record's "lunes" value
 * @method Regla               setMartes()           Sets the current record's "martes" value
 * @method Regla               setMiercoles()        Sets the current record's "miercoles" value
 * @method Regla               setJueves()           Sets the current record's "jueves" value
 * @method Regla               setViernes()          Sets the current record's "viernes" value
 * @method Regla               setSabado()           Sets the current record's "sabado" value
 * @method Regla               setDomingo()          Sets the current record's "domingo" value
 * @method Regla               setDesde()            Sets the current record's "desde" value
 * @method Regla               setHasta()            Sets the current record's "hasta" value
 * @method Regla               setCantidadLlamadas() Sets the current record's "cantidadLlamadas" value
 * @method Regla               setCostoMaximo()      Sets the current record's "costoMaximo" value
 * @method Regla               setPerfiles()         Sets the current record's "Perfiles" collection
 * @method Regla               setNotificaciones()   Sets the current record's "Notificaciones" collection
 * 
 * @package    paranoid-web
 * @subpackage model
 * @author     Paranoid Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRegla extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('regla');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('nombre', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('importante', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('type', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('lunes', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('martes', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('miercoles', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('jueves', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('viernes', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('sabado', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('domingo', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('desde', 'time', null, array(
             'type' => 'time',
             ));
        $this->hasColumn('hasta', 'time', null, array(
             'type' => 'time',
             ));
        $this->hasColumn('cantidadLlamadas', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('costoMaximo', 'float', null, array(
             'type' => 'float',
             ));

        $this->setSubClasses(array(
             'ReglaDias' => 
             array(
              'type' => 1,
             ),
             'ReglaLlamadasSimultaneas' => 
             array(
              'type' => 2,
             ),
             'ReglaCostoPorMinuto' => 
             array(
              'type' => 3,
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Perfil as Perfiles', array(
             'refClass' => 'ReglaPerfil',
             'local' => 'regla_id',
             'foreign' => 'perfil_id'));

        $this->hasMany('Notificaciones', array(
             'local' => 'id',
             'foreign' => 'regla_id'));
    }
}