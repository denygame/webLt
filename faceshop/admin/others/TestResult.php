<?php
class TestResult{
	public static function testResultModel($result){
		//if(!$result) return false;
		if (mysql_num_rows($result) > 0) return $result;
        return null;
	}

	public static function testResultController($result){
		if ($result == null) return null; else return $result;
	}
}
?>