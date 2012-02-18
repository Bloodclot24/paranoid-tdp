<?php
    $leida = $notificaciones->getLeida();
    $estiloNegrita = "style='font-weight:";
    $estiloNegrita .= $leida ? "normal" : "bold";
    $estiloNegrita .= "'";
?>
<td class="sf_admin_date sf_admin_list_td_fecha" <?php echo $estiloNegrita ?>>
    <?php echo false !== strtotime($notificaciones->getFecha()) ? format_date($notificaciones->getFecha(), "dd/MM/yyyy hh:mm") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_accion" <?php echo $estiloNegrita ?>>
    <?php echo $notificaciones->getAccion() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_Regla" <?php echo $estiloNegrita ?>>
    <a href="<?php echo UrlRuleHelper::getRouteName($notificaciones->getRegla()) ?>"><?php //echo link_to($notificaciones->getRegla()) ?>    <a href="<?php echo UrlRuleHelper::getRouteName($notificaciones->getRegla()) ?>"><?php echo $notificaciones->getRegla() ?></a>

</td>
<td class="sf_admin_text sf_admin_list_td_Usuario" <?php echo $estiloNegrita ?>>
    <?php echo $notificaciones->getUsuario() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_masInfoURL" <?php echo $estiloNegrita ?>>
    <?php if ($notificaciones->getMasInfoURL() != null && $notificaciones->getMasInfoURL() != "") { ?>
        <a href="<?php echo $notificaciones->getMasInfoURL() ?>"><?php echo image_tag("Download-icon.png", array("class" => "admin_icon")) ?>Bajar grabaci&oacute;n</a>
    <?php } else { ?>
    -
    <?php } ?>
</td>
<td class="markAsRead">
    <?php
        $imagen = $leida ? "mark_as_read" : "mark_as_not_read";
        echo image_tag("$imagen.png", array("title" => "Marcar como leído", "alt" => "Marcar como leído", "class" => "admin_icon"))
    ?>
</td>