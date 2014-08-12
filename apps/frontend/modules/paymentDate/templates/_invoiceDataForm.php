              <?php if ($form->getObject()->isNew() && !$form->hasErrors()): ?>
              <?php // NEW FORM - PRINT NEW INVOICES SETTED BY numberOfInvoices ON executeIndex ?>
              <script type="text/javascript">newfieldscount = <?php echo json_encode($form->numberOfInvoices+1);?>;</script>
              <?php $i = 0;?>
              <?php foreach ($form['new'] as $newInvoice):?>
                <div>
                  <div class="form-group col-md-4">
                    <?php echo $newInvoice['building_id']->renderLabel('Edificio:', array('class' => 'col-md-3')) ?>  <?php echo $newInvoice['building_id']->renderError() ?>
                    <div class="col-md-9"><?php echo $newInvoice['building_id']->render(array('class' => 'chzn-select')) ?></div>
                  </div>
                  <div class="form-group col-md-3">
                    <?php echo $newInvoice['number']->renderLabel(__('Factura') . ' Nº:', array('class' => 'col-md-5')) ?>  <?php echo $newInvoice['number']->renderError() ?>
                    <div class="col-md-7"><?php echo $newInvoice['number'] ?></div>
                  </div>
                  <div class="form-group col-md-3">
                    <?php echo $newInvoice['value']->renderLabel(__('Importe:'), array('class' => 'col-md-5')) ?>  <?php echo $newInvoice['value']->renderError() ?>
                    <div class="col-md-7"><?php echo $newInvoice['value'] ?></div>
                  </div>
                </div>
              <?php endforeach ?>
              <?php else: ?>
                <?php $totalInvoices = count($form['Invoices']);?>
                <script type="text/javascript">newfieldscount = <?php echo json_encode($totalInvoices);?>;</script>
              <?php endif ?>
            
            <?php // EDIT FORM TEMPLATE PRINT INVOICES FROM DB ?>
            <?php foreach ($form['Invoices'] as $invoice):?>
            <?php $invoiceValues = $invoice->getValue(); ?>
              <div>
                <div class="form-group col-md-4">
                  <?php echo $invoice['building_id']->renderLabel(__('Edificio:'), array('class' => 'col-md-3')) ?>  <?php echo $invoice['building_id']->renderError() ?>
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
<!--                  <div class="col-md-2">
                    <a class="removenew" href="#" title="Eliminar Registro">
                      <span class="glyphicon glyphicon-remove"></span>
                      <span class="remove-text">Eliminar</span>
                    </a>
                  </div>-->
              </div>
            <?php endforeach ?>

            <?php // EDIT FORM TEMPLATE WITH ADDED INVOICES AFTER ERROR VALIDATION ?>
            <?php if(isset($form['new']) && $form->hasErrors()): ?>
                <?php $totalInvoices = count($form['Invoices']);?>
                <?php $addedInvoices = count($form['new']);?>
                <?php $totalCount = $totalInvoices + $addedInvoices;?>
                <script type="text/javascript">newfieldscount = <?php echo json_encode($totalCount);?>;</script>
              <?php foreach($form['new'] as $newForm ): ?>
                <div>
                  <div class="form-group col-md-4">
                    <?php echo $newForm['building_id']->renderLabel('Edificio:', array('class' => 'col-md-3')) ?>  <?php echo $newForm['building_id']->renderError() ?>
                    <div class="col-md-9"><?php echo $newForm['building_id']->render(array('class' => 'chzn-select')) ?></div>
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
                  <div class="col-md-2">
                    <a class="removenew" href="#" title="Eliminar Registro">
                      <span class="glyphicon glyphicon-remove"></span>
                      <span class="remove-text">Eliminar</span>
                    </a>
                  </div>
                </div>
            <?php endforeach ?>
            <?php endif ?>

            