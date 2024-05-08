$('.hidecolumn').click(function () {
  var data = $(this).data('column')
  var checkBox = $("[data-column='"+ data +"'] input[type='checkbox']").prop("checked")
  if (checkBox){
    $("td[data-col-seq='"+ data +"']").hide(); 
    $("th[data-col-seq='"+ data +"']").hide();
  } else {
    $("td[data-col-seq='"+ data +"']").show(); 
    $("th[data-col-seq='"+ data +"']").show();
  }
  console.log('berhasil');
});