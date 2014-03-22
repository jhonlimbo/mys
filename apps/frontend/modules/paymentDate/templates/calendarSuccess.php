<!--apps/frontend/modules/paymentDate/templates/editSuccess.php-->
<h2><?php if ($form->getObject()->isNew()): ?>Nueva <?php else: ?>Editar <?php endif ?>Fecha de Pago</h2>


  <div class="col-md-3">
    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <h4><?php echo __('Nueva Fecha de Pago')?></h4>
      </div>
      <form class="form-horizontal" action="<?php echo url_for('@submit') ?>" method="post">
        <?php echo $form->renderHiddenFields() ?>
        <div class="form-group">
          <?php echo $form['supplier_id']->renderLabel(__('Proveedor:'), array('class' => 'col-md-3'))?> 
          <?php echo $form['supplier_id']->renderError()?> 
          <div class="col-md-9">
            <?php echo $form['supplier_id'] ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo $form['date']->renderLabel(__('Fecha de Pago:'), array('class' => 'col-md-3'))?> 
          <?php echo $form['date']->renderError()?> 
          <div class="col-md-9">
            <?php echo $form['date'] ?>
          </div>
        </div>
        <div class="form-group">
          <?php echo $form['paid']->renderLabel(__('Abonado:'), array('class' => 'col-md-3'))?> 
          <?php echo $form['paid']->renderError()?> 
          <div class="col-md-9">
            <?php echo $form['paid'] ?>
          </div>
        </div>
        <div id="invoice-form">
          <?php if ($form->getObject()->isNew()): ?>
          <script type="text/javascript">newfieldscount = 1;</script>
            <div class="form-group">
              <?php echo $form['new'][0]['building_id']->renderLabel('Edificio:', array('class' => 'col-md-3')) ?>  <?php echo $form['new'][0]['building_id']->renderError() ?>
              <div class="col-md-9"><?php echo $form['new'][0]['building_id'] ?></div>
            </div>
            <div class="form-group">
              <?php echo $form['new'][0]['number']->renderLabel(__('Nº:'), array('class' => 'col-md-3')) ?>  <?php echo $form['new'][0]['number']->renderError() ?>
              <div class="col-md-9"><?php echo $form['new'][0]['number'] ?></div>
            </div>
            <div class="form-group">
              <?php echo $form['new'][0]['value']->renderLabel(__('Importe:'), array('class' => 'col-md-3')) ?>  <?php echo $form['new'][0]['value']->renderError() ?>
              <div class="col-md-9"><?php echo $form['new'][0]['value'] ?></div>
            </div>
          <?php endif ?>
          <?php foreach ($form['Invoices'] as $invoice):?>
            <div class="form-group">
              <?php echo $invoice['building_id']->renderLabel(__('Edificio'), array('class' => 'col-md-3')) ?>  <?php echo $invoice['building_id']->renderError() ?>
              <div class="col-md-9"><?php echo $invoice['building_id'] ?></div>
            </div>
            <div class="form-group">            
              <?php echo $invoice['number']->renderLabel(__('Nº:'), array('class' => 'col-md-3')) ?>  <?php echo $invoice['number']->renderError() ?>
              <div class="col-md-9"><?php echo $invoice['number'] ?></div>
            </div>            
            <div class="form-group">
              <?php echo $invoice['value']->renderLabel(__('Importe:'), array('class' => 'col-md-3')) ?>  <?php echo $invoice['value']->renderError() ?>
              <div class="col-md-9"><?php echo $invoice['value'] ?></div>
            </div>
          <?php endforeach ?>
        </div>
        <a id="addinvoice" href="#"><?php echo __('Agregar Factura')?></a>
        <input type="submit" value="<?php echo __('Guardar')?>" />
      </form>
    </div>
  </div>

<a href="<?php echo url_for('@homepage')?>"><?php echo __('Volver al Listado')?></a>