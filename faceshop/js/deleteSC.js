function deleteBook(idbook){
  $.ajax({
    method: 'get',
    url: 'controller/ShoppingCart.php',
    data: { delbook: idbook },
    success: function(data) {
      location.href='index.php?id=shoppingcart';
    }
  });
}
