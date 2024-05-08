$(document).on("click", ".btn_pilih_data", function () {
	var url = $(this).data("url");
	// console.log(url);
	var pjaxReload = $(this).data("pjax") || "#crud-datatable-pjax";
	var thisKey = $(this).data("key");
	$(this).html('<div class="loader"></div>');

	$.ajax({
		url: url,
		method: "GET"
	})
		.done((ress) => {
			if (ress.status) {
				if (/pilih/.test(ress.message.toLowerCase())) {
					$(this)
						.removeClass("btn-success")
						.addClass("btn-danger")
						.html(
							`<i data-feather="check-circle" width="16" height="16" class="align-middle"></i>`
						);
				} else {
					$(this)
						.removeClass("btn-danger")
						.addClass("btn-success")
						.html(
							`<i data-feather="check-circle" width="16" height="16" class="align-middle"></i>`
						);
				}
				$.pjax.reload({ container: pjaxReload });
			}
		})
		.fail((err) => {});
});
