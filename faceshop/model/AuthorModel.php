<?php
require_once 'DataProvider.php';
require_once 'others/TestResult.php';
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