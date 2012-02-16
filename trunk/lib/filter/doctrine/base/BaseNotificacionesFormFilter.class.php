<?php

/**
 * Notificaciones filter form base class.
 *
 * @package    paranoid-web
 * @subpackage filter
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNotificacionesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'fecha'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'accion'     => new sfWidgetFormFilterInput(),
      'masInfoURL' => new sfWidgetFormFilterInput(),
      'regla_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Regla'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'fecha'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'accion'     => new sfValidatorPass(array('required' => false)),
      'masInfoURL' => new sfValidatorPass(array('required' => false)),
      'regla_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Regla'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('notificaciones_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Notificaciones';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'fecha'      => 'Date',
      'accion'     => 'Text',
      'masInfoURL' => 'Text',
      'regla_id'   => 'ForeignKey',
    );
  }
}
