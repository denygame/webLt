// change_pass
function reNewPass(email){
	var test=0;
	$("#frmRenew").submit(function(e){
		e.preventDefault();

		$.ajax({
			async: false,
			method: 'get',
			url: 'controller/AccountController.php',
			data: {
				emailReNewPass: email,
				oldPass: document.getElementById('oldPass').value,
				newPass: document.getElementById('new_pass').value,
				renew: document.getElementById('re_new_pass').value,
			},
			success: function(data) {
				switch(data){
					case 'true': 
					alert("Đổi mật khẩu thành công");
					test=1;
					break;

					case 'false':
					alert('Mật khẩu cũ không đúng');
					location.href="index.php?id=login&idlogin=change_pw";
					break;

					case 'falseRenew':
					alert('Nhập lại password mới không đúng');
					location.href="index.php?id=login&idlogin=change_pw";
					break;

					default:
					break;
				}
			}
		});
		if(test==1) this.submit();
	});
}