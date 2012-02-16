<?php

/**
 * ReglaPerfil form base class.
 *
 * @method ReglaPerfil getObject() Returns the current form's model object
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReglaPerfilForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'regla_id'  => new sfWidgetFormInputHidden(),
      'perfil_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'regla_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('regla_id')), 'empty_value' => $this->getObject()->get('regla_id'), 'required' => false)),
      'perfil_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('perfil_id')), 'empty_value' => $this->getObject()->get('perfil_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('regla_perfil[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReglaPerfil';
  }

}
