<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';
class DataProvider
{
    public static function executeQuery($query){
        $result = mysql_query($query);
        if (!$result) {
            die('Lỗi query: ' . mysql_error());
            return null;
        }
        return $result;
    }
}
?>