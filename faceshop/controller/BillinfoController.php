<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/BillinfoModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/constants.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';


class BillinfoController
{
	private $model;
	public function __construct(){
		$this->model=new BillinfoModel();
	}

	public function billInfos($idbill,$start){
		$r=$this->model->getBillsInfo($idbill,$start);
		return TestResult::testResultController($r);
	}


	public function getInfoPageBillinfo($idbill){
		$getTotal=$this->model->getTotalBillsInfo($idbill);
		if($getTotal!=null){
			$total=mysql_fetch_assoc($getTotal)['count'];
			$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
			$limit = constants::page_bill;
			$total_page = ceil($total / $limit);
			$start = ($current_page - 1) * $limit;
			$result = array('current_page' => $current_page,'total_page'=>$total_page,'start'=>$start );
			return $result;
		}
	}



	public function pageBills($str,$current_page,$total_page){

		if ($current_page > 1 && $total_page > 1){
			echo '<a href="index.php?'.$str.'&page='.($current_page-1).'"> Prev </a>     ';
		}

		for ($i = 1; $i <= $total_page; $i++){
			if ($i == $current_page){
				echo '<span>'. $i .'</span>     ';
			}
			else{
				echo '<a href="index.php?'.$str.'&page='.$i.'">'. $i .'</a>     ';
			}
		}

		if ($current_page < $total_page && $total_page > 1){
			echo '<a href="index.php?'.$str.'&page='. ($current_page+1) .'"> Next </a>      ';
		}
	}
}
?>