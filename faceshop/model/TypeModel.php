<?php
require_once 'DataProvider.php';
class TypeModel
{
    //lấy danh sách các loại sách trong danh mục
    public function getListTypeByIdCategory($idCategory)
    {
        $result = DataProvider::executeQuery('select * from `db_type` WHERE idcategory ='.$idCategory);
        if(!$result) return false;
        if (mysql_num_rows($result) > 0) return $result;
        return null;
    }
}
?>