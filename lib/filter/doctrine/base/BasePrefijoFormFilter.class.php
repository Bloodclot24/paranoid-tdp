<?php

/**
 * Prefijo filter form base class.
 *
 * @package    paranoid-web
 * @subpackage filter
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePrefijoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion'    => new sfWidgetFormFilterInput(),
      'numero'         => new sfWidgetFormFilterInput(),
      'costoPorMinuto' => new sfWidgetFormFilterInput(),
      'reglas_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ReglaDestino')),
    ));

    $this->setValidators(array(
      'descripcion'    => new sfValidatorPass(array('required' => false)),
      'numero'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'costoPorMinuto' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'reglas_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ReglaDestino', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('prefijo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addReglasListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('ReglaPrefijo.regla_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Prefijo';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'descripcion'    => 'Text',
      'numero'         => 'Number',
      'costoPorMinuto' => 'Number',
      'reglas_list'    => 'ManyKey',
    );
  }
}
