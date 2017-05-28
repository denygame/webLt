<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/BillModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/constants.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';


class BillController
{
	private $model;
	public function __construct(){
		$this->model=new BillModel();
	}

	public function billsByEmail($email,$start){
		$r=$this->model->getBillsByEmail($email,$start);
		return TestResult::testResultController($r);
	}

	public function insert($email,$name,$sex,$tel,$idcity,$district,$address,$status,$ship){
		$r=$this->model->getIdMax();
		if($r!=null) $idbill=mysql_fetch_assoc($r)['max'] + 1;
		else $idbill=1;
		$this->model->insertBill($idbill,$email,$name,$sex,$tel,$idcity,$district,$address,$status,$ship);
		return $idbill;
	}


	public function getInfoPageBill($email){
		$getTotal=$this->model->getTotalBills($email);
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
	public function pageBills($current_page,$total_page){
		if ($current_page > 1 && $total_page > 1){
			echo '<a class="phantrang" href="index.php?id=login&idlogin=bill&page='.($current_page-1).'"> &#10094 </a>     ';
		}
		
		for ($i = 1; $i <= $total_page; $i++){
			if ($i == $current_page){
				echo '<span class="selected" >'. $i .'</span>     ';
			}
			else{
				echo '<a class="phantrang" href="index.php?id=login&idlogin=bill&page='.$i.'">'. $i .'</a>     ';
			}
		}

		if ($current_page < $total_page && $total_page > 1){
			echo '<a class="phantrang" href="index.php?id=login&idlogin=bill&page='. ($current_page+1) .'"> &#10095; </a>      ';
		}
	}
}



?>
