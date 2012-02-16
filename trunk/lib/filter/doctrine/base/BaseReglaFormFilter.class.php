<?php

/**
 * Regla filter form base class.
 *
 * @package    paranoid-web
 * @subpackage filter
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseReglaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'           => new sfWidgetFormFilterInput(),
      'type'             => new sfWidgetFormFilterInput(),
      'lunes'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'martes'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'miercoles'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'jueves'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'viernes'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sabado'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'domingo'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'desde'            => new sfWidgetFormFilterInput(),
      'hasta'            => new sfWidgetFormFilterInput(),
      'cantidadLlamadas' => new sfWidgetFormFilterInput(),
      'costoMaximo'      => new sfWidgetFormFilterInput(),
      'perfiles_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Perfil')),
    ));

    $this->setValidators(array(
      'nombre'           => new sfValidatorPass(array('required' => false)),
      'type'             => new sfValidatorPass(array('required' => false)),
      'lunes'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'martes'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'miercoles'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'jueves'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'viernes'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sabado'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'domingo'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'desde'            => new sfValidatorPass(array('required' => false)),
      'hasta'            => new sfValidatorPass(array('required' => false)),
      'cantidadLlamadas' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'costoMaximo'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'perfiles_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Perfil', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('regla_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addPerfilesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ReglaPerfil ReglaPerfil')
      ->andWhereIn('ReglaPerfil.perfil_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Regla';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'nombre'           => 'Text',
      'type'             => 'Text',
      'lunes'            => 'Boolean',
      'martes'           => 'Boolean',
      'miercoles'        => 'Boolean',
      'jueves'           => 'Boolean',
      'viernes'          => 'Boolean',
      'sabado'           => 'Boolean',
      'domingo'          => 'Boolean',
      'desde'            => 'Text',
      'hasta'            => 'Text',
      'cantidadLlamadas' => 'Number',
      'costoMaximo'      => 'Number',
      'perfiles_list'    => 'ManyKey',
    );
  }
}
