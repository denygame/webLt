
var clickShip = false;
var clickTT = false;

$(document).ready(function(){
  $('input[name="ship"]').click(function(){
    clickShip = true;
  });

  $('input[name="co"]').click(function(){
    clickTT = true;
  });
});


function shipClick(e){
  //lưu session ship
  $.ajax({
    async: false,
    method: 'get',
    url: 'controller/BillController.php',
    data: { priceShip : e.value }
  });
  switch (e.id) {
    case 'fastShip':
    document.getElementById('showFast').innerHTML = "<font style='color: #CC6600'>"+e.value+" VNĐ</font>";
    document.getElementById('showNormal').innerHTML = "<font style='color: #CC6600'>0 VNĐ</font>";
    break;
    case 'normalShip':
    document.getElementById('showNormal').innerHTML = "<font style='color: #CC6600'>"+e.value+" VNĐ</font>";
    document.getElementById('showFast').innerHTML = "<font style='color: #CC6600'>0 VNĐ</font>";
    break;
    default:
    //code
    break;
  }
  $('#endPrice').load('phpFile/showEndPrice.php');
}

function payClick(e){
  switch (e.id) {
    case 'congNganHang':
    //lưu session thanh toán kiểu cỗng ngân hàng +10000
    $.ajax({
      async: false,
      method: 'get',
      url: 'controller/BillController.php',
      data: { payClick : e.value }
    });
    break;
    case 'khongTien':
    $.ajax({
      async: false,
      method: 'get',
      url: 'controller/BillController.php',
      data: { unsetPayClick : 1 }
    });
    break;
    default:
    break;
  }
  $('#endPrice').load('phpFile/showEndPrice.php');
}

function orderBill(){
  var test=0;
  if(!clickShip || !clickTT){
    alert('Bạn phải chọn hình thức vận chuyển và thanh toán!')
    $("#frmOrder").submit(function(e){
      e.preventDefault();
    });
    return;
  }
  $("#frmOrder").submit(function(e){
    e.preventDefault();
    $.ajax({
      async: false,
      method: 'get',
      url: 'controller/OrderController.php',
      data: { orderNewBill : 1 },
      success:function(data) {
        //alert(data);
        test++;
      }
    });
    if(test!=0){
      alert('Gửi yêu cầu thành công! Kiểm tra mail thông tin đơn hàng!');
      $.ajax({
        async: false,
        method: 'get',
        url: 'controller/OrderController.php',
        data: { unsetSESSION_Order : 1 }
      });
      location.href="index.php"; //không submit thì k có post F5 k hiện
    }else{alert("Có lỗi xảy ra!"); }
  });
}
