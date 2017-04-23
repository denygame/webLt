<?php
require_once ('controller/DB_Connect.php');
class DataProvider
{
    public static function executeQuery($query){
        $strCon = new DB_Connect();
        $strCon->connect();
        $result = mysql_query($query);
        if (!$result) {
            die('Invalid query: ' . mysql_error());
            return false;
        }
        return $result;
    }
}
?>