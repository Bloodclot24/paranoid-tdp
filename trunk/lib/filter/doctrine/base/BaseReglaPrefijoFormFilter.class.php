<?php

/**
 * ReglaPrefijo filter form base class.
 *
 * @package    paranoid-web
 * @subpackage filter
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseReglaPrefijoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('regla_prefijo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReglaPrefijo';
  }

  public function getFields()
  {
    return array(
      'regla_id'   => 'Number',
      'prefijo_id' => 'Number',
    );
  }
}
