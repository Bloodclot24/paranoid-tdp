<div class="sf_admin_list">
  <?php if (!$pager->getNbResults()): ?>
    <p><?php echo __('No result', array(), 'sf_admin') ?></p>
  <?php else: ?>
    <table cellspacing="0">
      <thead>
        <tr>
          <?php include_partial('notificaciones_nuevo/list_th_tabular', array('sort' => $sort)) ?>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="6">
            <?php if ($pager->haveToPaginate()): ?>
              <?php include_partial('notificaciones_nuevo/pagination', array('pager' => $pager)) ?>
            <?php endif; ?>

            <?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?>
            <?php if ($pager->haveToPaginate()): ?>
              <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
            <?php endif; ?>
          </th>
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($pager->getResults() as $i => $notificaciones): $odd = fmod(++$i, 2) ? 'odd' : 'even'; $classLeida = $notificaciones->getLeida() ? "" : "notRead"; ?>
          <tr class="sf_admin_row <?php echo $odd." ".$classLeida ?>">
            <?php include_partial('notificaciones_nuevo/list_td_tabular', array('notificaciones' => $notificaciones)) ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
<script type="text/javascript">
/* <![CDATA[ */
function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
}

$(".tooltip").tooltip({
	track: true,
	delay: 0,
	showURL: false,
	opacity: 1,
	fixPNG: true,
	showBody: " - ",
	extraClass: "pretty fancy",
	top: -15,
	left: 5
});

/* ]]> */


</script>

