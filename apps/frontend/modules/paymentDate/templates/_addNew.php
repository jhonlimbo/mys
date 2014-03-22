<?php //apps/frontend/modules/event/templates/_addNew.php ?>
<li>
  <?php echo $form['new'][$number]['building_id']->renderLabel(__('Edificio:')) ?>  <?php echo $form['new'][$number]['building_id']->renderError() ?>
  <?php echo $form['new'][$number]['building_id'] ?>
   -
  <?php echo $form['new'][$number]['number']->renderLabel(__('Nº:')) ?>  <?php echo $form['new'][$number]['number']->renderError() ?>
  <?php echo $form['new'][$number]['number'] ?>
   -
  <?php echo $form['new'][$number]['value']->renderLabel(__('Importe:')) ?>  <?php echo $form['new'][$number]['value']->renderError() ?>
  <?php echo $form['new'][$number]['value'] ?>

  <a class="removenew" href="#">Eliminar</a>
</li>