<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/DataProvider.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';
class AuthorModel
{
    public function getName($idAuthor)
    {
        $result = DataProvider::executeQuery('select `name` from `author` WHERE idauthor='.$idAuthor);
        return TestResult::testResultModel($result);
    }

    public function getNameAndInfo($idAuthor)
    {
        $result = DataProvider::executeQuery('select `name`, `info` from `author` WHERE idauthor='.$idAuthor);
        return TestResult::testResultModel($result);
    }
}
?>