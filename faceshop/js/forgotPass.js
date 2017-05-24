var reg_mail = /^[A-Za-z0-9]+([_\.\-]?[A-Za-z0-9])*@[A-Za-z0-9]+([\.\-]?[A-Za-z0-9]+)*(\.[A-Za-z]+)+$/;

$(document).ready(function(){
    $('#email').on("keyup",function(e){
        $("#tEmail").hide();
        $('#tEmailHave').hide();

                if(e.keyCode==13){//nếu enter
                    btnClick();
                }
            });
});

function btnClick(){
    document.getElementById("btn").focus();

    email = document.getElementById('email').value;
    var test = 0;


    if (!reg_mail.test(email)) {
        $("#tEmail").show();
        test++;
    } else {
        $("#tEmail").hide();
        $.ajax({
            async: false,
            method: 'get',
            url: 'controller/AccountController.php',
            data: { 
                testExistsEmail:document.getElementById('email').value,
            },
            success: function (data) {
                if (data == 'false') {
                    $("#tEmailHave").show();
                    test++;
                }
            }
        });
    }

        if(test==0){//thực hiện send mail\
            $.ajax({
                async: false,
                method: 'get',
                url: 'controller/AccountController.php',
                data: {forgotEmail: document.getElementById('email').value},
                success: function (data) { 
                    if(data=='true'){
                        $('#tTB').show();
                        $('#call_back').show();
                    }else{
                        $('#tTB').hide();
                        $('#call_back').hide();
                    }
                }
            });
        }
    }