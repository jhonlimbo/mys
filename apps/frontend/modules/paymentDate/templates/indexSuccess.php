<?php slot('body_class') ?>class="<?php echo strtolower($sf_params->get('module')) . "-" . $sf_params->get('action');?>"<?php end_slot(); ?>
<?php slot('sectionTitle') ?><?php echo __('Agenda de Pagos a Proveedores')?><?php end_slot(); ?>

<? !isset($form->title)?'Editar': $form->title;?>
  <div class="row">

    <?php //FORMULARIO?>
    <div id="left-wrapper" class="col-md-1">
      <? include_partial('paymentDate/form', array('form' => $form)) ?>
    </div>

    <div class="col-md-11">
    <?php //CALENDARIO?>
      <? include_partial('paymentDate/calendar', array()) ?>
    </div>
  </div>
  <? include_partial('paymentDate/calendarModal', array()) ?>



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
  isLarge = true;
  isActive = false;

  $(document).ready(function(){
    if ($('.error')[0] || $('#payment_date_Invoices_0_number').length){
      $("#payform").width( '990px' );
      $('#payform').toggleClass('expanded', isLarge == true);
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

    $( window ).load( calcTotalValue );
  }); 
</script> 

<script type="text/javascript">
  $(function(){
    $(".chzn-select").chosen({
      allow_single_deselect:true,
      disable_search_threshold: 10,
      no_results_text: "No hay resultados",
      search_contains: true,
      width: "100%"
    });
  });
</script>

