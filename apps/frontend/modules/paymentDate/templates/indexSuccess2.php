<!--apps/frontend/modules/paymentDate/templates/indexSuccess.php -->

<?//php slot('title') ?>
  <?//php echo sprintf('%s is looking for a %s', $job->getCompany(), $job->getPosition()) ?>
<?//php end_slot(); ?> 
<div class="row">
  <div class="col-md-6"><h2><?php echo __('Fechas de Pago')?></h2></div>
  <div class="col-md-6"><a href="<?php echo url_for('@new')?>"><?php echo __('Agregar Nueva Fecha de Pago')?></a></div>
</div>
<div class="row">
  <?php foreach($paymentDates as $paymentDate): ?>
  <div class="payment-date-item col-md-6">
    <div class="row">
      <h3><?php echo $paymentDate->getDate() . " - " . $paymentDate->getSupplier() ?></h3>
      <a href="<?php echo url_for('paymentDate/edit?id='.$paymentDate->getId())?>"><?php echo __('Editar Fecha de Pago')?></a>
    </div>
    <ul>
      <?php foreach($paymentDate->getInvoices() as $invoice): ?>
        <li><?php echo __('Edificio: ') . $invoice->getBuilding() . " - " . __('Factura Nº: ') . $invoice->getNumber() . " - " . __('Importe: ') . $invoice->getValue() ?></li>
      <?php endforeach;?>
    </ul>
  </div>
  <?php endforeach; ?>
</div>






<!--apps/frontend/modules/paymentDate/templates/indexSuccess.php -->
<!-- Para hacer ShowSuccess un proveedor y sus facturas-->

<div class="row">
  <div class="col-md-6"><h2><?php echo __('Fechas de Pago')?></h2></div>
  <div class="col-md-6"><a href="<?php echo url_for('@new')?>"><?php echo __('Agregar Nueva Fecha de Pago')?></a></div>
</div>
<div class="row">
  <?php foreach($paymentDates as $paymentDate): ?>
  <div class="payment-date-item col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <span><?php echo $paymentDate->getDate() . " - " . $paymentDate->getSupplier() ?></span>
        <a class="pull-right" href="<?php echo url_for('paymentDate/edit?id='.$paymentDate->getId())?>" alt="<?php echo __('Editar Fecha de Pago')?>"><span class="glyphicon glyphicon-pencil"></span></a>
      </div>
      <table class="table">
        <th><?php echo __('Edificio')?></th><th><?php echo __('Factura Nº')?></th><th><?php echo __('Importe')?></th>
        <?php foreach($paymentDate->getInvoices() as $invoice): ?>
          <tr>
            <td><?php echo $invoice->getBuilding() ?></td>
            <td><?php echo $invoice->getNumber() ?></td>
            <td><?php echo $invoice->getValue() ?></td>
          </tr>



        <?php endforeach;?>
      </table>
    </div>
  </div>
  <?php endforeach; ?>
</div>