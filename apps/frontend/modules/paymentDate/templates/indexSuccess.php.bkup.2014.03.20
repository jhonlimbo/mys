<!--apps/frontend/modules/paymentDate/templates/indexSuccess.php -->

<div class="row">
  <div class="col-md-12">
    <h2 class="text-center"><?php echo __('Fechas de Pago')?></h2>
  </div>
</div>
<div class="row">
  <div class="col-md-9">
  <?//php include_partial('paymentDate/list', array('paymentDates' => $PaymentDates)) ?>
    <div class="row">
      <?php $i=0;?>
      <?php $k=1; ?>
      <?php foreach($paymentDates as $paymentDate): ?>
        <?php if($i ==0 || $paymentDate->date !== $paymentDates[$i-1]->date ):?>
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading text-center">
                <h5><span><b><?php echo $paymentDate->getDate()?></b></span></h5>
              </div>
              <table class="table">
        <?php endif; ?>
              <?php $total = 0;?>
              <?php foreach($paymentDate->getInvoices() as $invoice): ?>
                <?php $total = $total + $invoice->value; ?>
              <?php endforeach;?>
                <tr>
                  <td><?php echo $paymentDate->getSupplier() ?></td>
                  <td><?php echo $total ?></td>
                  <td>
                    <a class="pull-left" href="<?php echo url_for('paymentDate/edit?id='.$paymentDate->getId())?>" alt="<?php echo __('Editar Fecha de Pago')?>">
                      <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                   <a class="pull-right red" href="<?php //echo url_for('paymentDate/edit?id='.$paymentDate->getId())?>" alt="<?php echo __('Editar Fecha de Pago')?>">
                      <span class="glyphicon glyphicon-remove"><?//php echo link_to('Delete', 'job/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></span>
                    </a>
                  </td>
                </tr>
        <?php if( $paymentDate->date !==  $paymentDates[$i+1]->date):?>
        <?php //TODO: Get Total value of all invoices in the table ?>
                <tr><td><?php echo __('Total')?>:</td><td colspan="2"></td></tr>
            </table>
          </div>
        </div>
        <?php if($k%3==0) {echo '</div><div class="row">';}?>
      <?php $k++;?>
        <?php endif; ?>
        <?php $i++;?>

      <?php endforeach; ?>
      <div class="col-md-12 text-center">
        << Paginador >>
      </div>
    </div>
  </div>

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
        </div>
        <a id="addinvoice" href="#"><?php echo __('Agregar Factura')?></a>
        <input type="submit" value="<?php echo __('Guardar')?>" />
      </form>
    </div>
  </div>
</div>