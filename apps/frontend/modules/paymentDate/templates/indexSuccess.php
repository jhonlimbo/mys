<?php slot('body_class') ?>class="<?php echo strtolower($sf_params->get('module')) . "-" . $sf_params->get('action');?>"<?php end_slot(); ?>

  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center"><?php echo __('Agenda de Pago a Proveedores')?></h2>
    </div>
  </div>

  <div class="row">
    <div class="col-md-9">
      <div class="page-header">
        <div class="pull-right form-inline">
          <div class="btn-group">
            <button class="btn btn-primary" data-calendar-nav="prev"><< <?php echo __('Prev')?></button>
            <button class="btn btn-default" data-calendar-nav="today"><?php echo __('Today')?></button>
            <button class="btn btn-primary" data-calendar-nav="next"><?php echo __('Next')?> >></button>
          </div>
          <div class="btn-group">
            <button class="btn btn-warning" data-calendar-view="year"><?php echo __('Year')?></button>
            <button class="btn btn-warning active" data-calendar-view="month"><?php echo __('Month')?></button>
            <button class="btn btn-warning" data-calendar-view="week"><?php echo __('Week')?></button>
            <!--<button class="btn btn-warning" data-calendar-view="day">Day</button>-->
          </div>
        </div>

        <h3 class="date-title"></h3>
      </div>
      <div id="calendar"></div>
    </div>
    <div class="col-md-3">
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
      <div class="panel panel-default">
        <div class="panel-heading text-center">
          <h4><?php echo __('Nueva Fecha de Pago')?></h4>
        </div>
        <form class="form-horizontal" action="<?php echo url_for('@submit') ?>" method="post">
          <?php echo $form->renderHiddenFields() ?>
          <div class="form-group">
            <?php echo $form['supplier_id']->renderLabel(__('Proveedor:'), array('class' => 'col-md-4'))?> 
            <?php echo $form['supplier_id']->renderError()?> 
            <div class="col-md-8">
              <?php echo $form['supplier_id'] ?>
            </div>
          </div>
          <div class="form-group">
            <?php echo $form['date']->renderLabel(__('Fecha de Pago:'), array('class' => 'col-md-5'))?> 
            <?php echo $form['date']->renderError()?> 
            <div class="col-md-7">
              <?php echo $form['date'] ?>
            </div>
          </div>
          <div id="invoice-form">
            <?php if ($form->getObject()->isNew()): ?>
            <script type="text/javascript">newfieldscount = 1;</script>
              <div class="form-group">
                <?php echo $form['new'][0]['building_id']->renderLabel('Edificio:', array('class' => 'col-md-4')) ?>  <?php echo $form['new'][0]['building_id']->renderError() ?>
                <div class="col-md-8"><?php echo $form['new'][0]['building_id'] ?></div>
              </div>
              <div class="form-group">
                <?php echo $form['new'][0]['number']->renderLabel(__('Invoice') . ' Nº:', array('class' => 'col-md-4')) ?>  <?php echo $form['new'][0]['number']->renderError() ?>
                <div class="col-md-8"><?php echo $form['new'][0]['number'] ?></div>
              </div>
              <div class="form-group">
                <?php echo $form['new'][0]['value']->renderLabel(__('Importe:'), array('class' => 'col-md-4')) ?>  <?php echo $form['new'][0]['value']->renderError() ?>
                <div class="col-md-8"><?php echo $form['new'][0]['value'] ?></div>
              </div>
            <?php endif ?>
          </div>
          <a id="addinvoice" href="#"><?php echo __('Agregar Factura')?></a>
          <input class="pull-right" type="submit" value="<?php echo __('Guardar')?>" />
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Event</h4>
        </div>
        <div class="modal-body" style="height: 400px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript" src="/js/calendar.js"></script>
  <script type="text/javascript" src="/js/app.js"></script>

<script type="text/javascript">


</script>

<?php /*
function isWeekend($date) {
    return (date('N', strtotime($date)) >= 6);
}
var_dump(isWeekend('2014-03-21'));
 */

?>


