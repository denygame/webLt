<?php
require_once 'model/CategoryModel.php';

class CategoryController
{
    private $model;

    public function __construct()
    {
        $this->model = new CategoryModel();
    }

    public function loadCategory()
    {
        $result = $this->model->getListCategory();
        if(!$result) echo 'Lỗi truy vấn';
        if ($result == null) return null;
        else return $result;
    }
}
?>