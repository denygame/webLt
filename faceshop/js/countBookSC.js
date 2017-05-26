//hàm add book vào shoppingcart

function doSomething(idbook) {

  $.ajax({
    async: false,

    method: 'get',
    url: 'controller/ShoppingCart.php',
    data: { addbook : idbook },
    success:function(data){
      $('#count_book').html('<center>'+data+'</center>');
    }
  });
}
