<?php

/**
 * ReglaDias form.
 *
 * @package    paranoid-web
 * @subpackage form
 * @author     Paranoid Team
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReglaDiasForm extends BaseReglaDiasForm
{
    /**
     * @see ReglaForm
     */
    public function configure()
    {
        parent::configure();

        $this->mergePostValidator(
            new sfValidatorSchemaCompare('desde', '<=', 'hasta', array(), array('invalid' => 'La primera hora (%left_field%) debe ser menor que
            la ultima (%right_field%)'))
        );
    }
}
