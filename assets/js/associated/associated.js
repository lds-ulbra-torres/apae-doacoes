 $(function() {
        $.mask.definitions['~'] = "[+-]";
        $("#date").mask("99/99/9999",{placeholder:"mm/dd/yyyy",completed:function(){alert("completed!");}});
        $(".phone").mask("(999) 999-9999");
        $("#phoneExt").mask("(999) 999-9999? x99999");
        $('#cep').mask("99999-99");
        $("#iphone").mask("+33 999 999 999");
        $("#tin").mask("99-9999999");
        $("#ssn").mask("999-99-9999");
        $("#product").mask("a*-999-a999", { placeholder: " " });
        $("#eyescript").mask("~9.99 ~9.99 999");
        $("#po").mask("PO: aaa-999-***");
        $("#pct").mask("99%");
        $("#phoneAutoclearFalse").mask("(999) 999-9999", { autoclear: false, completed:function(){alert("completed autoclear!");} });
        $("#phoneExtAutoclearFalse").mask("(999) 999-9999? x99999", { autoclear: false });


        $("#cpf").mask("999.999.999-99?99999");
        $('#cpf').focusout(function (e) {
            var query = $(this).val().replace(/[^a-zA-Z 0-9]+/g,'');;
            if (query.length == 11) {
                $("#cpf").mask("999.999.999-99?99999");
            }
            if (query.length == 14) {
                $("#cpf").mask("99.999.999/9999-99");
            }
        });

        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });
    });

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