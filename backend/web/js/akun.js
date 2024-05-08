function pilihAkun(id){
    var url = $( "#id_induk").data('url');
    var tujuan = $( "#id_induk").data('tujuan');
    var format = $( "#id_induk").data('format');
    $.ajax({
        url: url,
        type: 'get',
        data: {id:id},
        success: function (data) {
            if(data != 'id melebihi batas 99') {
                if(format == 'val'){
                    $(tujuan).val(data);
                }
            } else {
                alert(data);
            }
        }
    });
}
