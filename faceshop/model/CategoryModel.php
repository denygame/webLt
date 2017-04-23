<?php
require_once 'DataProvider.php';
class CategoryModel
{
    public function getListCategory()
    {
        $result = DataProvider::executeQuery('select * from `category`');
        if(!$result) return false;
        if (mysql_num_rows($result) > 0) return $result;
        return null;
    }
}
?>