function deleteBook(idbook){
    $.ajax({
        method: 'get',
        url: 'phpFile/deleteBookSC.php',
        data: { idbook: idbook },
        success: function() {
           changeDivSc();
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

function changeDivSc(){
    $.ajax({
       url: 'phpFile/countSCforJs.php',
       success: function(data) {
           $('#count_book').html('<center>'+data+'</center>');
           changeDivList();
           changeDivTotal();
       }
   });
}

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