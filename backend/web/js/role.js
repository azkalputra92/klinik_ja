
$(document).ready(function () {
    closeModal();
    var jabatan = $('.card-body').data('jabatan');
    getData(jabatan);
    $("#ajaxCrudModalRbac .modal-header").hide();

    $(".parent-checkbox").change(function () {
        // console.log('masuk');
        // return;
        var isChecked = $(this).prop("checked");
        var parentCheckboxValue = $(this).val();
        var arrAction = $('.child-checkbox-more[data-parent="' + parentCheckboxValue + '"]');
        arrAction.each(function () {
            var currentCheckbox = $(this).val();
            var parent = $(this).data('parent');
            ajaxRequest(jabatan, currentCheckbox, isChecked).then(function (res) {
                if (res.status) {
                    console.log("Request successful:", res);
                    $('.child-checkbox[data-parent="' + parent + '"]').prop("checked", isChecked);
                    $('.parent-checkbox-action[data-parent="' + parent + '"]').prop('checked', isChecked);
                    $('.child-checkbox-more[data-parent="' + parent + '"]').prop('checked', isChecked);
                    setTimeout(function () {
                        closeModal();
                    }, 2000);
                    var newContent = `<div class="d-flex justify-content-center mb-3"><img src="/gif/konfirmasisukses.gif" width="150"></div><h5 class="text-dark text-center pb-2">${res.response}</h5>`;
                    $("#ajaxCrudModalRbac .modal-body #loading").html(newContent);

                } else {
                    $(".modal-header").show();
                    $(".modal-header").attr("style", "border-bottom:none !important")
                    var newContent = `<div class="d-flex justify-content-center mb-3"><img src="/gif/gagal_posting.gif" width="150"></div><h5 class="text-dark text-center pb-2">Gagal Memproses!</h5><p>Gagal menyimpan route ${checkboxValue} : ${res.response}</p>`;
                    $("#ajaxCrudModalRbac .modal-body #loading").html(newContent);
                }
            });
        });
    });

    $(".child-checkbox").change(function () {
        // console.log('masukChild');
        // return;
        var isChecked = $(this).prop("checked");
        var valCheck = $(this).data('value');

        var arrAction = $('.child-checkbox-more[data-sub-parent="' + valCheck + '"]');
        arrAction.each(function () {
            var parentAction = $(this).data('parent-action');
            var checkboxValue = $(this).val();
            var parent = $(this).data('parent');
            var subParent = $(this).data('sub-parent');
            ajaxRequest(jabatan, checkboxValue, isChecked).then(function (res) {
                if (res.status) {
                    console.log("Request successful:", res);
                    setTimeout(function () {
                        closeModal();
                    }, 2000);
                    var newContent = `<div class="d-flex justify-content-center mb-3"><img src="/gif/konfirmasisukses.gif" width="150"></div><h5 class="text-dark text-center pb-2">${res.response}</h5>`;
                    $("#ajaxCrudModalRbac .modal-body #loading").html(newContent);

                    $('.child-checkbox-more[data-sub-parent="' + subParent + '"]').prop('checked', isChecked);
                    // allChecked parent
                    var allCheckedParent = $(`.child-checkbox[data-parent="${parent}"]:checked`).length === $(`.child-checkbox[data-parent="${parent}"]`).length;
                    $('.parent-checkbox[data-value="' + parent + '"]').prop("checked", allCheckedParent);

                    // allChecked parentAction
                    $('.parent-checkbox-action[data-action="' + parentAction + '"]').prop('checked', allCheckedParent);
                } else {
                    $(".modal-header").show();
                    $(".modal-header").attr("style", "border-bottom:none !important")
                    var newContent = `<div class="d-flex justify-content-center mb-3"><img src="/gif/gagal_posting.gif" width="150"></div><h5 class="text-dark text-center pb-2">Gagal Memproses!</h5><p>Gagal menyimpan route ${checkboxValue} : ${res.response}</p>`;
                    $("#ajaxCrudModalRbac .modal-body #loading").html(newContent);
                }
            });
        });
        console.log(failed, 'failed');
    });

    $(".child-checkbox-more").change(function () {
        var checkboxValue = $(this).val();
        var isChecked = $(this).prop("checked");
        var parentAction = $(this).data('parent-action');
        var subParent = $(this).data('sub-parent');
        var parent = $(this).data('parent');

        ajaxRequest(jabatan, checkboxValue, isChecked).then(function (res) {
            if (res.status) {
                console.log("Request successful:", res);
                // setTimeout(function () {
                //     closeModal();
                // }, 2500);
                var newContent = `<div class="d-flex justify-content-center mb-3"><img src="/gif/konfirmasisukses.gif" width="150"></div><h5 class="text-dark text-center pb-2">${res.response}</h5>`;
                $("#ajaxCrudModalRbac .modal-body #loading").html(newContent);

                var allChecked = $('.child-checkbox-more-' + parentAction + ':checked').length === $(`.${parentAction}`).length;
                $('.parent-checkbox-action[data-action="' + parentAction + '"]').prop('checked', allChecked);

                // jika terpilih action (Open, Add, Edit, Del, Print) di masing-masing sub parent
                var allSubParent = $('.child-checkbox-more-' + subParent + ':checked').length === $(`.child-checkbox-more-${subParent}`).length;
                $('.child-checkbox[data-value="' + subParent + '"]').prop('checked', allSubParent);

                // allChecked parent
                var allCheckedParent = $('.child-checkbox-more[data-parent="' + parent + '"]:checked').length === $(`.child-checkbox-more[data-parent="${parent}"]`).length;
                $('.parent-checkbox[data-value="' + parent + '"]').prop("checked", allCheckedParent);
            } else {
                $(".modal-header").show();
                $(".modal-header").attr("style", "border-bottom:none !important")
                console.log("Request failed ", res);
                var newContent = `<div class="d-flex justify-content-center mb-3"><img src="/gif/gagal_posting.gif" width="150"></div><h5 class="text-dark text-center pb-2">Gagal Memproses!</h5><p>Gagal menyimpan route ${checkboxValue} : ${res.response}</p>`;
                $("#ajaxCrudModalRbac .modal-body #loading").html(newContent);
            }
        })
            .catch(function (error) {
                console.error("Request failed:", error);
                // You can handle errors here
            });;
    });

    $(".parent-checkbox-action").change(function () {
        var parentCheckboxValue = $(this).data('action');
        var isChecked = $(this).prop("checked");

        // set jika kolom acton dipilih
        var arrAction = $('.child-checkbox-more[data-parent-action="' + parentCheckboxValue + '"]');
        arrAction.each(function () {
            var checkboxValue = $(this).val();
            var subParent = $(this).data('sub-parent');
            var parent = $(this).data('parent');

            ajaxRequest(jabatan, checkboxValue, isChecked).then(function (res) {
                if (res.status) {
                    console.log("Request successful:", res);
                    setTimeout(function () {
                        closeModal();
                    }, 2500);
                    var newContent = `<div class="d-flex justify-content-center mb-3"><img src="/gif/konfirmasisukses.gif" width="150"></div><h5 class="text-dark text-center pb-2">${res.response}</h5>`;
                    $("#ajaxCrudModalRbac .modal-body #loading").html(newContent);
                    $('.child-checkbox-more[data-parent-action="' + parentCheckboxValue + '"]').prop('checked', isChecked);

                    // allChecked subParent
                    var allSubParent = $('.child-checkbox-more-' + subParent + ':checked').length === $(`.${subParent}`).length;
                    $('.child-checkbox[data-value="' + subParent + '"]').prop('checked', allSubParent);
                    // allChecked parent
                    $('.parent-checkbox[data-value="' + parent + '"]').prop("checked", allSubParent);
                } else {
                    $(".modal-header").show();
                    $(".modal-header").attr("style", "border-bottom:none !important")
                    console.log("Request failed ", res);
                    var newContent = `<div class="d-flex justify-content-center mb-3"><img src="/gif/gagal_posting.gif" width="150"></div><h5 class="text-dark text-center pb-2">Gagal Memproses!</h5><p>Gagal menyimpan route ${checkboxValue} : ${res.response}</p>`;
                    $("#ajaxCrudModalRbac .modal-body #loading").html(newContent);
                }
            });
        });
    });

    function closeModal() {
        $("#ajaxCrudModalRbac").data('closing', true).modal('hide');
    }

    // $('#loading').hide(); // Hide loading indicator when AJAX stops
    function ajaxRequest(jabatan, route, isChecked) {
        return new Promise(function (resolve, reject) {
            $.ajax({
                type: "POST",
                url: "/master/jabatan/add-route",
                data: {
                    jabatan,
                    route,
                    isChecked
                },
                beforeSend: function () {
                    $("#ajaxCrudModalRbac").modal("show");
                    var newContent = "<div id='loading'>Sedang memproses ...</div>";
                    $("#ajaxCrudModalRbac .modal-body").html(newContent);
                },
                success: function (res) {
                    if (res.status === 'success') {
                        resolve({ status: true, response: res.message });
                    } else {
                        console.log(res, 'xxx');
                        resolve({ status: false, response: res.message.parent[0] });
                    }
                },
                error: function (xhr, status, error) {
                    resolve({ status: false, response: xhr.responseText });
                }
            });
        });
    }
    var setCheckedParentAction = function (id) {
        const parentAction = $(`#${id}`).data('parent-action');
        var allChecked = $('.child-checkbox-more-' + parentAction + ':checked').length === $(`.${parentAction}`).length;
        $('.parent-checkbox-action[data-action="' + parentAction + '"]').prop('checked', allChecked);
        $('.parent-checkbox-action[data-action="' + parentAction + '"]').prop('checked', allChecked);
    }

    var setCheckedSubParent = function (id) {
        const subParent = $(`#${id}`).data('sub-parent');
        var allChecked = $('.child-checkbox-more[data-sub-parent="' + subParent + '"]:checked').length === $(`.${subParent}`).length;
        $('.child-checkbox[data-value="' + subParent + '"]').prop('checked', allChecked);
        const parent = $(`#${id}`).data('parent');
        $('.parent-checkbox[data-value="' + parent + '"]').prop('checked', allChecked);
    }
    // END PROSES REQUEST & SETTER

    // INITALIZE DATA
    function getData(jabatan) {
        $.ajax({
            type: "get",
            url: "/master/jabatan/get-route",
            data: {
                jabatan
            }
        }).done(function (res) {
            const { data } = res
            if (data !== undefined) {
                $.each(data?.data, function (index, item) {
                    const id = item;
                    $(`#${id}`).prop('checked', true);
                    setCheckedParentAction(item);
                    setCheckedSubParent(item);
                });
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        });
    };
});