<?php

/**
 * Estadisticas filter form base class.
 *
 * @package    paranoid-web
 * @subpackage filter
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEstadisticasFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuarios'    => new sfWidgetFormFilterInput(),
      'totales'     => new sfWidgetFormFilterInput(),
      'ok'          => new sfWidgetFormFilterInput(),
      'fallidas'    => new sfWidgetFormFilterInput(),
      'sospechosas' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'usuarios'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'totales'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ok'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fallidas'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sospechosas' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('estadisticas_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Estadisticas';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'usuarios'    => 'Number',
      'totales'     => 'Number',
      'ok'          => 'Number',
      'fallidas'    => 'Number',
      'sospechosas' => 'Number',
    );
  }
}
