<?php

/**
 * Perfil filter form base class.
 *
 * @package    paranoid-web
 * @subpackage filter
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePerfilFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                  => new sfWidgetFormFilterInput(),
      'descripcion'             => new sfWidgetFormFilterInput(),
      'prefijosProhibidos'      => new sfWidgetFormFilterInput(),
      'prefijosPermitidos'      => new sfWidgetFormFilterInput(),
      'llamadasLocales'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'llamadasInternacionales' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'reglas_list'             => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Regla')),
    ));

    $this->setValidators(array(
      'nombre'                  => new sfValidatorPass(array('required' => false)),
      'descripcion'             => new sfValidatorPass(array('required' => false)),
      'prefijosProhibidos'      => new sfValidatorPass(array('required' => false)),
      'prefijosPermitidos'      => new sfValidatorPass(array('required' => false)),
      'llamadasLocales'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'llamadasInternacionales' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'reglas_list'             => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Regla', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('perfil_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addReglasListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('ReglaPerfil.regla_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Perfil';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'nombre'                  => 'Text',
      'descripcion'             => 'Text',
      'prefijosProhibidos'      => 'Text',
      'prefijosPermitidos'      => 'Text',
      'llamadasLocales'         => 'Boolean',
      'llamadasInternacionales' => 'Boolean',
      'reglas_list'             => 'ManyKey',
    );
  }
}
