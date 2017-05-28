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
        url: 'controller/ManagerAccount.php',
        data: { listEmailAccountDel: val },
        success:function(data){
          //alert(data);
          //xóa xong thì change submit form
          if(current_page!=0) document.getElementById("frmHaveDelete").action ="index.php?admin=manage_account&page="+current_page;
          else document.getElementById("frmHaveDelete").action ="index.php?admin=manage_account";
          document.getElementById("frmHaveDelete").submit();
        }
      });
    });
  }
}

function toggle(source) {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i] != source)
    checkboxes[i].checked = source.checked;
  }
}
