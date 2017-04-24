<?php
require_once 'model/AuthorModel.php';
class AuthorController
{
    private $model;

    public function __construct()
    {
        $this->model = new AuthorModel();
    }

    public function getNameAuthorById($idAuthor){
        $result = $this->model->getName($idAuthor);
        if ($result == null) return null; else return mysql_fetch_assoc($result); //phải dùng lệnh này để lấy trường data
    }

    public function getNameInfoAuthorById($idAuthor){
        $result = $this->model->getNameAndInfo($idAuthor);
        if ($result == null) return null; else return mysql_fetch_assoc($result);
    }
}
?>