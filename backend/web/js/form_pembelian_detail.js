//saat keyup form quantity
$("#pembeliandetail-jumlah-disp").keyup(function () {
  hitungJumlahHarga();
});

//saat keyup form @harga beli 
$("#harga-disp").keyup(function () {
  hitungJumlahHarga();
});

//saat keyup form diskon (%)
$("#diskon_persen-disp").keyup(function () {
  hitungDiskonHarga();
});

//saat keyup form diskon (Rp)
$("#diskon_harga-disp").keyup(function () {
  hitungDiskonPersen();
});

function hitungJumlahHarga() {
  //get quantity value
  let getJumlahDisp = convertStringToInt($("#pembeliandetail-jumlah-disp").val());
  //get harga beli value
  let getHargaDisp = convertStringToInt($("#harga-disp").val());

  //cek jika NaN maka variable getHargaDisp menjadi 0
  if (isNaN(getHargaDisp)) {
    getHargaDisp = 0;
  }

 //cek jika NaN maka variable getJumlahDisp menjadi 0
 if (isNaN(getJumlahDisp)) {
    getJumlahDisp = 0;
  }
  
  //hasil perhitungan jumlah harga
  const jumlahHarga = getJumlahDisp * getHargaDisp;

  //untuk menset jumlah harga
  $("#harga_total-disp").val(jumlahHarga);
  $("#pembeliandetail-harga_total").val(jumlahHarga);

  //untuk menset form sub total
  $("#sub_total-disp").val(jumlahHarga);
  $("#pembeliandetail-sub_total").val(jumlahHarga);
}

function hitungDiskonHarga() {
  let getDiskonPersenDisp = convertStringToInt($("#diskon_persen-disp").val());
  let getHargaTotalDisp = convertStringToInt($("#harga_total-disp").val());

  //menghitung nilai untuk form diskon(Rp)
  let totalDiskon = getHargaTotalDisp * getDiskonPersenDisp / 100;
  //pengecekan saat totalDiskon telah melebih Diskon (Rp)
  if (totalDiskon > getHargaTotalDisp) {
    totalDiskon = 0;
  }

  //untuk menset form harga
  $("#diskon_harga-disp").val(totalDiskon);
  $("#pembeliandetail-diskon_harga").val(totalDiskon);

  if($("#diskon_persen-disp").val() == ""){
    totalDiskon = 0;
  }

  //hitung sub total
  const subTotal = getHargaTotalDisp - totalDiskon;
  
  //untuk menset form sub total
  $("#sub_total-disp").val(subTotal);
  $("#pembeliandetail-sub_total").val(subTotal);
}

function hitungDiskonPersen() {
  let getDiskonHargaDisp = convertStringToInt($("#diskon_harga-disp").val());
  const getHargaTotalDisp = convertStringToInt($("#harga_total-disp").val());

  //menghitung nilai untuk form diskon(%)
  let totalDiskon = getDiskonHargaDisp / getHargaTotalDisp * 100;
  //pengecekan saat totalDiskon telah melebihi 100%
  if (totalDiskon > 100) {
    totalDiskon = 0;
  }
  $("#diskon_persen-disp").val(totalDiskon);
  $("#pembeliandetail-diskon_persen").val(totalDiskon);

   if($("#diskon_harga-disp").val() == ""){
    getDiskonHargaDisp = 0;
  }

   //hitung sub total
  let subTotal = getHargaTotalDisp - getDiskonHargaDisp ;

  //pengecekan saat sub total melebihi harga total
  if (subTotal > getHargaTotalDisp) {
    subTotal = 0;
  }

  if(getDiskonHargaDisp > getHargaTotalDisp){
    subTotal = 0;
  }

  //untuk menset form sub total
  $("#sub_total-disp").val(subTotal);
  $("#pembeliandetail-sub_total").val(subTotal);
}

//untuk konversi string ke integer
function convertStringToInt($number = 0){
  $number = String($number).replace(/\,/g,"");
  return parseInt($number);
}