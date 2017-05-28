$(document).ready(function(){
  $('#cbCategory').change(function(){
    arrayType = new Array();
    $.ajax({
      async: false,
      method: 'get',
      url: 'controller/ManagerBook.php',
      data: { idcate : $(this).val() },
      dataType:"json",
      success:function(data){
        arrayType = data;
        $("#cbType").empty();
        //$("#cbType").prop('disabled', false);

        $("#cbType").append($('<option>', {value: 000,text: "-- Chọn thể loại --"}));
        for(var i = 0;i<arrayType.length;i++){
          $("#cbType").append($('<option>', {value: arrayType[i]['idtype'],text: arrayType[i]['name']}));
        }
      }
    });
  });
});

function clickDelete(current_page, total_page){
  if(total_page!=0){
    $("#frmHaveDelete").submit(function(e){
      e.preventDefault();

      //get value checkbox delete checked
      var val = [];
      $('#delete:checked').each(function(i){
        if($(this).attr('id')!='checkAll'){
          val[i] = $(this).val();
        }
      });

      if(current_page==total_page) current_page = current_page - 1;

      $.ajax({
        async: false,
        method: 'get',
        url: 'controller/ManagerBook.php',
        data: { listIdBookDel: val },
        success:function(data){
          //xóa xong thì change submit form
          if(current_page!=0) document.getElementById("frmHaveDelete").action ="index.php?admin=manage_book&page="+current_page;
          else document.getElementById("frmHaveDelete").action ="index.php?admin=manage_book";
          document.getElementById("frmHaveDelete").submit();
        }
      });
    });
  }
}

function searchByCbBox(){
  $("#frmSearchCb").submit(function(e){
    e.preventDefault();

    var idcategory=$('#cbCategory').val();
    var idtype=$('#cbType').val();
    var loca = "index.php?admin=manage_book";
    if(idcategory!=000)loca+="&idcategory="+idcategory;

    if(idtype!=000)loca+="&idtype="+idtype;

    document.getElementById("frmSearchCb").action =loca;
    document.getElementById("frmSearchCb").submit();
  });
}

function toggle(source) {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i] != source)
    checkboxes[i].checked = source.checked;
  }
}
