<div id="buttons">
    <ul class="sf-menu">
        <li><a href="<?php echo url_for('notificaciones_nuevo/index') ?>" class="notReadModificationsLink">Notificaciones <span id="notReadNotifications" /></a></li>
        <li><?php echo link_to("Usuarios", 'sf_guard_user/index') ?></li>
        <li><?php echo link_to("Usuarios PBX", 'pbx_user/index') ?></li>
        <li><?php echo link_to("Perfiles", 'perfil/index') ?></li>
        <li><?php echo link_to("Prefijos", 'prefijo/index') ?></li>
        <li>
            <a href="#">Reglas</a>
            <ul>
                <li><?php echo link_to("Horarios", "regla_horario/index") ?></li>
                <li><?php echo link_to("Costo por minuto", "regla_costo_minuto/index") ?></li>
                <li><?php echo link_to("Llamadas simultáneas", "regla_llamadas_simultaneas/index") ?></li>
            </ul>
        </li>
        <li><?php echo link_to("Estadísticas", 'estadisticas/index') ?></li>
    </ul>
</div>
