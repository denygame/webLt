var reg_mail = /^[A-Za-z0-9]+([_\.\-]?[A-Za-z0-9])*@[A-Za-z0-9]+([\.\-]?[A-Za-z0-9]+)*(\.[A-Za-z]+)+$/;


$(document).ready(function(){

  $('#email').on("keyup",function(){
    //test exists Email
    $.ajax({
      async: false,
      method: 'get',
      url: 'controller/AccountController.php',
      data: {
        testExistsEmail:document.getElementById('email').value,
      },
      success: function(data) {
        if(data=='true'){
          $('#register_form').find('#tEmailHave').show();
        }else $('#register_form').find('#tEmailHave').hide();
      }
    });
    //test email không đúng định dạng
    if(reg_mail.test(document.getElementById('email').value)){
      $('#register_form').find('#tEmail').hide();
    }
  });

  $('#rePass').blur(function(){
    if(document.getElementById('rePass').value!=document.getElementById('password').value){
      $('#register_form').find('#tRepass').show();
    }
    else $('#register_form').find('#tRepass').hide();
  });

  $('#password').blur(function(){
    if(document.getElementById('password').value.length>=6){
      $('#register_form').find('#t').hide();
    }
    else $('#register_form').find('#t').show();
  });

  $('#password').on("keyup",function(){
    if($(this).val()==''){
      $('#register_form').find('#t').show();
    }
    if(document.getElementById('password').value.length>=5){
      $('#register_form').find('#t').hide();
    }
  });

  $("#gioitinh").change(function(){
    if($('#gioitinh').val()!=null) $('#register_form').find('#tSex').hide();
    else $('#register_form').find('#tSex').show();
  });

  $("#city").change(function(){
    if($('#city').val()!=null) $('#register_form').find('#tCity').hide();
    else $('#register_form').find('#tCity').show();
  });


});


//pause submit, khi điền đủ và đúng thì submit
function submitForm(){
  var test=0;
  email=document.getElementById('email').value;
  $('#register_form').submit(function(e){
    e.preventDefault();

    $.ajax({
      async: false,
      method: 'get',
      url: 'controller/AccountController.php',
      data: {
        testExistsEmail:document.getElementById('email').value,
      },
      success: function(data) {
        if(data=='true'){
          test=1;
        }else test=0;
      }
    });

    if(test==1){
      $('#register_form').find('#tEmailHave').show();
    }else{
      $('#register_form').find('#tEmailHave').hide();
      if(!reg_mail.test(email)){
        $('#register_form').find('#tEmail').show();
      }
      else{
        $('#register_form').find('#tEmail').hide();
        if(validateForm()==true) {
          //đăng ký
          $.ajax({
            async: false,
            method: 'get',
            url: 'controller/AccountController.php',
            data: {
              registerEmail:document.getElementById('email').value,
              password:document.getElementById('password').value,
              name:document.getElementById('hoten').value,
              sex: $('#gioitinh').val(),
              tel: document.getElementById('sdt').value,
              city: $('#city').val(),
              district: document.getElementById('quan').value,
              address: document.getElementById('address').value,
            }
          });
          this.submit();
        }
      }
    }
  });
}

function chgAction() {
  document.getElementById("register_form").action ="index.php?id=login";
  document.getElementById("register_form").submit();
}

function validateForm(){
  var mailInSys=false;
  var inputs = document.forms['register_form'].getElementsByTagName('input');
  var count=0;
  for(var i=0; i<inputs.length; i++){
    var value = inputs[i].value;
    var id = inputs[i].getAttribute('id');

    // Tạo phần tử span lưu thông tin lỗi
    var span = document.createElement('span');
    // Nếu span đã tồn tại thì remove
    var p = inputs[i].parentNode;
    if(p.lastChild.nodeName == 'SPAN') {p.removeChild(p.lastChild);}


    if(value == ''){
      if(count==0) document.getElementById(id).focus();
      count++;
      document.getElementById(id).placeholder="Không được trống";
    }

    else{


      // Kiểm tra các trường hợp khác
      if(id == 'email'){
        //kiểm tra email có trong hệ thống chưa
        $.ajax({
          async: false,
          method: 'get',
          url: 'controller/AccountController.php',
          data: {
            testExistsEmail:document.getElementById('email').value,
          },
          success: function(data) {
            if(data=='true'){
              mailInSys=true;
            }else mailInSys=false;
          }
        });
        //kiểm tra email đúng định dạng không
        if(reg_mail.test(value) == false){
          if(count==0)document.getElementById(id).focus(); count++;
        }
        var email =value;
      }
      if(id == 'password'){
        if(value.length <6){
          if(count==0)document.getElementById(id).focus(); count++;
        }
        var pass =value;
      }
      if(id == 'rePass' && value != pass){ if(count==0)document.getElementById(id).focus(); count++;}
    }
  }// end for

  if($('#gioitinh').val()==null){
    if(count==0)document.getElementById('gioitinh').focus(); count++;
    $('#register_form').find('#tSex').show();
  }
  if($('#city').val()==null){
    if(count==0)document.getElementById('city').focus();
    count++;
    $('#register_form').find('#tCity').show();
  }
  if(count!=0) return false;
  if(mailInSys==true){
    document.getElementById('email').focus();
    return false;
  }
  return true;
}


//hàm chỉ cho phép nhập số trong input text, trong input html thêm vào onKeyPress="return isNumberKey(event);"
function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
  return false;
  return true;
}
