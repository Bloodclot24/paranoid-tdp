<?php

/**
 * Perfil filter form base class.
 *
 * @package    paranoid-web
 * @subpackage filter
 * @author     Your name here
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
    ));

    $this->setValidators(array(
      'nombre'                  => new sfValidatorPass(array('required' => false)),
      'descripcion'             => new sfValidatorPass(array('required' => false)),
      'prefijosProhibidos'      => new sfValidatorPass(array('required' => false)),
      'prefijosPermitidos'      => new sfValidatorPass(array('required' => false)),
      'llamadasLocales'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'llamadasInternacionales' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('perfil_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
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
    );
  }
}
