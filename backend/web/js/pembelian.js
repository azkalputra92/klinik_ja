function pilihSupplier(id , idHtml){
    getTanggalJatuhTempo(id,idHtml)
    getListPoPembelian(id, idHtml);
}

function getListPoPembelian(id,idHtml){
  var url = $(`#${idHtml}`).data("url2");
  var target = $(`#${idHtml}`).data("tujuan2");

  $.ajax({
		type: "POST",
		url: url,
		data: { id_supplier: id },
		success: function (isi) {
			console.log(isi);
			$(target).html(isi);
		},
		error: function (e) {
			console.log(e);
			alert("Ambil data gagal");
			$(target).html("");
		}
  });
}
function getTanggalJatuhTempo(id,idHtml){
var url = $(`#${idHtml}`).data("url");
var tujuan = $(`#${idHtml}`).data("tujuan");
var format = $(`#${idHtml}`).data("format");
$.ajax({
	url: url,
	type: "get",
	data: { id: id },
	success: function (data) {
		if (format == "val") {
			$(tujuan).val(data);
			//untuk mendapatkan tanggal invoice
			const getTanggalInvoice = $(
				"#pembelian-tanggal_invoice-disp"
			).val();
			const getTerm = parseInt($("#term").val()) || 0;

			if (getTanggalInvoice !== "" && getTerm !== null) {
				//untuk membuat tanggal getInvoice menjadi date
				var tanggalBulanTahun = getTanggalInvoice.split("-");
				var tahun = parseInt(tanggalBulanTahun[2]);
				var bulan = parseInt(tanggalBulanTahun[1]) - 1; // index bulan di mulai dari 0;
				var tanggal = parseInt(tanggalBulanTahun[0]);

				let date = new Date(tahun, bulan, tanggal);
				//untuk menambahkan hari date yang didapat dengan nilai term
				date.setDate(date.getDate() + getTerm);
				//formatDateDisp untuk mengubah format date menjadi format dd-mm-yyyy
				let addDateDisp = formatDateDisp(date);
				//formatDateDatabase untuk mengubah format date menjadi format yyyy-mm-dd
				let addDateDatabase = formatDateDatabase(date);
				$("#pembelian-tanggal_jatuh_tempo-disp").val(addDateDisp);
				$("#pembelian-tanggal_jatuh_tempo").val(addDateDatabase);
			} else {
				null;
			}
		} else {
			alert(data);
		}
	}
});
}
//function untuk set format dari dd-mm-yyyy ke mm-dd-yyyy
function setFormatDDMMYYYYtoMMDDYYYY(date, separator = '-') {
    const [day, month, year, ] = date.split('-');
    return month + separator + day + separator + year;
}

//function untuk menambahkan 0 didepan jika hanya 1 digit
function padTo2Digits(num) {
  return num.toString().padStart(2, '0');
}

//function untuk convert dari format date menjadi dd-mm-yyyy
function formatDateDisp(date = new Date()) {
  return [
    padTo2Digits(date.getDate()),
    padTo2Digits(date.getMonth() + 1),
    date.getFullYear(),
  ].join('-');
}

//function untuk convert dari format date menjadi yyyy-mm-dd
function formatDateDatabase(date = new Date()) {
  return [
    date.getFullYear(),
    padTo2Digits(date.getMonth() + 1),
    padTo2Digits(date.getDate()),
  ].join('-');
}

function generateTanggalJatuhTempo(){
    const getTerm = $("#term").val();
    if (getTerm !== '') {
        //untuk mendapatkan tanggal invoice
        const getTanggalInvoice = $("#pembelian-tanggal_invoice-disp").val();
        const getTerm = parseInt($("#term").val()) || 0;
        if(getTanggalInvoice !== null && getTerm !== null){
          const getTanggalInvoice = $("#pembelian-tanggal_invoice-disp").val();

          var tanggalBulanTahun = getTanggalInvoice.split("-");
          var tahun = parseInt(tanggalBulanTahun[2]);
          var bulan = parseInt(tanggalBulanTahun[1]) - 1; // index bulan di mulai dari 0;
          var tanggal = parseInt(tanggalBulanTahun[0]);
          
          //untuk membuat tanggal getInvoice menjadi date
          let date = new Date(tahun,bulan,tanggal);
          //untuk mendapatkan nilai term dan mengubah nilai term menjadi integer
          //untuk menambahkan hari date yang didapat dengan nilai term
          date.setDate(date.getDate() + getTerm);
          //formatDateDisp untuk mengubah format date menjadi format dd-mm-yyyy
          let addDateDisp = formatDateDisp(date);
          //formatDateDatabase untuk mengubah format date menjadi format yyyy-mm-dd
          let addDateDatabase = formatDateDatabase(date);
          $("#pembelian-tanggal_jatuh_tempo-disp").val(addDateDisp);
          $("#pembelian-tanggal_jatuh_tempo").val(addDateDatabase);
        }
        else{
          $("#pembelian-tanggal_jatuh_tempo-disp").val(null);
          $("#pembelian-tanggal_jatuh_tempo").val(null);
        }
    } 
}

