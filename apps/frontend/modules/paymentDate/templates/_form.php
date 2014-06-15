<?php //apps/frontend/modules/paymentDate/templates/_form.php ?>

<!--        <select id="first_day" class="form-control">
          <option value="" selected="selected">First day of week language-dependant</option>
          <option value="2">First day of week is Sunday</option>
          <option value="1">First day of week is Monday</option>
        </select>
        <select id="language" class="form-control">
          <option value="">Select Language (default: en-US)</option>
          <option value="nl-NL">Dutch</option>
          <option value="fr-FR">French</option>
          <option value="de-DE">German</option>
          <option value="el-GR">Greek</option>
          <option value="it-IT">Italian</option>
          <option value="pl-PL">Polish</option>
          <option value="pt-BR">Portuguese (Brazil)</option>
          <option value="es-MX">Spanish (Mexico)</option>
          <option value="es-ES">Spanish (Spain)</option>
          <option value="ru-RU">Russian</option>
          <option value="sv-SE">Swedish</option>
        </select>
        <label class="checkbox">
          <input type="checkbox" value="#events-modal" id="events-in-modal"> Open events in modal window
        </label>-->
        <?php //TODO: open edit window on modal -> on save close modal and return to paymentDate->indexSuccess ?>
      <div class="panel panel-default" id="payform">
        <div class="panel-heading text-center expand">
          <h4  data-toggle="tooltip" data-placement="top" title="Abrir / Cerrar Formulario">
            <span class="glyphicon glyphicon-calendar"></span>
            <span class="heading-text"><?php echo __($form->formTitle . ' Fecha de Pago')?></span>
          </h4>
            <a class="print-lnk" href="#" onclick="window.print();return false;">
              <span class="glyphicon glyphicon-print" data-toggle="tooltip" data-placement="right" title="Imprimir Formulario"></span>
            </a>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" action="<?php echo url_for('@paymentDate') ?>" method="post">
            <?php echo $form->renderHiddenFields() ?>
            <div class="paydata-row">
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
            </div>
            <div id="invoice-form">
              <?php if ($form->getObject()->isNew() && !$form->hasErrors()): ?>
              <script type="text/javascript">newfieldscount = 1;</script>
                <div>
                  <div class="form-group col-md-4">
                    <?php echo $form['new'][0]['building_id']->renderLabel('Edificio:', array('class' => 'col-md-3')) ?>  <?php echo $form['new'][0]['building_id']->renderError() ?>
                    <div class="col-md-9"><?php echo $form['new'][0]['building_id']->render(array('class' => 'chzn-select')) ?></div>
                  </div>
                  <div class="form-group col-md-3">
                    <?php echo $form['new'][0]['number']->renderLabel(__('Factura') . ' Nº:', array('class' => 'col-md-5')) ?>  <?php echo $form['new'][0]['number']->renderError() ?>
                    <div class="col-md-7"><?php echo $form['new'][0]['number'] ?></div>
                  </div>
                  <div class="form-group col-md-3">
                    <?php echo $form['new'][0]['value']->renderLabel(__('Importe:'), array('class' => 'col-md-5')) ?>  <?php echo $form['new'][0]['value']->renderError() ?>
                    <div class="col-md-7"><?php echo $form['new'][0]['value'] ?></div>
                  </div>
                </div>
              <?php endif ?>
            
            <?php // EDIT FORM TEMPLATE ?>

            <?php foreach ($form['Invoices'] as $invoice):?>
            <?php $invoiceValues = $invoice->getValue(); ?>
              <div>
                <div class="form-group col-md-4">
                  <?php echo $invoice['building_id']->renderLabel(__('Edificio'), array('class' => 'col-md-3')) ?>  <?php echo $invoice['building_id']->renderError() ?>
                  <div class="col-md-9"><?php echo $invoice['building_id']->render(array('class' => 'chzn-select')) ?></div>
                </div>
                <div class="form-group col-md-3">
                  <?php echo $invoice['number']->renderLabel(__('Factura') . ' Nº:', array('class' => 'col-md-5')) ?>  <?php echo $invoice['number']->renderError() ?>
                  <div class="col-md-7"><?php echo $invoice['number'] ?></div>
                </div>
                <div class="form-group col-md-3">
                  <?php echo $invoice['value']->renderLabel(__('Importe:'), array('class' => 'col-md-5')) ?>  <?php echo $invoice['value']->renderError() ?>
                  <div class="col-md-7"><?php echo $invoice['value'] ?></div>
                </div>
                <div class="form-group delete-wrapper col-md-2">
                  <div class="delete-invoice">
                    <?php echo $invoice['delete']->render(array('class' => 'input-hide')) ?>
                    <?php echo $invoice['delete']->renderLabel(__('Eliminar'), array('class' => 'cursor-pointer', 'id' => 'delete-'.$invoice['id']->getValue())) ?>
                    <span class="highlight-delete"></span>
                  </div>
                </div>
              </div>
            <?php endforeach ?>

            <?php // EDIT FORM TEMPLATE ?>
            <?php if(isset($form['new']) && $form->hasErrors()): ?>
              <?php foreach($form['new'] as $newForm ): ?>
                <div>
                  <div class="form-group col-md-4">
                    <?php echo $newForm['building_id']->renderLabel('Edificio:', array('class' => 'col-md-3')) ?>  <?php echo $newForm['building_id']->renderError() ?>
                    <div class="col-md-9"><?php echo $newForm['building_id'] ?></div>
                  </div>
                  <div class="form-group col-md- col-md-3">
                    <?php echo $newForm['number']->renderLabel(__('Factura') . ' Nº:', array('class' => 'col-md-5')) ?>  <?//php echo $newForm['number']->renderError() ?>
                    <?php if ($newForm['number']->hasError()): ?>
                      <div class="col-md-7 error">
                    <?php else: ?>
                      <div class="col-md-7">
                    <?php endif; ?>
                      <?php echo $newForm['number'] ?>
                    </div>             
                  </div>
                  <div class="form-group col-md-3">
                    <?php echo $newForm['value']->renderLabel(__('Importe:'), array('class' => 'col-md-5')) ?>  <?//php echo $newForm['value']->renderError() ?>                  
                    <?php if ($newForm['value']->hasError()): ?>
                      <div class="col-md-7 error">
                    <?php else: ?>
                      <div class="col-md-7">
                    <?php endif; ?>
                      <?php echo $newForm['value'] ?>
                    </div>             
                  </div>
                </div>
            <?php endforeach ?>
            <?php endif ?>
            </div>
            <input class="pull-right form-submit" type="submit" value="<?php echo __('Guardar')?>" />            
            <!--<input type="button" value=" Print this page " onclick="window.print();return false;" />-->

          </form>
        </div>
                        <?// var_dump($form->getObject()->getInvoices());?>
                        <?// echo count($form['Invoices']);?>                        

        <div class="panel-footer">
          <a id="addinvoice" href="#">
            <span class="glyphicon glyphicon-plus"></span>
            <?php echo __('Agregar Factura')?>
          </a>
        </div>
      </div>