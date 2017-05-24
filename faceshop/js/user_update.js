// trong user_update.php
function clickUpdate(){
	var test=0;
	$("#frmUpdate").submit(function(e){
		e.preventDefault();
		$.ajax({
			async: false,
			method: 'get',
			url: 'controller/AccountController.php',
			data: {
				emailUpdate: $("#email").text(),
				name: document.getElementById('name').value,
				sex: $('#gioitinh').val(),
				tel: document.getElementById('tel').value,
				address: document.getElementById('address').value,
				district: document.getElementById('district').value,
				city: $('#city').val(),
			},
			success: function(data) {
				test=1;
			}
		});
		if(test!=0) this.submit();
	});
}

$(document).ready(function () {
	$.ajax({
		async: false,
		method: 'get',
		url: 'controller/AccountController.php',
		data: {
			getSex: $("#email").text(),
		},
		success: function(data) {
			$("#gioitinh").val(data);
		}
	});

	$.ajax({
		async: false,
		method: 'get',
		url: 'controller/AccountController.php',
		data: {
			getIdCity: $("#email").text(),
		},
		success: function(data) {
			$("#city").val(data);
		}
	});
});