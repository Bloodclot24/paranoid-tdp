<?php

/**
 * ReglaCostoPorMinuto form base class.
 *
 * @method ReglaCostoPorMinuto getObject() Returns the current form's model object
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReglaCostoPorMinutoForm extends ReglaForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('regla_costo_por_minuto[%s]');
  }

  public function getModelName()
  {
    return 'ReglaCostoPorMinuto';
  }

}
