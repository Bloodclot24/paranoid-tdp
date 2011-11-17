<?php

require_once dirname(__FILE__).'/../lib/historico_alarmaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/historico_alarmaGeneratorHelper.class.php';

/**
 * historico_alarma actions.
 *
 * @package    paranoid-web
 * @subpackage historico_alarma
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class historico_alarmaActions extends autoHistorico_alarmaActions
{

        /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $user_id = $request->getParameter('user_id');
        if (!is_null($user_id)) {
            $this->setFilters(array(
                                   'user_id' => $user_id
                              ));
        } else {
            $this->setFilters(array());
        }
        parent::executeIndex($request);
    }
}
