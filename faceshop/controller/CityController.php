<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/CityModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';


class CityController
{
	private $model;
	public function __construct(){
		$this->model=new CityModel();
	}

	public function getCitys(){
		$city=$this->model->showAllCity();
		return $city;
	}

	public function getNameByID($id){
		$city=$this->model->getNameCity($id);
		return mysql_fetch_assoc($city)['name'];
	}
}
?>
