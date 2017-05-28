function update(idbook){
  var test=0;
  $("#frmUpdate").submit(function(e){
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
    highlights=$('#heighlights').val();
    sold=$('#sold').val();
    checkDelete=$('#checkDelete').val();
    status=$('#status').val();
    arraySend = new Array();
    arraySend.push(idbook,name,imgdetail,imgbg,author,ngayxb,nhaxb,nhaph,dangbia,size,weight,totalpages,saleoff,price,info,type,highlights,status,sold,checkDelete);
    $.ajax({
      async: false,
      method: 'get',
      url: 'controller/ManagerBook.php', // vì trong ManagerBook có require_once 'BookController'
      data: { arrayUpdate: arraySend },
      success:function(data){
        //alert(data);
        test++;
      }
    });
    if(test!=0){
      location.href="index.php?admin=manage_book_detail&idbook="+idbook;
    }
  });
}
