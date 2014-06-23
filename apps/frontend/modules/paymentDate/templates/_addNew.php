<?php //apps/frontend/modules/event/templates/_addNew.php ?>
<div>
  <div class="form-group col-md-4">
    <?php echo $form['new'][$number]['building_id']->renderLabel(__('Edificio:'), array('class' => 'col-md-3')) ?>  <?php echo $form['new'][$number]['building_id']->renderError() ?>
    <div class="col-md-9"><?php echo $form['new'][$number]['building_id']->render(array('class' => 'chzn-select')) ?></div>
  </div>
  <div class="form-group col-md-3">
    <?php echo $form['new'][$number]['number']->renderLabel(__('Factura') . ' Nº:', array('class' => 'col-md-5')) ?>  <?php echo $form['new'][$number]['number']->renderError() ?>
    <div class="col-md-7"><?php echo $form['new'][$number]['number'] ?></div>
  </div>
  <div class="form-group col-md-3">
    <?php echo $form['new'][$number]['value']->renderLabel(__('Importe:'), array('class' => 'col-md-5')) ?>  <?php echo $form['new'][$number]['value']->renderError() ?>
    <div class="col-md-7"><?php echo $form['new'][$number]['value'] ?></div>
  </div>
  <div class="col-md-2">
    <a class="removenew" href="#" title="Eliminar Registro">
      <span class="glyphicon glyphicon-remove"></span>
      <span class="remove-text">Eliminar</span>
    </a>
  </div>
</div>