<?php //apps/frontend/modules/event/templates/_addNew.php ?>
<div>
  <div class="form-group">
    <?php echo $form['new'][$number]['building_id']->renderLabel(__('Edificio:'), array('class' => 'col-md-4')) ?>  <?php echo $form['new'][$number]['building_id']->renderError() ?>
    <div class="col-md-8"><?php echo $form['new'][$number]['building_id'] ?></div>
  </div>
  <div class="form-group">
    <?php echo $form['new'][$number]['number']->renderLabel(__('Factura') . ' Nº:', array('class' => 'col-md-4')) ?>  <?php echo $form['new'][$number]['number']->renderError() ?>
    <div class="col-md-8"><?php echo $form['new'][$number]['number'] ?></div>
  </div>
  <div class="form-group">
    <?php echo $form['new'][$number]['value']->renderLabel(__('Importe:'), array('class' => 'col-md-4')) ?>  <?php echo $form['new'][$number]['value']->renderError() ?>
    <div class="col-md-8"><?php echo $form['new'][$number]['value'] ?></div>
  </div>
  <a class="removenew" href="#">Eliminar</a>
<div>