<?php

/**
 * EstadisticasLlamadas filter form base class.
 *
 * @package    paranoid-web
 * @subpackage filter
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEstadisticasLlamadasFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'fecha'                => new sfWidgetFormFilterInput(),
      'llamadas_ok'          => new sfWidgetFormFilterInput(),
      'llamadas_sospechosas' => new sfWidgetFormFilterInput(),
      'llamadas_fallidas'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'fecha'                => new sfValidatorPass(array('required' => false)),
      'llamadas_ok'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'llamadas_sospechosas' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'llamadas_fallidas'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('estadisticas_llamadas_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadisticasLlamadas';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'fecha'                => 'Text',
      'llamadas_ok'          => 'Number',
      'llamadas_sospechosas' => 'Number',
      'llamadas_fallidas'    => 'Number',
    );
  }
}
