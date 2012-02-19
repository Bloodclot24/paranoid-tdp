<?php

/**
 * ReglaPrefijo form base class.
 *
 * @method ReglaPrefijo getObject() Returns the current form's model object
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReglaPrefijoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'regla_id'   => new sfWidgetFormInputHidden(),
      'prefijo_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'regla_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('regla_id')), 'empty_value' => $this->getObject()->get('regla_id'), 'required' => false)),
      'prefijo_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('prefijo_id')), 'empty_value' => $this->getObject()->get('prefijo_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('regla_prefijo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReglaPrefijo';
  }

}
