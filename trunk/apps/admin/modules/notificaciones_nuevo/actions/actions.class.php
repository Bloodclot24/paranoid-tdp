<?php

require_once dirname(__FILE__).'/../lib/notificaciones_nuevoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/notificaciones_nuevoGeneratorHelper.class.php';

/**
 * notificaciones_nuevo actions.
 *
 * @package    paranoid-web
 * @subpackage notificaciones_nuevo
 * @author     Paranoid Team
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class notificaciones_nuevoActions extends autoNotificaciones_nuevoActions
{

    public function executeToggle(sfWebRequest $request) {
        $id = $request->getParameter("id");

        $notificacion = NotificacionesTable::getInstance()->find($id);

        $notificacion->toggleLeida();
        $notificacion->save();

        $count = $this->getNotificacionesNoLeidas();
        return $this->renderText($count);
    }

    public function executeCount(sfWebRequest $request) {
        $count = $this->getNotificacionesNoLeidas();
        return $this->renderText($count);
    }

    private function getNotificacionesNoLeidas() {
        $count = NotificacionesTable::getInstance()->createQuery()->where("leida=0")->count();
        return $count;
    }
}
