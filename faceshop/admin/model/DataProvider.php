<?php
require_once ('controller/DB_Connect.php');
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