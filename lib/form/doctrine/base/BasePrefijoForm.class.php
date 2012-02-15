<?php

/**
 * Prefijo form base class.
 *
 * @method Prefijo getObject() Returns the current form's model object
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePrefijoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'descripcion'    => new sfWidgetFormTextarea(),
      'numero'         => new sfWidgetFormInputText(),
      'costoPorMinuto' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'descripcion'    => new sfValidatorString(array('required' => false)),
      'numero'         => new sfValidatorInteger(array('required' => false)),
      'costoPorMinuto' => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('prefijo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Prefijo';
  }

}
