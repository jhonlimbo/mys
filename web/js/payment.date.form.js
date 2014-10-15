/* web/js/payment-date-form.js */
newfieldscount = 0;

function addNewField(num){
  return $.ajax({
    type: 'GET',
    url: '/add?num='+num,
    async: false
  }).responseText;
}      

  function calcTotalValue() {
    totalValue = 0;
    $(".invoice_value").each(
      function(index, value) {
        var invoice_value = $(this).val() || 0;
        totalValue = (Number(totalValue) + Number(invoice_value)).toFixed(2);
      }
    );
    $("#paydateTotal").val(totalValue);
  }

var removeNew = function(){
  $('.removenew').click(function(e){
    e.preventDefault();
    $(this).parent().parent().remove();
  })
};

$(document).ready(function(){
  $('#addinvoice').click(function(e){
    e.preventDefault();
    $('div#invoice-form').append(addNewField(newfieldscount));
    newfieldscount = newfieldscount + 1;

    $(".chzn-select").chosen({
      allow_single_deselect:true,
      disable_search_threshold: 10,
      no_results_text: "No hay resultados",
      search_contains: true,
      width: "100%"
    });

    $('.removenew').unbind('click');
    removeNew();

    $(".invoice_value").on({
      keyup: calcTotalValue
    });
  });

  $(".invoice_value").on({
    keyup: calcTotalValue
  });

});

