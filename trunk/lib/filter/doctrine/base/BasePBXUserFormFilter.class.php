<?php

/**
 * PBXUser filter form base class.
 *
 * @package    paranoid-web
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePBXUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'extension'       => new sfWidgetFormFilterInput(),
      'tecnologia'      => new sfWidgetFormFilterInput(),
      'ultimo_registro' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'estado'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'extension'       => new sfValidatorPass(array('required' => false)),
      'tecnologia'      => new sfValidatorPass(array('required' => false)),
      'ultimo_registro' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'estado'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('pbx_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PBXUser';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'extension'       => 'Text',
      'tecnologia'      => 'Text',
      'ultimo_registro' => 'Date',
      'estado'          => 'Number',
    );
  }
}
