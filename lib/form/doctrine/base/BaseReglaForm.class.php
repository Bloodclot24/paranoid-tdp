<?php

/**
 * Regla form base class.
 *
 * @method Regla getObject() Returns the current form's model object
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReglaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'nombre'           => new sfWidgetFormTextarea(),
      'type'             => new sfWidgetFormInputText(),
      'lunes'            => new sfWidgetFormInputCheckbox(),
      'martes'           => new sfWidgetFormInputCheckbox(),
      'miercoles'        => new sfWidgetFormInputCheckbox(),
      'jueves'           => new sfWidgetFormInputCheckbox(),
      'viernes'          => new sfWidgetFormInputCheckbox(),
      'sabado'           => new sfWidgetFormInputCheckbox(),
      'domingo'          => new sfWidgetFormInputCheckbox(),
      'desde'            => new sfWidgetFormTime(),
      'hasta'            => new sfWidgetFormTime(),
      'cantidadLlamadas' => new sfWidgetFormInputText(),
      'costoMaximo'      => new sfWidgetFormInputText(),
      'perfiles_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Perfil')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'           => new sfValidatorString(array('required' => false)),
      'type'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lunes'            => new sfValidatorBoolean(array('required' => false)),
      'martes'           => new sfValidatorBoolean(array('required' => false)),
      'miercoles'        => new sfValidatorBoolean(array('required' => false)),
      'jueves'           => new sfValidatorBoolean(array('required' => false)),
      'viernes'          => new sfValidatorBoolean(array('required' => false)),
      'sabado'           => new sfValidatorBoolean(array('required' => false)),
      'domingo'          => new sfValidatorBoolean(array('required' => false)),
      'desde'            => new sfValidatorTime(array('required' => false)),
      'hasta'            => new sfValidatorTime(array('required' => false)),
      'cantidadLlamadas' => new sfValidatorInteger(array('required' => false)),
      'costoMaximo'      => new sfValidatorNumber(array('required' => false)),
      'perfiles_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Perfil', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('regla[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Regla';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['perfiles_list']))
    {
      $this->setDefault('perfiles_list', $this->object->Perfiles->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savePerfilesList($con);

    parent::doSave($con);
  }

  public function savePerfilesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['perfiles_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Perfiles->getPrimaryKeys();
    $values = $this->getValue('perfiles_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Perfiles', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Perfiles', array_values($link));
    }
  }

}
