<?php

/**
 * ReglaDestino filter form base class.
 *
 * @package    paranoid-web
 * @subpackage filter
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseReglaDestinoFormFilter extends ReglaFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['prefijos_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Prefijo'));
    $this->validatorSchema['prefijos_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Prefijo', 'required' => false));

    $this->widgetSchema->setNameFormat('regla_destino_filters[%s]');
  }

  public function addPrefijosListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ReglaPrefijo ReglaPrefijo')
      ->andWhereIn('ReglaPrefijo.prefijo_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'ReglaDestino';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'prefijos_list' => 'ManyKey',
    ));
  }
}
