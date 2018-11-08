$("#checkAll__").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});

$("#checkAll__").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});

var checkAll = $("#checkAll");
checkAll.click(function () {
  if ( $(this).is(':checked') ){
    $('input:checkbox').prop("checked", true);
  }else{
    $('input:checkbox').prop("checked", false);
  }
});