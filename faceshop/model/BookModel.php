<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/DataProvider.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/TypeModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';

class BookModel
{
    private $typeModel;
    public function __contruct(){
        $this->typeModel = new TypeModel();
    }

    public function get6BookHighlights(){
        $result = DataProvider::executeQuery('select * from `book` ORDER BY highlights DESC LIMIT 6');
        return TestResult::testResultModel($result);
    }

    public function get12BookNew(){
        $result = DataProvider::executeQuery('select * from `book` WHERE status LIKE \'Sách mới\' LIMIT 18;');
        return TestResult::testResultModel($result);
    }

    public function get6BookFuture(){
        $result = DataProvider::executeQuery('select * from `book` WHERE  status LIKE  \'Sách mới\' LIMIT 6;');
        return TestResult::testResultModel($result);
    }

    public function getBookById($idBook){
        $result = DataProvider::executeQuery('select * from book where idbook='.$idBook);
        return TestResult::testResultModel($result);
    }

    public function get6BookSameType($idType,$idBook){
        $result = DataProvider::executeQuery("select * from `book` where idbook != $idBook and idtype = $idType ORDER BY RAND() LIMIT 0,6");
        return TestResult::testResultModel($result);
    }

    public function getListBookInType($idtype,$start,$sort){
        switch ($sort) {
            case 'normal':
            $result = DataProvider::executeQuery("select * from `book` where idtype=$idtype LIMIT $start,".constants::page_book);
            break;
            case 'gia_giam':
            $result = DataProvider::executeQuery("select * from `book` where idtype=$idtype ORDER BY (price - (price*saleoff/100)) DESC LIMIT $start,".constants::page_book);
            break;
            case 'gia_tang':
            $result = DataProvider::executeQuery("select * from `book` where idtype=$idtype ORDER BY (price - (price*saleoff/100)) LIMIT $start,".constants::page_book);
            break;
            case 'ban_chay':
            $result = DataProvider::executeQuery("select * from `book` where idtype=$idtype ORDER BY (highlights) DESC LIMIT $start,".constants::page_book);
            break;
            case 'giam_gia':
            $result = DataProvider::executeQuery("select * from `book` where idtype=$idtype ORDER BY (saleoff) DESC LIMIT $start,".constants::page_book);
            break;
            case 'ten':
            $result = DataProvider::executeQuery("select * from `book` where idtype=$idtype ORDER BY (name) LIMIT $start,".constants::page_book);
            break;

            default:
                # code...
            break;
        }

        return TestResult::testResultModel($result);
    }

    public function getListBookInCate($listIdType,$start,$sort){
        switch ($sort) {
         case 'normal':
         $result = DataProvider::executeQuery('select * from `book` where idtype in('.implode(',', $listIdType).') LIMIT '.$start.','.constants::page_book);
         break;
         case 'gia_giam':
         $result = DataProvider::executeQuery('select * from `book` where idtype in('.implode(',', $listIdType).') ORDER BY (price - (price*saleoff/100)) DESC LIMIT '.$start.','.constants::page_book);
         break;
         case 'gia_tang':
         $result = DataProvider::executeQuery('select * from `book` where idtype in('.implode(',', $listIdType).') ORDER BY (price - (price*saleoff/100)) LIMIT '.$start.','.constants::page_book);
         break;
         case 'ban_chay':
         $result = DataProvider::executeQuery('select * from `book` where idtype in('.implode(',', $listIdType).') ORDER BY (highlights) DESC LIMIT '.$start.','.constants::page_book);
         break;
         case 'giam_gia':
         $result = DataProvider::executeQuery('select * from `book` where idtype in('.implode(',', $listIdType).') ORDER BY (saleoff) DESC LIMIT '.$start.','.constants::page_book);
         break;
         case 'ten':
         $result = DataProvider::executeQuery('select * from `book` where idtype in('.implode(',', $listIdType).') ORDER BY (name) LIMIT '.$start.','.constants::page_book);
         break;

         default:
                # code...
         break;
     }
        //dùng implode cắt dấu phẩu hay sao á - huy

     return TestResult::testResultModel($result);
 }

public function getListBookSearch($search,$start,$sort){
        switch ($sort) {
            case 'normal':
            $result = DataProvider::executeQuery("select * from book where name like '%".$search."%' LIMIT ".$start.",".constants::page_book);
            break;
            case 'gia_giam':
            $result = DataProvider::executeQuery("select * from book where name like '%".$search."%' ORDER BY (price - (price*saleoff/100)) DESC LIMIT ".$start.",".constants::page_book);
            break;
            case 'gia_tang':
            $result = DataProvider::executeQuery("select * from book where name like '%".$search."%' ORDER BY (price - (price*saleoff/100))LIMIT ".$start.",".constants::page_book);
            break;
            case 'ban_chay':
            $result = DataProvider::executeQuery("select * from book where name like '%".$search."%'ORDER BY (highlights) DESC LIMIT ".$start.",".constants::page_book);
            break;
            case 'giam_gia':
            $result = DataProvider::executeQuery("select * from book where name like '%".$search."%'  ORDER BY (saleoff) DESC LIMIT ".$start.",".constants::page_book);
            break;
            case 'ten':
            $result = DataProvider::executeQuery("select * from book where name like '%".$search."%' ORDER BY (name) LIMIT ".$start.",".constants::page_book);
            break;

            default:
                # code...
            break;
        }

        return TestResult::testResultModel($result);
    }



//0 là category, 1 là type, 2 là search

 public function getTotalBook($id,$typeCateSearch){
    switch($typeCateSearch){
        case 0:
        $listIdType=TestResult::testResultModel(DataProvider::executeQuery("select `idtype` from `db_type` where idcategory=$id"));
        if ($listIdType == null) return null; 
        else{
            $rows=array();//tạo một mảng
            while($d=mysql_fetch_assoc($listIdType)) array_push($rows, $d['idtype']); //qua mỗi dòng add vào mảng trường idtype
            $result = DataProvider::executeQuery("select count(*) as count from `book` where idtype in(".implode(',', $rows).")");
            //return (int)mysql_fetch_assoc($result)['count'];
        }
        break;
        case 1:  
        $result = DataProvider::executeQuery("select count(*) as count from `book` where idtype = $id");
        //return (int)mysql_fetch_assoc($result)['count'];
        break;
        case 2:
        $result=DataProvider::executeQuery("select count(*) as count from `book` where name like '%$id%' ");
        break;
        default: break; 
    }
    return (int)mysql_fetch_assoc($result)['count'];
}


}
?>