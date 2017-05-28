function insert(){
  var test=0;
  $("#frmInsert").submit(function(e){
    e.preventDefault();
    name=$('#name_book').val();
    imgbg=$('#imgbg').val();
    imgdetail=$('#imgdetail').val();
    author=$('#author').val();
    ngayxb=$('#ngayxbdate').val();
    nhaxb=$('#nhaxb').val();
    nhaph=$('#nhaph').val();
    dangbia=$('#dangbia').val();
    size=$('#size').val();
    weight=$('#weight').val();
    totalpages=$('#totalpages').val();
    saleoff=$('#saleoff').val();
    price=$('#price').val();
    info=$('#info').val();
    type=$('#type').val();
    highlights=$('#heighlightss').val();
    sold=$('#sold').val();
    checkDelete=$('#checkDelete').val();
    status=$('#status').val();
    arraySend = new Array();
    arraySend.push(name,imgdetail,imgbg,author,ngayxb,nhaxb,nhaph,dangbia,size,weight,totalpages,saleoff,price,info,type,highlights,status,sold,checkDelete);
    $.ajax({
      async: false,
      method: 'get',
      url: 'controller/ManagerBook.php', // vì trong ManagerBook có require_once 'BookController'
      data: { arrayInsert: arraySend },
      success:function(data){
        //alert(data);
        test++;
      }
    });
    if(test!=0){
      alert("Thêm sách thành công!");
      location.href="index.php?admin=manage_book";
    }else alert('Có lỗi xảy ra!');
  });
}
