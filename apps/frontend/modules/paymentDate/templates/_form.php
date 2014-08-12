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
      <div class="panel panel-default expanded" id="payform">
        <div class="panel-heading text-center expand">
          <h4 data-toggle="tooltip" data-placement="top" title="Formulario Fecha de Pago: Mostrar | Ocultar">
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
              <? include_partial('paymentDate/paydateDataForm', array('form' => $form)) ?>
            </div>

            <div id="invoice-form">
              <? include_partial('paymentDate/invoiceDataForm', array('form' => $form)) ?>
            </div>
            <input class="pull-right form-submit" type="submit" value="<?php echo __('Guardar')?>" />            
            <!--<input type="button" value=" Print this page " onclick="window.print();return false;" />-->
            <label for="paydateTotal" class="total-paydate">Total: $.<input type="text" id="paydateTotal" value="0" readonly/><label>
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


