function deleteBook(idbook){
    $.ajax({
        method: 'get',
        url: 'controller/ScController.php',
        data: { delbook: idbook },
        success: function(data) {
           $('#count_book').html('<center>'+data+'</center>');
           changeDivList();
           changeDivTotal();
       }
   });

}

//không thể unset các control giống nhau ??? slove control unset input but no form
/*function updateCountBook(idbook, count){
    $.ajax({
        method: 'get',
        url: 'phpFile/updateCountBookSC.php',
        data: { idbook: idbook, count: count },
        success: function(data) {
            changeDivSc();
        }
    });
    
}*/

function changeDivList(){
    $.ajax({
        url: "phpFile/loadDivListSC.php",
        async: false
    }).done(function(result) {
        $("#list").html(result);
    });
}

function changeDivTotal(){
    $.ajax({
        url: "phpFile/loadDivTotalSC.php",
        async: false
    }).done(function(result) {
        $("#total").html(result);
    });
}      