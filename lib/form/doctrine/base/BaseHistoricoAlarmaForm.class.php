<?php

/**
 * HistoricoAlarma form base class.
 *
 * @method HistoricoAlarma getObject() Returns the current form's model object
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHistoricoAlarmaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'nombre'  => new sfWidgetFormTextarea(),
      'fecha'   => new sfWidgetFormDate(),
      'detalle' => new sfWidgetFormTextarea(),
      'origen'  => new sfWidgetFormTextarea(),
      'user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'  => new sfValidatorString(array('required' => false)),
      'fecha'   => new sfValidatorDate(array('required' => false)),
      'detalle' => new sfValidatorString(array('required' => false)),
      'origen'  => new sfValidatorString(array('required' => false)),
      'user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('historico_alarma[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HistoricoAlarma';
  }

}
