function ajaxLoad(kode){
    var url = $( "#id_kelompok_barang").data('url');
    var tujuan = $( "#id_kelompok_barang").data('tujuan');
    var format = $( "#id_kelompok_barang").data('format');
    $.ajax({
        url: url,
        type: 'get',
        data: {kode:kode},
        success: function (isi) {
			$(target2).html(isi);
		},
    });
}