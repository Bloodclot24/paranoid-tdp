<?php

/**
 * ReglaCostoPorMinuto filter form base class.
 *
 * @package    paranoid-web
 * @subpackage filter
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseReglaCostoPorMinutoFormFilter extends ReglaFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('regla_costo_por_minuto_filters[%s]');
  }

  public function getModelName()
  {
    return 'ReglaCostoPorMinuto';
  }
}
