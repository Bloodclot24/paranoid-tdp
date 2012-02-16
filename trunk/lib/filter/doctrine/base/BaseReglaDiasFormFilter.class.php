<?php

/**
 * ReglaDias filter form base class.
 *
 * @package    paranoid-web
 * @subpackage filter
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseReglaDiasFormFilter extends ReglaFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('regla_dias_filters[%s]');
  }

  public function getModelName()
  {
    return 'ReglaDias';
  }
}
