function verify(type){
  var checkFalse = 0;
  if(type==0){ // not login
    if(document.getElementById('email').value=='') checkFalse++;
    if(document.getElementById('name').value=='') checkFalse++;
    if(document.getElementById('tel').value=='') checkFalse++;
    if(document.getElementById('district').value=='') checkFalse++;
    if(document.getElementById('address').value=='') checkFalse++;
    if($("#gioitinh").val()==null) checkFalse++;
    if($("#city").val()==null) checkFalse++;
  }
  if(type == 1){
    if(document.getElementById('emailLogin').value=='') checkFalse++;
    if(document.getElementById('nameLogin').value=='') checkFalse++;
    if(document.getElementById('telLogin').value=='') checkFalse++;
    if(document.getElementById('districtLogin').value=='') checkFalse++;
    if(document.getElementById('addressLogin').value=='') checkFalse++;
    if($("#gioitinhLogin").val()==null) checkFalse++;
    if($("#cityLogin").val()==null) checkFalse++;
  }

  if(checkFalse!=0) alert('Bạn phải điền đầy đủ thông tin');
  return checkFalse;
}


function clickContinueNotLogin(){
  var test=0;
  var ready = verify(0);
  $("#frmCheckOutNotLogin").submit(function(e){
    e.preventDefault();
    if(ready==0){
      $.ajax({
        async: false,
        method: 'get',
        url: 'controller/OrderController.php',
        data: { emailNotLogin: document.getElementById('email').value,
        name: document.getElementById('name').value,
        tel: document.getElementById('tel').value,
        district: document.getElementById('district').value,
        sex: $("#gioitinh").val(),
        address: document.getElementById('address').value,
        idcity: $("#city").val() },
        success:function(data){
          test++;
        }
      });
      if(test!=0) this.submit();
    }
  });
}

function clickContinueLogin(){
  var test=0;
  var ready = verify(1);
  $("#frmCheckOutLogin").submit(function(e){
    e.preventDefault();
    if(ready==0){
      $.ajax({
        async: false,
        method: 'get',
        url: 'controller/OrderController.php',
        data: { emailLogin: document.getElementById('emailLogin').value,
        name: document.getElementById('nameLogin').value,
        tel: document.getElementById('telLogin').value,
        district: document.getElementById('districtLogin').value,
        sex: $("#gioitinhLogin").val(),
        address: document.getElementById('addressLogin').value,
        idcity: $("#cityLogin").val() },
        success:function(data){
          test++;
        }
      });
      if(test!=0) this.submit();
    }
  });
}

//login trỏ đúng tt database
$(document).ready(function(){
  $.ajax({
    async: false,
    method: 'get',
    url: 'controller/AccountController.php',
    data: {
      getSex: document.getElementById('emailLogin').value,
    },
    success: function(data) {
      $("#gioitinhLogin").val(data);
    }
  });

  $.ajax({
    async: false,
    method: 'get',
    url: 'controller/AccountController.php',
    data: {
      getIdCity: document.getElementById('emailLogin').value,
    },
    success: function(data) {
      $("#cityLogin").val(data);
    }
  });
});
