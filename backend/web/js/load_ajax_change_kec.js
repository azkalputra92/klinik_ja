$(document).on("change", ".load_ajax_change_kec", function (e) {
  var target = $(this).data("ajaxtarget");
  var data = $(this).data("ajaxdata");
  var load = $(this).data("ajaxload");
  var format = $(this).data("format");
  var data_arr = data.split("|");

  var keys = "";
  for (i = 0; i < data_arr.length; i++) {
    var key = $(data_arr[i]).val();
    keys += key + "|";
  }

  $(target).html("mengambil data ...");

  $.ajax({
    type: "POST",
    url: load,
    data: { keys: keys },
    success: function (isi) {
      console.log(isi);

      $(target).html(isi);
    },
    error: function (e) {
      console.log(e);
      alert("Ambil data gagal");
      $(target).html("");
    },
  });
});
