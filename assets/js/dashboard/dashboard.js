$('a.btn-open-filter').click(function(){
    filter = $('.filter');
    filter_plus = $('.filter-plus');

    if($(this).html() == "+ Filtro"){
        filter_plus.show();
        $(this).html("- Filtro");
    } else{
        filter_plus.hide();
        $(this).html("+ Filtro");
    }
});