<div id="buttons">
    <ul class="sf-menu">
        <li><?php echo link_to("Notificaciones (1)", 'notificaciones_nuevo/index') ?></li>
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
