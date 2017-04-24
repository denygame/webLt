<?php
require_once 'DataProvider.php';
require_once 'TypeModel.php';
require_once 'others/TestResult.php';
class BookModel
{
    private $typeModel;
    public function __contruct(){
        $this->typeModel = new TypeModel();
    }

    public function get6BookHighlights()
    {
        $result = DataProvider::executeQuery('select * from `book` ORDER BY highlights DESC LIMIT 6');
        return TestResult::testResultModel($result);
    }

    public function get12BookNew()
    {
        $result = DataProvider::executeQuery('select * from `book` WHERE status LIKE \'Sách mới\' LIMIT 18;');
        return TestResult::testResultModel($result);
    }

    public function get6BookFuture()
    {
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

    public function getListBookInType($idtype,$start){
        $result = DataProvider::executeQuery("select * from `book` where idtype=$idtype LIMIT $start,".constants::page_book);
        return TestResult::testResultModel($result);
    }

    public function getListBookInCate($listIdType,$start){
        //dùng implode cắt dấu phẩu hay sao á - thanh huy
        $result = DataProvider::executeQuery('select * from `book` where idtype in('.implode(',', $listIdType).') LIMIT '.$start.','.constants::page_book);
        return TestResult::testResultModel($result);
    }
//0 là category
    public function getTotalBook($id,$typeOrCate){
        if($typeOrCate==0){
            $listIdType=TestResult::testResultModel(DataProvider::executeQuery("select `idtype` from `db_type` where idcategory=$id"));
            if ($listIdType == null) return null; 
            else{
            $rows=array();//tạo một mảng
            while($d=mysql_fetch_assoc($listIdType)) array_push($rows, $d['idtype']); //qua mỗi dòng add vào mảng trường idtype
            $result = DataProvider::executeQuery("select count(*) as count from `book` where idtype in(".implode(',', $rows).")");
            return (int)mysql_fetch_assoc($result)['count'];
        }
    }else {
        $result = DataProvider::executeQuery("select count(*) as count from `book` where idtype = $id");
        return (int)mysql_fetch_assoc($result)['count'];
    }
}
}
?>