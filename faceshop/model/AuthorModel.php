<?php
require_once 'DataProvider.php';
class AuthorModel
{
    public function getName($idAuthor)
    {
        $result = DataProvider::executeQuery('select `name` from `author` WHERE idauthor='.$idAuthor);
        if(!$result) return false;
        if (mysql_num_rows($result) > 0) return $result;
        return null;
    }

    public function getNameAndInfo($idAuthor)
    {
        $result = DataProvider::executeQuery('select `name`, `info` from `author` WHERE idauthor='.$idAuthor);
        if(!$result) return false;
        if (mysql_num_rows($result) > 0) return $result;
        return null;
    }
}
?>