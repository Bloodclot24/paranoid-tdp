<?php

/**
 * estadisticas actions.
 *
 * @package    paranoid-web
 * @subpackage estadisticas
 * @author     Paranoid Team
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class estadisticasActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {

        $this->estadisticas = EstadisticasTable::getInstance()->createQuery()->execute();

    }

    public function executeHistorial(sfWebRequest $request)
    {



    }
}
