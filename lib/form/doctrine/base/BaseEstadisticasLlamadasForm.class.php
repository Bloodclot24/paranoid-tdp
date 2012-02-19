<?php

/**
 * EstadisticasLlamadas form base class.
 *
 * @method EstadisticasLlamadas getObject() Returns the current form's model object
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstadisticasLlamadasForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'fecha'                => new sfWidgetFormTextarea(),
      'llamadas_ok'          => new sfWidgetFormInputText(),
      'llamadas_sospechosas' => new sfWidgetFormInputText(),
      'llamadas_fallidas'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'fecha'                => new sfValidatorString(array('required' => false)),
      'llamadas_ok'          => new sfValidatorInteger(array('required' => false)),
      'llamadas_sospechosas' => new sfValidatorInteger(array('required' => false)),
      'llamadas_fallidas'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estadisticas_llamadas[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadisticasLlamadas';
  }

}
