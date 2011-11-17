<?php

/**
 * Perfil form base class.
 *
 * @method Perfil getObject() Returns the current form's model object
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePerfilForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'nombre'                  => new sfWidgetFormTextarea(),
      'descripcion'             => new sfWidgetFormTextarea(),
      'prefijosProhibidos'      => new sfWidgetFormTextarea(),
      'prefijosPermitidos'      => new sfWidgetFormTextarea(),
      'llamadasLocales'         => new sfWidgetFormInputCheckbox(),
      'llamadasInternacionales' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'                  => new sfValidatorString(array('required' => false)),
      'descripcion'             => new sfValidatorString(array('required' => false)),
      'prefijosProhibidos'      => new sfValidatorString(array('required' => false)),
      'prefijosPermitidos'      => new sfValidatorString(array('required' => false)),
      'llamadasLocales'         => new sfValidatorBoolean(array('required' => false)),
      'llamadasInternacionales' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('perfil[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Perfil';
  }

}
