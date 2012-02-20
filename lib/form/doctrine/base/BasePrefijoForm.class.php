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
      'numero'         => new sfWidgetFormTextarea(),
      'costoPorMinuto' => new sfWidgetFormInputText(),
      'reglas_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ReglaDestino')),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'descripcion'    => new sfValidatorString(array('required' => false)),
      'numero'         => new sfValidatorString(array('required' => false)),
      'costoPorMinuto' => new sfValidatorNumber(array('required' => false)),
      'reglas_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ReglaDestino', 'required' => false)),
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
