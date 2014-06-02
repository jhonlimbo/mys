<?php slot('body_class') ?>class="<?php echo strtolower($sf_params->get('module')) . "-" . $sf_params->get('action');?>"<?php end_slot(); ?>
<?php slot('sectionTitle') ?><?php echo __('Agenda de Pagos a Proveedores')?><?php end_slot(); ?>
  <div class="row">
    <div id="right-wrapper" class="col-md-1">
      <? include_partial('paymentDate/form', array('form' => $form)) ?>
    </div>
    <div class="col-md-11">
      <div class="page-header pull-right">
        <h3 class="date-title"></h3>        
        <div class="form-inline pull-right">
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
      </div>
      <div id="calendar"></div>
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
    $( "#payment_date_date" ).datepicker({

      dateFormat: "yy-mm-dd",
      beforeShowDay: $.datepicker.noWeekends,
      duration: "slow",
      minDate: 0,
      maxDate: "+2m"
    });

  </script>



<script>

isLarge = false;
isActive = false;

$(document).ready(function(){
  if ($('.error')[0] || $('#payment_date_Invoices_0_number').length){
    $("#payform").width( '990px' );
    $('#payform').toggleClass('expanded', isLarge == false);
    isLarge = true;
  }


  $('.expand').click(function(){
    $("#payform").animate({left:(isLarge ? '15' : '15'),'min-height':(isLarge ? '0' : '159px'),width:(isLarge ? '34px' : '990px')});
    $('#payform').toggleClass('expanded', isLarge == false);
    isLarge = !isLarge;
  });

  $('input:checkbox').click(function(){
     $(this).parent('div').children('span.highlight-delete').toggleClass('glyphicon glyphicon-ok', this.checked);
     $(this).parent('div').children('label.cursor-pointer').toggleClass('highlight-delete', this.checked);
  });



}); 
</script> 




<script>
//para hacer el script de arriba, luego borrar
/*
isLarge = false;
isActive = false;

$(document).ready(function(){
  if ($('.error')[0] || $('#payment_date_Invoices_0_number').length){
    $("#payform").width( '990px' );
    $('#payform').toggleClass('expanded', isLarge == false);
    isLarge = true;
  }


  $('.expand').click(function(){
    $("#payform").animate({left:(isLarge ? '15' : '15'),'min-height':(isLarge ? '0' : '159px'),width:(isLarge ? '34px' : '990px')});
    $('#payform').toggleClass('expanded', isLarge == false);
    isLarge = !isLarge;    
  });

  $('.highlight-delete').click(function(){
    $('.highlight-delete').toggleClass('toto', isActive == false);
    isActive = !isActive;    
  });
});*/ 
</script>