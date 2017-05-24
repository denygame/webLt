//hàm add book vào shoppingcart

function doSomething(idbook) {

  $.ajax({
    async: false,

    method: 'get',
    url: 'controller/ScController.php',
    data: { addbook : idbook }, 
    success:function(data){
      $('#count_book').html('<center>'+data+'</center>');
    }
  });
}

function loadDivSc(){
  $.ajax({
    url: 'controller/ScController.php',
    data: {justCount : 'exists'},
    success: function(data) {
     $('#count_book').html('<center>'+data+'</center>');
   }
 });
}