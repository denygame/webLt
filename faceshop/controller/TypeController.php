<?php
require_once 'model/TypeModel.php';

class TypeController
{
    private $model;

    public function __construct()
    {
        $this->model = new TypeModel();
    }

    public function loadTypeOfCategory($idCategory)
    {
        $result = $this->model->getListTypeByIdCategory($idCategory);
        if(!$result) echo 'Lỗi truy vấn';
        if ($result == null) return null;
        else return $result;
    }
}
?>