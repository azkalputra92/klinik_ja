$(".field-viewlaporanbarang-dari_tanggal").hide();
$(".field-viewlaporanbarang-sampai_tanggal").hide();
$(".field-viewlaporanbarang-dari").hide();
$(".field-viewlaporanbarang-sampai").hide();
$(".field-viewlaporanbarang-kelompok_barang").hide();
$(".field-viewlaporanbarang-dari_supplier").hide();
$(".field-viewlaporanbarang-sampai_supplier").hide();
$(".field-viewlaporanbarang-dari_stok").hide();
$(".field-viewlaporanbarang-sampai_stok").hide();
$(".field-viewlaporanbarang-kode_wilayah").hide();

$(document).on("change", "#versi", function () {
    // console.log($(this).val());
    $(".field-viewlaporanbarang-dari_tanggal").show();
    $(".field-viewlaporanbarang-sampai_tanggal").show();


    $(".field-viewlaporanbarang-dari").hide();
    $(".field-viewlaporanbarang-sampai").hide();
    $(".field-viewlaporanbarang-kelompok_barang").hide();
    $(".field-viewlaporanbarang-dari_supplier").hide();
    $(".field-viewlaporanbarang-sampai_supplier").hide();
    $(".field-viewlaporanbarang-dari_stok").hide();
    $(".field-viewlaporanbarang-sampai_stok").hide();
    $(".field-viewlaporanbarang-kode_wilayah").hide();

    $(".field-viewlaporanbarang-dari").val('');
    $(".field-viewlaporanbarang-sampai").val('');
    $(".field-viewlaporanbarang-kelompok_barang").val('');
    $(".field-viewlaporanbarang-dari_supplier").val('');
    $(".field-viewlaporanbarang-sampai_supplier").val('');
    $(".field-viewlaporanbarang-dari_stok").val('');
    $(".field-viewlaporanbarang-sampai_stok").val('');
    $(".field-viewlaporanbarang-urut").val('');

    $("#viewlaporanbarang-kelompok_barang").val(null).trigger("change");
    
    if ($(this).val() == 'Tanggal') {
        $(".field-viewlaporanbarang-dari_supplier").show();
        $(".field-viewlaporanbarang-sampai_supplier").show();
    }else if ($(this).val() == 'Kelompok Barang') {
        $(".field-viewlaporanbarang-kelompok_barang").show();
        $(".field-viewlaporanbarang-dari_supplier").show();
        $(".field-viewlaporanbarang-sampai_supplier").show();
    }else if ($(this).val() == 'No Beli') {
        $(".field-viewlaporanbarang-dari").show();
        $(".field-viewlaporanbarang-sampai").show();
        $(".field-viewlaporanbarang-dari_supplier").show();
        $(".field-viewlaporanbarang-sampai_supplier").show();
    }else if ($(this).val() == 'Kode Stok') {
        $(".field-viewlaporanbarang-dari_stok").show();
        $(".field-viewlaporanbarang-sampai_stok").show();
        $(".field-viewlaporanbarang-dari_supplier").show();
        $(".field-viewlaporanbarang-sampai_supplier").show();
    }else if ($(this).val() == 'Kode Supplier') {
        $(".field-viewlaporanbarang-dari_supplier").show();
        $(".field-viewlaporanbarang-sampai_supplier").show();
    }else if ($(this).val() == 'Wilayah') {
        $(".field-viewlaporanbarang-kode_wilayah").show();
    } else {
        $(".field-viewlaporanbarang-dari").show();
        $(".field-viewlaporanbarang-sampai").show();
    }
});