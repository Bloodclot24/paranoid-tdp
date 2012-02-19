<?php
    $leida = $notificaciones->getLeida();
    $id = $notificaciones->getId();
?>
<td class="sf_admin_date sf_admin_list_td_fecha">
    <?php echo false !== strtotime($notificaciones->getFecha()) ? format_date($notificaciones->getFecha(), "dd/MM/yyyy hh:mm") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_accion">
    <?php echo $notificaciones->getAccion() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_Regla">
    <a href="<?php echo UrlRuleHelper::getRouteName($notificaciones->getRegla()) ?>"><?php //echo link_to($notificaciones->getRegla()) ?>    <a href="<?php echo UrlRuleHelper::getRouteName($notificaciones->getRegla()) ?>"><?php echo $notificaciones->getRegla() ?></a>

</td>
<td class="sf_admin_text sf_admin_list_td_Usuario">
    <?php echo $notificaciones->getUsuario() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_masInfoURL">
    <?php if ($notificaciones->getMasInfoURL() != null && $notificaciones->getMasInfoURL() != "") { ?>
        <a href="<?php echo $notificaciones->getMasInfoURL() ?>"><?php echo image_tag("Download-icon.png", array("class" => "admin_icon")) ?>Bajar grabaci&oacute;n</a>
    <?php } else { ?>
    -
    <?php } ?>
</td>
<td class="markAsRead">
    <?php
        $imagen = $leida ? "mark_as_read" : "mark_as_not_read";
        $title = $leida ? "Marcar como no le&iacute;do" : "Marcar como le&iacute;do";
        $sfAction = url_for("notificaciones_nuevo/toggle?id=$id");
        echo image_tag("$imagen.png", array("title" => $title, "alt" => $title, "class" => "admin_icon", "onclick" => "javascript:toggleMarkAsRead(this, $id, '$sfAction')"))
    ?>
</td>