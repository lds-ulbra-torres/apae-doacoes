$(document).ready(function(){

  if($('#id_payment_type').val() == 1){
    $('#div_bank').removeClass('hide');
  }else{
    $('#div_bank').addClass('hide');
  }

  $('input').change(function(){
    $("#error_" + $(this).attr('id')).addClass('hide');
  });

  $('#id_payment_type').change(function(e){
    if(this.value == 1){
      $('#div_bank').removeClass('hide');
    }else{
      $('#div_bank').addClass('hide');
    }
  });
});

$('#contact_modal').ready(function() {
  var id_contact_type,
  name_contact_type,
  contacts = [];

  $('#create_contact').on("click", function() {
    contact_value = $('#contact_description').val();
    id_contact_type = $("#contact_type").val();
    name_contact_type = $("#contact_type").find("option[value='"+id_contact_type+"']").data("name");

    var $contacts = $('#contacts');

    $div = $('<div>').attr({class: "contact"});
    $btn = $('<button>').attr({class: "close", type: "button"});
    $span = $('<span>').html("&times;");
    $btn.append($span);
    $btn[0].onclick = function() {
      this.parentNode.parentNode.removeChild(this.parentNode);
    };
    $div.append($btn);
    $div.append('<input type="hidden" name="contact[]" value="'+id_contact_type+'/'+contact_value+'"><strong>'+name_contact_type+':</strong>'+contact_value);
    $contacts.append($div);
    $div.data("type",id_contact_type);
    $div.data("value",contact_value);
  });
});
