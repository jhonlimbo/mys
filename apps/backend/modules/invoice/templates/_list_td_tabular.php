<td class="sf_admin_text sf_admin_list_td_supplier">
  <?php echo $invoice->getSupplier() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_number">
  <?php echo $invoice->getNumber() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_value">
  <?php echo $invoice->getValue() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_date">
  <?php echo false !== strtotime($invoice->getDate()) ? format_date($invoice->getDate(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_payment_date">
  <?php echo $invoice->getPaymentDate() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_paid">

        
  <?php echo sprintf('<a class="bloc bool_%s {field: \'%s\'}" href="' . url_for('invoice/togglePaid?id='.$invoice->getId(), array()) . '" title="%s"></a>', $invoice->getPaid() ? 'tick' : 'cross', 'paid', __('Cliquer pour modifier')) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_building">
  <?php echo $invoice->getBuilding() ?>
</td>
