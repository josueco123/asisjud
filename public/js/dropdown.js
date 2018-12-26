$(function(){
    $('#tipojuzgado').on('change',onSelectTipoJuzgado);
});

function onSelectTipoJuzgado(){
    var tipojuzgado = $(this).val();
    
    //Ajax

    $.get('api/juzgado/'+tipojuzgado+'/tipo',function(data){
        var html_select = '<option value="">seleciona</option>';
        for(var i=0; i<data.length;i++){
            html_select +='<option value="'+data[i].id +'">'+ data[i].nombre +'</option>'
        }
        $('#juzgado').html(html_select);
    });
    
}