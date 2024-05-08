function showDropdown() {
  var dropdown = document.getElementById("dropdown");
  var subMenu = $(".dropdown-menu");
  if (dropdown.classList.contains("show")) {
    dropdown.classList.remove("show");
    subMenu.removeClass("show");
  } else {
    dropdown.classList.toggle("show");
    subMenu.addClass("show");
  }
}

function submitFromModal() {
  $("#form-ajax").submit();
}

function redirectPage(url) {
  window.location.href = url;
}

$(document).on('pjax:complete', function (event) {
  feather.replace();
});

function onChangeStatusPromoSaleCabang(dom) {
  reloadAjax(dom, "#promo-sale-cabang-datatable-pjax")
}
function changeDatePicker(date, id) {
  var newDate = new Date(date).toLocaleDateString("id",
    {
      month: "2-digit", day: "2-digit", year: "numeric"
    }
  ).split("/").reverse().join("-");

  $(id).val(newDate);
}


function onChangeStatusPromoBundlingCabang(dom) {
  reloadAjax(dom, "#promo-bundling-cabang-datatable-pjax")
}

function reloadAjax(dom, idPjax) {
  console.log(dom);
  let href = $(dom).data("link");
  let value = $(dom).val();
  let checked = $(dom).prop("checked");
  //  console.log(checked);
  $.ajax({
    type: "POST",
    url: href,
    data: { value, checked },
  })
    .done(function (data) {
      // request done
      $.pjax.reload({ container: idPjax });
    })
    .fail(function () {
      // request failed
    });
}

function pilihCustomerPenjualanKredit(id, idFormInduk){
   setFormValue(id, idFormInduk,'url', 'tujuan', 'format')
   setFormValue(id, idFormInduk,'url2', 'tujuan2', 'format2')
   setFormValue2(id, idFormInduk,'url3', 'tujuan3', 'format3', 'tanggal')
   pilihSo(id, idFormInduk);
   pilihSales(id, idFormInduk);
   detailKreditCustomer(id);
}
function pilihSales(id_customer, idSelect2){
	  var url2 = $(`#${idSelect2}`).data("ajaxload2");
    var target2 = $(`#${idSelect2}`).data("ajaxtarget2");
	$.ajax({
		type: "POST",
		url: url2,
		data: { id_customer: id_customer },
		success: function (isi) {
			$(target2).html(isi);
		},
		error: function (e) {
			// console.log(e);
			// alert("Ambil data gagal");
			$(target2).html("");
		}
	});
}

function detailKreditCustomer(id_customer){
      let url = $(".detail-customer").attr("href");
      let urlDetailCust = url + `/?id_customer=${id_customer}`
      $(".detail-customer").prop("href", urlDetailCust);
      $(".detail-customer").removeClass("disabled");

}
function pilihSo(id_customer, idSelect2) {
  var target = $(`#${idSelect2}`).data("ajaxtarget");
  var data = $(`#${idSelect2}`).data("ajaxdata");
  var url = $(`#${idSelect2}`).data("ajaxload");

  $.ajax({
    type: "POST",
    url: url,
    data: { id_customer: id_customer },
    success: function (isi) {
      $(target).html(isi);
    },
    error: function (e) {
      console.log(e);
      // alert("Ambil data gagal");
      $(target).html("");
    }
  });
}

function setFormValue(id, idFormInduk, url, tujuan, format) {
  var url = $("#" + idFormInduk).data(url);
  var tujuan = $("#" + idFormInduk).data(tujuan);
  var format = $("#" + idFormInduk).data(format);
  $.ajax({
    url: url,
    type: 'get',
    data: { id: id },
    success: function (data) {
      if (format == 'val') {
        $(tujuan).val(data);
        $(tujuan + '-disp').val(data);
      }
      else {
        alert(data);
      }
    }
  });
}
//untuk get tanggal_jatuh_tempo penjualan kredit 
function setFormValue2(id, idFormInduk, url, tujuan, format, tanggal) {
  var url = $("#" + idFormInduk).data(url);
  var tujuan = $("#" + idFormInduk).data(tujuan);
  var format = $("#" + idFormInduk).data(format);
  var tanggal = $("#" + idFormInduk).data(tanggal);
  $.ajax({
    url: url,
    type: 'get',
    data: { id: id, tanggal: tanggal },
    success: function (data) {
      if (format == 'val') {
        $(tujuan).val(data[1]);
        $(tujuan + '-disp').val(data[0]);
      }
      else {
        alert(data);
      }
    }
  });
}

function onChangeStatusRefAkun(data){
    let href = $(data).data('link');
    let value = $(data).val();
    let checked = $(data).prop('checked');
    // let id = $(data).prop('value');
    // console.log(value);
    $.ajax({
        type: 'POST',
        url: href,
        data: { value, checked },
    })
        .done(function (data) {
        // request done
        $.pjax.reload({ container: '#crud-datatable-pjax' });
        })
        .fail(function () {
        // request failed
        });
}


