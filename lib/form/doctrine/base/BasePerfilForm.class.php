<?php

/**
 * Perfil form base class.
 *
 * @method Perfil getObject() Returns the current form's model object
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Paranoid Team
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
      'reglas_list'             => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Regla')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'                  => new sfValidatorString(array('required' => false)),
      'descripcion'             => new sfValidatorString(array('required' => false)),
      'prefijosProhibidos'      => new sfValidatorString(array('required' => false)),
      'prefijosPermitidos'      => new sfValidatorString(array('required' => false)),
      'llamadasLocales'         => new sfValidatorBoolean(array('required' => false)),
      'llamadasInternacionales' => new sfValidatorBoolean(array('required' => false)),
      'reglas_list'             => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Regla', 'required' => false)),
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

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['reglas_list']))
    {
      $this->setDefault('reglas_list', $this->object->Reglas->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveReglasList($con);

    parent::doSave($con);
  }

  public function saveReglasList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['reglas_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Reglas->getPrimaryKeys();
    $values = $this->getValue('reglas_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Reglas', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Reglas', array_values($link));
    }
  }

}
