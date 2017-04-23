<?php
require_once 'DataProvider.php';
class BookModel
{
    private function testResult($result){
        if (mysql_num_rows($result) > 0) return true;
        return false;
    }

    public function get6BookHighlights()
    {
        $result = DataProvider::executeQuery('select * from `book` ORDER BY highlights DESC LIMIT 6');
        if(!$result) return false;
        if(!$this->testResult($result)) return null;
        return $result;
    }

    public function get12BookNew()
    {
        $result = DataProvider::executeQuery('select * from `book` WHERE status LIKE \'Sách mới\' LIMIT 18;');
        if(!$result) return false;
        if(!$this->testResult($result)) return null;
        return $result;
    }

    public function get6BookFuture()
    {
        $result = DataProvider::executeQuery('select * from `book` WHERE  status LIKE  \'Sách mới\' LIMIT 6;');
        if(!$result) return false;
        if(!$this->testResult($result)) return null;
        return $result;
    }

    public function getBookById($idBook){
        $result = DataProvider::executeQuery('select * from book where idbook='.$idBook);
        if(!$result) return false;
        if(!$this->testResult($result)) return null;
        return $result;
    }

    public function get6BookSameType($idType,$idBook){
        $result = DataProvider::executeQuery("select * from `book` where idbook != $idBook and idtype = $idType ORDER BY RAND() LIMIT 0,6");
        if(!$result) return false;
        if(!$this->testResult($result)) return null;
        return $result;
    }
}
?>