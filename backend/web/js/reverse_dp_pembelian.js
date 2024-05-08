function pilihNoDpPembelian(id){
    var url = $( "#id_dp_pembelian").data('url');
    var tujuan = $( "#id_dp_pembelian").data('tujuan');
    var format = $( "#id_dp_pembelian").data('format');
    $.ajax({
      url: url,
      type: "get",
      data: { id: id },
      success: function (data) {
        if (data != "id melebihi batas 99") {
          if (format == "val") {
            $(tujuan).val(data);
          }
        } else {
          alert(data);
        }
      },
    });
}


function setJumlahDp(id){
    var url = $( "#id_dp_pembelian").data('url2');
    var tujuan_disp = $( "#id_dp_pembelian").data('tujuan2');
    var format_disp = $( "#id_dp_pembelian").data('format2');
    var tujuan = $( "#id_dp_pembelian").data('tujuan5');
    var format = $( "#id_dp_pembelian").data('format5');
    $.ajax({
      url: url,
      type: "get",
      data: { id: id },
      success: function (data) {
        if (data != "id melebihi batas 99") {
          if (format == "val") {
            $(tujuan).val(data);
            $(tujuan_disp).val(data);
            $("#reversedppembelian-jumlah").val(data);
          }
        } else {
          alert(data);
        }
      },
    });
}


function setSupplier(id){
    var url = $( "#id_dp_pembelian").data('url3');
    var tujuan = $( "#id_dp_pembelian").data('tujuan3');
    var format = $( "#id_dp_pembelian").data('format3');
    $.ajax({
      url: url,
      type: "get",
      data: { id: id },
      success: function (data) {
        if (data != "id melebihi batas 99") {
          if (format == "val") {
            $(tujuan).val(data);
          }
        } else {
          alert(data);
        }
      },
    });
}


function pilihJenisPembayaran(id){
    var url = $( "#id_jenis_pembayaran").data('url4');
    var tujuan = $( "#id_jenis_pembayaran").data('tujuan4');
    var format = $( "#id_jenis_pembayaran").data('format4');
    $.ajax({
      url: url,
      type: "get",
      data: { id: id },
      success: function (data) {
        if (data != "id melebihi batas 99") {
          if (format == "val") {
              $(tujuan).val(data);
          }
        } else {
          alert(data);
        }
      },
    });
}

