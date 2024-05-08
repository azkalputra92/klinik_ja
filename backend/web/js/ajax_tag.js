var tags = [];

$(document).on('pjax:complete', function(event) {
    tags = [];
    console.log(tags)
});

function tambahtag(event){
    var tag = $("#tag").val();
    var keycode = (event.keyCode ? event.keyCode : event.which);

    if(keycode == '13' && tag != '') {

        if (isNaN(tag) || tag == ' ') {
            throw alert("Diskon harus angka");
        }
        tags.push(tag.replace(/\s/g, ''));
        $("#tag").val('');
        $("#tag-wrap").append(`<div class="tag badge bg-dark-blue mb-2">
            <span class="txt-tag">${tag}</span>
            <span style="color: white; font-weight: bold; cursor: pointer; padding-left: 3px;" onclick="hapustag('${tag}')">x<span>
        </div>
        `);
        $("#produk-tag").val(tags.join(","));

        hitungSubTotal();
        setDiskonRp();
        setSubTotal()
    }
}

function hapustag(tag){
    $.each(tags, function(index, value) {
        if(tag === value) {
            tags.splice(index,'1');
            $('.tag')[index].remove();
            $('#produk-tag').val(tags);
        } 
    }); 

    hitungSubTotal();
    setDiskonRp();
    setSubTotal()
}

function btnMore() {
    tags = [];
}

function convertStringToInt($number = 0){
  $number = String($number).replace(/\./g,"");
  return parseInt($number);
}
function convertStringToFloat($number = 0){
//   $number = String($number).replace(/\./g,"");
  $number = String($number).replace(".","");
  $number = String($number).replace(",",".");
  return parseFloat($number);
}

function hitungSubTotal(){
    var tag = $("#produk-tag").val();

   var hitungSubTotal = totalDiskonPersen(tag).toFixed(6);
   
   console.log(hitungSubTotal);

    //untuk menset form sub total
    $("#diskon_persen-disp").val(hitungSubTotal);
    $("#diskon_persen").trigger("change")
    $("#diskon_persen").val(hitungSubTotal);

    
}


function totalDiskonPersen(diskon_detail){
    let hitung_diskon = null;
    // console.log(diskon_detail)
    if (diskon_detail !== '') {
        diskon_persen_detail = diskon_detail.split(",");
        hitung_diskon = 1;

        for (let i = 0; i < diskon_persen_detail.length; i++) {
            hitung_diskon = hitung_diskon * (1 * (1 - (diskon_persen_detail[i] / 100)));
        }

        hitung_diskon = (1 - 1 * hitung_diskon) * 100;
    }
    // console.log(hitung_diskon)

    return hitung_diskon;
}
function setDiskonRp(){
    var tag = $("#diskon_persen").val();
    tag = tag.replace(',' , '.')
    var getHargaTotalDisp = $("#harga_total-disp").val();

    getHargaTotalDisp = convertStringToInt(getHargaTotalDisp);
    var diskonRp = getHargaTotalDisp * (tag / 100);

    var diskonRp2 = (getHargaTotalDisp * tag) / 100

    // console.log('harga ' + getHargaTotalDisp)
    // console.log('tag '+ tag)

    // console.log('diskonRp ' + diskonRp)
    // console.log('diskonRp2 ' + diskonRp2)

    //untuk menset form diskon rp
    $("#diskon_harga-disp").val(diskonRp);    
    $("#diskon_harga").trigger("change")
    $("#diskon_harga").val(diskonRp);

}

function setSubTotal(){
    var getHargaTotalDisp = $("#harga_total-disp").val().split('.').join('')
    getHargaTotalDisp = getHargaTotalDisp.replace(',' , '.')
    
    // const getDiskonHargaDisp = convertStringToFloat($("#diskon_harga").val());
    var getDiskonHargaDisp = $("#diskon_harga-disp").val().split('.').join('')
    getDiskonHargaDisp = getDiskonHargaDisp.replace(',' , '.')
  const subTotal = getHargaTotalDisp - getDiskonHargaDisp;
    
    // console.log('harga_total2 '+ getHargaTotalDisp)
    // console.log('diskon_harga ' +  getDiskonHargaDisp)
    //untuk menset form sub total
    $("#sub_total-disp").val(subTotal);
    $("#sub_total").trigger("change")
    $("#sub_total").val(subTotal);
}
