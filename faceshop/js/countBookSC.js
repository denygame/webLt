function doSomething(idbook) {
  $.ajax({
    async: false,

    method: 'get',
    url: 'phpFile/addBookToSC.php',
    data: {
      idbook: idbook
    }
  });

  $.ajax({
    async: false,

    url: 'phpFile/countSCforJs.php',
    success: function(data) {
     $('#count_book').html('<center>'+data+'</center>');
   }
 });
}