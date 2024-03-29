<?php

require_once dirname(__FILE__).'/../lib/sf_guard_userGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sf_guard_userGeneratorHelper.class.php';

/**
 * sf_guard_user actions.
 *
 * @package    paranoid-web
 * @subpackage sf_guard_user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sf_guard_userActions extends autoSf_guard_userActions
{

    public function executeListAlarmasHistoricas(sfWebRequest $request) {
        $user = $this->getRoute()->getObject();

        // create a context, and load the helper
        $configuration = sfContext::getInstance()->getConfiguration();
        $configuration->loadHelpers('Url');


        $url = url_for("@historico_alarma");
        $url = $url."?user_id=".$user->getId();

        $this->redirect($url);
        
    }

    

}
