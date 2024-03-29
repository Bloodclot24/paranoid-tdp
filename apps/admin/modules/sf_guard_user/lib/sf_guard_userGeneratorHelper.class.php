<?php

/**
 * sf_guard_user module helper.
 *
 * @package    paranoid-web
 * @subpackage sf_guard_user
 * @author     Your name here
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sf_guard_userGeneratorHelper extends BaseSf_guard_userGeneratorHelper
{

    public function linkToHistoricoAlarma($object, $params)
    {
        if ($object->isNew()) {
            return '';
        }

        return link_to("Historia","@historico_alarma");
    }
}
