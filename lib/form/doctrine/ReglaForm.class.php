<?php

/**
 * Regla form.
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReglaForm extends BaseReglaForm
{
  public function configure()
  {
      $this->validatorSchema['nombre'] = new sfValidatorString(array('required' => true));
      unset($this['type']);
  }
}
