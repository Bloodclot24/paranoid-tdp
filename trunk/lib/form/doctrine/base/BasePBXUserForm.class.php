<?php

/**
 * PBXUser form base class.
 *
 * @method PBXUser getObject() Returns the current form's model object
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePBXUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'extension'       => new sfWidgetFormTextarea(),
      'tecnologia'      => new sfWidgetFormTextarea(),
      'ultimo_registro' => new sfWidgetFormDate(),
      'estado'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'extension'       => new sfValidatorString(array('required' => false)),
      'tecnologia'      => new sfValidatorString(array('required' => false)),
      'ultimo_registro' => new sfValidatorDate(array('required' => false)),
      'estado'          => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pbx_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PBXUser';
  }

}
