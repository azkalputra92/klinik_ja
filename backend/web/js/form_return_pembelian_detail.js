//saat keyup form jumlah stok retur
$("#jumlah-disp").keyup(function () {
    hitungSubTotalRetur();
});

function hitungSubTotalRetur() {
  //get sub total pembelian detail value
  let getHargaPembelianDisp = convertStringToInt($("#pembeliandetail-harga-disp").val());
  
  //get jumlah stok retur value
  let getJumlahDisp = convertStringToInt($("#jumlah-disp").val());

  //get diskon persen pembelian detail value
  
  let getDiskonHargaDisp = 0;
  if ($("#pembeliandetail-diskon_harga-disp").val() != '') {
     getDiskonHargaDisp = convertStringToInt($("#pembeliandetail-diskon_harga-disp").val());
  }
  
  //hasil perhitungan jumlah harga
  const jumlahHarga = (getJumlahDisp * getHargaPembelianDisp) - getDiskonHargaDisp;

  //untuk menset sub total retur
  $("#returnpembeliandetail-sub_total-disp").val(jumlahHarga);
  $("#returnpembeliandetail-sub_total").val(jumlahHarga);
}

//untuk konversi string ke integer
function convertStringToInt($number = 0){
  $number = String($number).replace(/\,/g,"");
  return parseInt($number);
}