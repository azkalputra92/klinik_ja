$(document).on("change", ".load_ajax_change", function (e) {
    var target = $(this).data("ajaxtarget");
    var data = $(this).data("ajaxdata");
    var load = $(this).data("ajaxload");

    // Ambil nilai dari elemen data
    data = $(data).val();
    // console.log(data);

    $(target).html("mengambil data ...");

    $.ajax({
        type: "POST",
        url: load,
        data: { keys: data },
        success: function (isi) {
            $(target).html(isi);
        },
    });
//     ajax: {
//         url: $("#kota").data("ajaxload"), // URL untuk mengambil data
//         dataType: 'json',
//         delay: 250, // Waktu tunggu sebelum permintaan AJAX dimulai dalam milidetik
//         data: function (params) {
//             return {
//                 q: params.term, // Term pencarian yang dimasukkan pengguna
//                 page: params.page || 1 // Nomor halaman yang diminta, default ke 1
//             };
//         },
//         processResults: function (data, params) {
//             params.page = params.page || 1;

//             return {
//                 results: data.items, // Atur sumber data ke hasil yang akan ditampilkan
//                 pagination: {
//                     more: (params.page * 10) < data.total_count // Menandai bahwa ada lebih banyak halaman untuk dimuat
//                 }
//             };
//         },
//         cache: true
//     },
//     placeholder: 'Pilih Provinsi',
//     allowClear: true,
//     multiple: true
// }).on('select2:opening', function (e) {
//     // Atur dropdownParent di sini
//     e.preventDefault();
//     e.stopPropagation();
//     $(this).next('.select2-container').find('.select2-dropdown').detach().appendTo('#ajaxCrudModal');
// });
});

