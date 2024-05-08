function pilihCabang(id) {
  var url = $("#id_cabang_utama").data("url");
  var tujuan = $("#id_cabang_utama").data("tujuan");
  var format = $("#id_cabang_utama").data("format");
  $.ajax({
    url: url,
    type: "get",
    data: { idCabang: id },
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
