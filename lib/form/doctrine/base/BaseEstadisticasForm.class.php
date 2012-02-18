<?php

/**
 * Estadisticas form base class.
 *
 * @method Estadisticas getObject() Returns the current form's model object
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstadisticasForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'usuarios'    => new sfWidgetFormInputText(),
      'totales'     => new sfWidgetFormInputText(),
      'ok'          => new sfWidgetFormInputText(),
      'fallidas'    => new sfWidgetFormInputText(),
      'sospechosas' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'usuarios'    => new sfValidatorInteger(array('required' => false)),
      'totales'     => new sfValidatorInteger(array('required' => false)),
      'ok'          => new sfValidatorInteger(array('required' => false)),
      'fallidas'    => new sfValidatorInteger(array('required' => false)),
      'sospechosas' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estadisticas[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Estadisticas';
  }

}
