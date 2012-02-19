<?php

/**
 * ReglaDestino form base class.
 *
 * @method ReglaDestino getObject() Returns the current form's model object
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReglaDestinoForm extends ReglaForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['prefijos_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Prefijo'));
    $this->validatorSchema['prefijos_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Prefijo', 'required' => true));

    $this->widgetSchema->setNameFormat('regla_destino[%s]');
  }

  public function getModelName()
  {
    return 'ReglaDestino';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['prefijos_list']))
    {
      $this->setDefault('prefijos_list', $this->object->Prefijos->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savePrefijosList($con);

    parent::doSave($con);
  }

  public function savePrefijosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['prefijos_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Prefijos->getPrimaryKeys();
    $values = $this->getValue('prefijos_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Prefijos', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Prefijos', array_values($link));
    }
  }

}
