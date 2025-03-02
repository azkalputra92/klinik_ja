




$(document).on('pjax:success', function (event, data, status, xhr, options) {
    // var $el = $(".modal-body select[data-krajee-select2]"), // your input id for the HTML select input
    // settings = $el.attr('data-krajee-select2');
    // settings = window[settings];
    // // reinitialize plugin
    // $el.select2(settings);

    var $el = $("#filter-select2") // your input id for the HTML select input
    if ($el.length > 0) {
        settings = $el.attr('data-krajee-select2');
        settings = window[settings];
        // reinitialize plugin
        $el.select2(settings);

        var $loading = $(".kv-plugin-loading");
        $loading.css("cssText", "display: none !important");
    }
    KTComponents.init()

});

$('#ajaxCrudModal').on('hidden.bs.modal', function () {
    showSiblingModel();
});

function showSiblingModel() {
    $(".modal-body").siblings().removeClass("d-none");
    $(".modal-content").parent().removeClass("modal-sm modal-xl");
}

function modalKonfirmasi(redirectTo = false, timeOut = true, modal_size = 'modal-md') {
    $(".modal-body").siblings().addClass("d-none")
    $(".modal-content").parent().removeClass("modal-xl modal-sm modal-lg").addClass(modal_size)
    if (timeOut) {
        setTimeout(() => {
            if (redirectTo) {
                location.href = redirectTo;
            }
            $("#ajaxCrudModal").modal("hide");
        }, 1000);
    }

}



// Untuk menghandle sidebar menu 
const sideBarMenu = $("#kt_aside_menu .menu-item");
const menuList = $(".menu .menu-secondary");

// Ambil indeks yang tersimpan dari session storage
const primaryMenuIndex = sessionStorage.getItem('primaryMenu') || 0;
const secondaryMenuIndex = sessionStorage.getItem('secondaryMenu') || 1;


// Hapus kelas dari semua item terlebih dahulu (jika diperlukan)
// sideBarMenu.removeClass('here');
// menuList.addClass('d-none')

// Tambahkan kelas ke item pada indeks yang tersimpan
// sideBarMenu.eq(primaryMenuIndex).addClass('here');

const menuSelected = menuList.eq(primaryMenuIndex);
const menuLinkSelected = menuSelected.find('.menu-item');
const brandcrumbHomeTitle = $("#menu-title");

// menuSelected.removeClass('d-none');
menuLinkSelected.removeClass('active');

menuLinkSelected.eq(secondaryMenuIndex).find('.menu-link').addClass('active');

$("#home-link").text(brandcrumbHomeTitle.text());

sideBarMenu.on("click", function () {
    const clickedIndex = $(this).index();
    sessionStorage.setItem('primaryMenu', clickedIndex);
    sessionStorage.setItem('secondaryMenu', 1);

})


// Digunakan untuk mengatur menu dan mengaktifkan menu
$(document).ready(function () {
    // const menuAktif = $($(".breadcrumb-item")[1]).text();
    const url = window.location.href; // Mengambil URL saat ini
    let menuAktif = url
        .split("/").at(-2) // Ambil bagian kedua dari belakang
        .replace(/-/g, ' ') // Ganti dash dengan spasi
        .replace(/\b\w/g, char => char.toUpperCase()); // Ubah huruf pertama setiap kata menjadi uppercase

    if (menuAktif == 'Service Center.Test' || menuAktif == 'Site') {
        menuAktif = 'Dashboard';
    }
    // console.log(menuAktif);


    // console.log(menuAktif);
    $('.menu-title').parent().removeClass('active');
    var element = $('.menu-title').filter(function () {
        return $(this).text().trim() === menuAktif;
    });

    if (element.length > 0) {
        element.parent().addClass('active')
    } else {
        console.log('Element not found');
    }
});


menuLinkSelected.on("click", function (e) {
    const clickedIndex = $(this).index();
    console.log("Clicked Index", clickedIndex);
    sessionStorage.setItem('secondaryMenu', clickedIndex);
    // e.preventDefault();
})



function pilihAkun(el) {
    var url = $(el).data('url');
    var tujuan = $(el).data('tujuan');
    var format = $(el).data('format');
    var id = $(el).find(':selected').val();

    if (id != "") {
        $.ajax({
            url: url,
            type: 'get',
            data: { id: id },
            success: function (data) {
                $(tujuan).val(data)
                $(tujuan).text(data)
            }
        });
    } else {
        $(tujuan).val(null)
        $(tujuan).text('')
    }
}

function loadAjaxChange(el) {
    var url = $(el).data('url2');
    var tujuan = $(el).data('tujuan2');
    var format = $(el).data('format');
    var id = $(el).find(':selected').val();

    if (id != "") {
        $.ajax({
            url: url,
            type: 'get',
            data: { id: id },
            success: function (data) {
                $(tujuan).val(data)
                $(tujuan).text(data)
            }
        });
    } else {
        $(tujuan).val(null)
        $(tujuan).text('')
    }
}


function redirectPage(url) {
    window.location.href = url;
}

