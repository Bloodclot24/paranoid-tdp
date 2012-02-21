<?php

/**
 * Notificaciones form base class.
 *
 * @method Notificaciones getObject() Returns the current form's model object
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNotificacionesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'fecha'      => new sfWidgetFormDate(),
      'accion'     => new sfWidgetFormTextarea(),
      'masInfoURL' => new sfWidgetFormTextarea(),
      'llamada'    => new sfWidgetFormTextarea(),
      'regla_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Regla'), 'add_empty' => true)),
      'user_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => true)),
      'leida'      => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'fecha'      => new sfValidatorDate(array('required' => false)),
      'accion'     => new sfValidatorString(array('required' => false)),
      'masInfoURL' => new sfValidatorString(array('required' => false)),
      'llamada'    => new sfValidatorString(array('required' => false)),
      'regla_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Regla'), 'required' => false)),
      'user_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'required' => false)),
      'leida'      => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('notificaciones[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Notificaciones';
  }

}
