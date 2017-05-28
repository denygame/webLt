function insert(){
  var test=0;
  $("#frmInsert").submit(function(e){
    e.preventDefault();
    name=$('#name').val();
    email=$('#email').val();
    password=$('#password').val();
    sex=$('#sex').val();
    tel=$('#tel').val();
    city=$('#city').val();
    address=$('#address').val();
    district=$('#district').val();

    arraySend = new Array();
    arraySend.push(email,password,city,name,sex,tel,address,district);
    $.ajax({
      async: false,
      method: 'get',
      url: 'controller/ManagerAccount.php', // vì trong Manager có require_once 'AccountController'
      data: { arrayInsertAcc: arraySend },
      success:function(data){
        //alert(data);
        if(data=='true') test++;
      }
    });
    if(test!=0){
      alert("Thêm tài khoản thành công!");
      location.href="index.php?admin=manage_account";
    }else{
       alert('Có lỗi xảy ra!');
       this.submit();
     }
  });
}
