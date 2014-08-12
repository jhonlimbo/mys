<div class="form-group paydata col-md-5">
  <?php echo $form['supplier_id']->renderLabel(__('Proveedor:'), array('class' => 'col-md-3'))?> 
  <?php echo $form['supplier_id']->renderError()?> 
  <div class="col-md-9">
    <?php echo $form['supplier_id']->render(array('class' => 'chzn-select')) ?>
  </div>
</div>
<div class="form-group paydata col-md-4">
  <?php echo $form['date']->renderLabel(__('Fecha de Pago:'), array('class' => 'col-md-5'))?> 

  <?php if ($form['date']->hasError()): ?>
  <div class="col-md-4 error">
  <?php else: ?>
  <div class="col-md-4">
  <?php endif; ?>
    <?php echo $form['date'] ?>
  </div>
  <?//php echo $form['date']->renderError()?> 
</div>
<div class="form-group paydata col-md-3">
  <?php
    if (!$form->getObject()->isNew()) {
      echo link_to(
      'Eliminar Fecha de Pago',
      'paymentDate/delete?id='.$form->getObject()->getId(),
      array('method' => 'delete', 'confirm' => 'Eliminar la fecha de pago y todas sus facturas?', 'class' => 'delete-paydate'));
  }?>
</div>