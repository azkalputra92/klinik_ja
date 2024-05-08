function pilihCustomerPenjualanTunai(id, idFormInduk){
   pilihSales(id, idFormInduk)
   pilihSo(id, idFormInduk);
} 

function pilihSales(id_customer, idSelect2){
	var url2 = $(`#${idSelect2}`).data("ajaxload2");
    var target2 = $(`#${idSelect2}`).data("ajaxtarget2");
	console.log('test sales')
	$.ajax({
		type: "POST",
		url: url2,
		data: { id_customer: id_customer },
		success: function (isi) {
			$(target2).html(isi);
		},
		error: function (e) {
			console.log(e);
			alert("Ambil data gagal");
			$(target).html("");
		}
	});
}
function pilihSo(id_customer, idSelect2){
	
    var target = $(`#${idSelect2}`).data("ajaxtarget");
	var data = $(`#${idSelect2}`).data("ajaxdata");
	var url = $(`#${idSelect2}`).data("ajaxload");

	$.ajax({
		type: "POST",
		url: url,
		data: { id_customer: id_customer },
		success: function (isi) {
			// console.log(isi);
			$(target).html(isi);
		},
		error: function (e) {
			console.log(e);
			alert("Ambil data gagal");
			$(target).html("");
		}
	});
}