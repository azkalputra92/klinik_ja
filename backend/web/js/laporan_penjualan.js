$(".field-viewlaporanpenjualandetail-dari_tanggal").hide();
$(".field-viewlaporanpenjualandetail-sampai_tanggal").hide();
$(".field-viewlaporanpenjualandetail-dari").hide();
$(".field-viewlaporanpenjualandetail-sampai").hide();
$(".field-viewlaporanpenjualandetail-kelompok_barang").hide();
$(".field-viewlaporanpenjualandetail-dari_no_jual").hide();
$(".field-viewlaporanpenjualandetail-sampai_no_jual").hide();
$(".field-viewlaporanpenjualandetail-dari_kode_stok").hide();
$(".field-viewlaporanpenjualandetail-sampai_kode_stok").hide();
$(".field-viewlaporanpenjualandetail-dari_kode_customer").hide();
$(".field-viewlaporanpenjualandetail-sampai_kode_customer").hide();
$(".field-viewlaporanpenjualandetail-dari_kode_salesman").hide();
$(".field-viewlaporanpenjualandetail-sampai_kode_salesman").hide();
$(".field-viewlaporanpenjualandetail-bidang_usaha").hide();
$(".field-viewlaporanpenjualandetail-wilayah").hide();
$(".field-viewlaporanpenjualandetail-kota").hide();
$(".field-viewlaporanpenjualandetail-kecamatan").hide();

    
$(document).on("change", "#versi", function () {
    console.log($(this).val());

    $(".field-viewlaporanpenjualandetail-dari_tanggal").hide();
    $(".field-viewlaporanpenjualandetail-sampai_tanggal").hide();
    $(".field-viewlaporanpenjualandetail-dari").hide();
    $(".field-viewlaporanpenjualandetail-sampai").hide();
    $(".field-viewlaporanpenjualandetail-kelompok_barang").hide();
    $(".field-viewlaporanpenjualandetail-dari_no_jual").hide();
    $(".field-viewlaporanpenjualandetail-sampai_no_jual").hide();
    $(".field-viewlaporanpenjualandetail-dari_kode_stok").hide();
    $(".field-viewlaporanpenjualandetail-sampai_kode_stok").hide();
    $(".field-viewlaporanpenjualandetail-dari_kode_customer").hide();
    $(".field-viewlaporanpenjualandetail-sampai_kode_customer").hide();
    $(".field-viewlaporanpenjualandetail-dari_kode_salesman").hide();
    $(".field-viewlaporanpenjualandetail-sampai_kode_salesman").hide();
    $(".field-viewlaporanpenjualandetail-bidang_usaha").hide();
    $(".field-viewlaporanpenjualandetail-wilayah").hide();
    $(".field-viewlaporanpenjualandetail-kota").hide();
    $(".field-viewlaporanpenjualandetail-kecamatan").hide();

    $(".field-viewlaporanpenjualandetail-dari_tanggal").val('');
    $(".field-viewlaporanpenjualandetail-sampai_tanggal").val('');
    $(".field-viewlaporanpenjualandetail-dari").val('');
    $(".field-viewlaporanpenjualandetail-sampai").val('');
    $(".field-viewlaporanpenjualandetail-kelompok_barang").val('');
    $(".field-viewlaporanpenjualandetail-dari_no_jual").val('');
    $(".field-viewlaporanpenjualandetail-sampai_no_jual").val('');
    $(".field-viewlaporanpenjualandetail-dari_kode_stok").val('');
    $(".field-viewlaporanpenjualandetail-sampai_kode_stok").val('');
    $(".field-viewlaporanpenjualandetail-dari_kode_customer").val('');
    $(".field-viewlaporanpenjualandetail-sampai_kode_customer").val('');
    $(".field-viewlaporanpenjualandetail-dari_kode_salesman").val('');
    $(".field-viewlaporanpenjualandetail-sampai_kode_salesman").val('');
    $(".field-viewlaporanpenjualandetail-bidang_usaha").val('');
    $(".field-viewlaporanpenjualandetail-wilayah").val('');
    $(".field-viewlaporanpenjualandetail-kota").val('');
    $(".field-viewlaporanpenjualandetail-kecamatan").val('');
    // $("#viewlaporanpenjualandetail-kelompok_barang").val('');


    $("#viewlaporanpenjualandetail-kelompok_barang").val(null).trigger("change");
    // $("#viewlaporanpenjualandetail-dari_tanggal").val(null).trigger("change"); 
    // $("#viewlaporanpenjualandetail-sampai_tanggal").val(null).trigger("change"); 
    // $("#viewlaporanpenjualandetail-dari_tanggal-disp").val(null).trigger("change"); 
    // $("#viewlaporanpenjualandetail-sampai_tanggal-disp").val(null).trigger("change");

    if ($(this).val() == 'Tanggal') {
        $(".field-viewlaporanpenjualandetail-dari_tanggal").show();
        $(".field-viewlaporanpenjualandetail-sampai_tanggal").show();
        $(".field-viewlaporanpenjualandetail-dari_kode_customer").show();
        $(".field-viewlaporanpenjualandetail-sampai_kode_customer").show();
    }
    else if ($(this).val() == 'No Jual') {
        $(".field-viewlaporanpenjualandetail-dari_tanggal").show();
        $(".field-viewlaporanpenjualandetail-sampai_tanggal").show();
        $(".field-viewlaporanpenjualandetail-dari_no_jual").show();
        $(".field-viewlaporanpenjualandetail-sampai_no_jual").show();
        $(".field-viewlaporanpenjualandetail-dari_kode_customer").show();
        $(".field-viewlaporanpenjualandetail-sampai_kode_customer").show();
    }
    else if ($(this).val() == 'Kode Stok') {
        $(".field-viewlaporanpenjualandetail-dari_tanggal").show();
        $(".field-viewlaporanpenjualandetail-sampai_tanggal").show();
        $(".field-viewlaporanpenjualandetail-kelompok_barang").show();
        $(".field-viewlaporanpenjualandetail-dari_kode_stok").show();
        $(".field-viewlaporanpenjualandetail-sampai_kode_stok").show();
        $(".field-viewlaporanpenjualandetail-dari_kode_customer").show();
        $(".field-viewlaporanpenjualandetail-sampai_kode_customer").show();
    }
    else if ($(this).val() == 'Kelompok Barang') {
        $(".field-viewlaporanpenjualandetail-dari_tanggal").show();
        $(".field-viewlaporanpenjualandetail-sampai_tanggal").show();
        $(".field-viewlaporanpenjualandetail-kelompok_barang").show();
        $(".field-viewlaporanpenjualandetail-dari_kode_customer").show();
        $(".field-viewlaporanpenjualandetail-sampai_kode_customer").show();
    } 
    else if ($(this).val() == 'Kode Customer') {
        $(".field-viewlaporanpenjualandetail-dari_tanggal").show();
        $(".field-viewlaporanpenjualandetail-sampai_tanggal").show();
        $(".field-viewlaporanpenjualandetail-dari_kode_customer").show();
        $(".field-viewlaporanpenjualandetail-sampai_kode_customer").show();
    }
    else if ($(this).val() == 'Kode Salesman') {
        $(".field-viewlaporanpenjualandetail-dari_tanggal").show();
        $(".field-viewlaporanpenjualandetail-sampai_tanggal").show();
        $(".field-viewlaporanpenjualandetail-dari_kode_salesman").show();
        $(".field-viewlaporanpenjualandetail-sampai_kode_salesman").show();
    }
    else if ($(this).val() == 'Bidang Usaha') {
        $(".field-viewlaporanpenjualandetail-dari_tanggal").show();
        $(".field-viewlaporanpenjualandetail-sampai_tanggal").show();
        $(".field-viewlaporanpenjualandetail-bidang_usaha").show();
    }
    else if ($(this).val() == 'Wilayah') {
        $(".field-viewlaporanpenjualandetail-dari_tanggal").show();
        $(".field-viewlaporanpenjualandetail-sampai_tanggal").show();
        $(".field-viewlaporanpenjualandetail-wilayah").show();
    }
    else if ($(this).val() == 'Kota') {
        $(".field-viewlaporanpenjualandetail-dari_tanggal").show();
        $(".field-viewlaporanpenjualandetail-sampai_tanggal").show();
        $(".field-viewlaporanpenjualandetail-kota").show();
    }
    else if ($(this).val() == 'Kecamatan') {
        $(".field-viewlaporanpenjualandetail-dari_tanggal").show();
        $(".field-viewlaporanpenjualandetail-sampai_tanggal").show();
        $(".field-viewlaporanpenjualandetail-kecamatan").show();
    }
});