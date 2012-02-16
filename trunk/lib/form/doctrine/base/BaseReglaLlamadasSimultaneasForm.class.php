<?php

/**
 * ReglaLlamadasSimultaneas form base class.
 *
 * @method ReglaLlamadasSimultaneas getObject() Returns the current form's model object
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReglaLlamadasSimultaneasForm extends ReglaForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('regla_llamadas_simultaneas[%s]');
  }

  public function getModelName()
  {
    return 'ReglaLlamadasSimultaneas';
  }

}
