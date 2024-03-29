<?php

/**
 * BasePBXUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $extension
 * @property string $tecnologia
 * @property date $ultimo_registro
 * @property boolean $conectado
 * @property Doctrine_Collection $sfGuardUser
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method string              getExtension()       Returns the current record's "extension" value
 * @method string              getTecnologia()      Returns the current record's "tecnologia" value
 * @method date                getUltimoRegistro()  Returns the current record's "ultimo_registro" value
 * @method boolean             getConectado()       Returns the current record's "conectado" value
 * @method Doctrine_Collection getSfGuardUser()     Returns the current record's "sfGuardUser" collection
 * @method PBXUser             setId()              Sets the current record's "id" value
 * @method PBXUser             setExtension()       Sets the current record's "extension" value
 * @method PBXUser             setTecnologia()      Sets the current record's "tecnologia" value
 * @method PBXUser             setUltimoRegistro()  Sets the current record's "ultimo_registro" value
 * @method PBXUser             setConectado()       Sets the current record's "conectado" value
 * @method PBXUser             setSfGuardUser()     Sets the current record's "sfGuardUser" collection
 * 
 * @package    paranoid-web
 * @subpackage model
 * @author     Paranoid Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePBXUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('usuario_pbx');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('extension', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('tecnologia', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('ultimo_registro', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('conectado', 'boolean', null, array(
             'type' => 'boolean',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('sfGuardUser', array(
             'local' => 'id',
             'foreign' => 'pbxuser_id'));
    }
}