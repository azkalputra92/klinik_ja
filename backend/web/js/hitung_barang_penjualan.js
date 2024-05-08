//saat keyup form quantity

    $("#jumlah").keyup(function () {
    hitungJumlahHarga();
    hitungDiskonHarga();
    });

    //saat keyup form @harga beli 
    $("#harga").keyup(function () {
    hitungJumlahHarga();
    hitungDiskonHarga();
    });

    //saat keyup form diskon (%)
    $("#diskon_persen").keyup(function () {
    hitungDiskonHarga();
    });

    //saat keyup form diskon (Rp)
    $("#diskon_harga").keyup(function () {
    hitungDiskonPersen();

    //set diskon detail
    setDiskonDetail();
    disabledDiskonDetail()
    });

    function hitungJumlahHarga() {
    //get quantity value
    let getJumlahDisp = convertStringToInt($("#jumlah").val());
    //get harga beli value
    let getHargaDisp = $("#harga").val().split(".").join("");
    getHargaDisp = parseFloat(getHargaDisp)
    console.log(getHargaDisp)
    //get diskon persen
    let getDiskonHargaDisp = convertStringToInt($("#diskon_harga").val() || 0 );

    console.log(getDiskonHargaDisp)

    //cek jika NaN maka variable getHargaDisp menjadi 0
    if (isNaN(getHargaDisp)) {
        getHargaDisp = 0;
    }

    //cek jika NaN maka variable getJumlahDisp menjadi 0
    if (isNaN(getJumlahDisp)) {
        getJumlahDisp = 0;
    }
    
    //cek jika NaN maka variable getJumlahDisp menjadi 0
    if (isNaN(getDiskonHargaDisp)) {
        getDiskonHargaDisp = 0;
    }
    
    //hasil perhitungan jumlah harga
    const jumlahHarga = getJumlahDisp * getHargaDisp;

    //hasil sub total
    const subTotalHarga = (getJumlahDisp * getHargaDisp) - getDiskonHargaDisp;


    //untuk menset jumlah harga
    $("#harga_total-disp").val(jumlahHarga);
    $("#harga_total").trigger("change")
    $("#harga_total").val(jumlahHarga);
    
    
    //untuk menset form sub total
    $("#sub_total-disp").val(subTotalHarga);
    $("#sub_total").trigger("change")
    $("#sub_total").val(subTotalHarga);
    }

    function hitungDiskonHarga() {
    let getDiskonPersenDisp = $("#diskon_persen").val().split(".").join("")
    //   let getDiskonPersenDisp = convertStringToInt($("#diskon_persen").val());
    let getHargaTotalDisp = convertStringToInt($("#harga_total").val());

    //menghitung nilai untuk form diskon(Rp)
    let totalDiskon = getHargaTotalDisp * getDiskonPersenDisp / 100;
    //pengecekan saat totalDiskon telah melebih Diskon (Rp)
    if (totalDiskon > getHargaTotalDisp) {
        totalDiskon = 0;
    }

    //perbaikan diskon
    if (getHargaTotalDisp == 0) {
        totalDiskon = null;
    }

    if (isNaN(getDiskonPersenDisp)) {
        totalDiskon = null;
    }

    //untuk menset form harga
    $("#diskon_harga").val(totalDiskon);
    $("#diskon_harga").val(totalDiskon);

    if($("#diskon_persen").val() == ""){
        totalDiskon = 0;
    }

    //hitung sub total
    const subTotal = getHargaTotalDisp - totalDiskon;
    
    //untuk menset form sub total
    $("#sub_total-disp").val(subTotal);

    $("#sub_total").trigger("change")
    $("#sub_total").val(subTotal);
    }

    function hitungDiskonPersen() {
    let getDiskonHargaDisp = convertStringToInt($("#diskon_harga").val());
    const getHargaTotalDisp = convertStringToInt($("#harga_total").val());

    //menghitung nilai untuk form diskon(%)
    let totalDiskon = getDiskonHargaDisp / getHargaTotalDisp * 100;
    //pengecekan saat totalDiskon telah melebihi 100%
    if (totalDiskon > 100) {
        totalDiskon = 0;
    }
    $("#diskon_persen").val(totalDiskon);
    $("#diskon_persen").val(totalDiskon);

    if($("#diskon_harga").val() == ""){
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
    $("#sub_total").val(subTotal);
    $("#sub_total").val(subTotal);
    }

    //untuk konversi string ke integer
    function convertStringToInt($number = 0){
    $number = String($number).replace(/\./g,"");
    return parseInt($number);
    }

    function setDiskonDetail(){
        tags.splice(0);
        $("#produk-tag").val(tags)
        $(".tag").remove();

        const getDiskon = $("#diskon_persen").val();
        $("#tag").val(getDiskon);
        $("#produk-tag").val(getDiskon);
    }

    function disabledDiskonDetail(){
        const diskonInput = $("#tag").val();
        if (diskonInput.length === 0){
            document.getElementById("tag").disabled = false;
        } else{
            document.getElementById("tag").disabled = true;
        }
    }
