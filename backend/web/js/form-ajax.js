$("#form-ajax").on("beforeSubmit", function () {
  var $form = $(this);
  var formData = new FormData(this);

  $.ajax({
    type: $form.attr("method"),
    url: $form.attr("action"),
    processData: false,
    contentType: false,
    data: formData,
  })
    .done(function (data) {
      console.log(data);
      if (data.success) {
        showModal(data);
        if (data.reset) {
          $form.trigger("reset");
        }
        if (data.forceReload) {
          $.pjax.reload({ container: data.forceReload });
        }
      } else if (data.validation) {
        $form.yiiActiveForm("updateMessages", data.validation, true);
        // showModal(data);
      } else {
        // server response
      }
    })
    .fail(function () {
      // request failed
    });
  return false; // prevent default form submission
});

function showModal(data) {
  const ajaxCrudModal = $("#ajaxCrudModal");
  // const dialogModal = ajaxCrudModal.find(".modal-dialog");
  const bodyModal = ajaxCrudModal.find(".modal-body");
  const headerModal = ajaxCrudModal.find(".modal-header");
  const footerModal = ajaxCrudModal.find(".modal-footer");

  // dialogModal.removeClass('modal-lg');
  // dialogModal.addClass('modal-sm modal-dialog-centered');
  bodyModal.html(data.content);
  headerModal.html(`<h5 class="modal-title">${data.title}</h5>`);
  footerModal.html(data.footer);

  ajaxCrudModal.modal("show");
  // $('.modal-header').css({ 'display': 'none' });
  // $('.modal-footer').css({ 'display': 'none' });
  // setTimeout(() => ajaxCrudModal.modal('hide'), 1500);
}
