<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';

class ProfileController
{
	private function clickJavascript($id){
		echo '<script type="text/javascript">
				$(document).ready(function () {
					$("#'.$id.'").css("background","#7f7f7f");
				});
			</script>';
	}


	public function showDivProfileRight(){
		if(!isset($_GET['idlogin'])){
			include 'view/info_user.php';
			$this->clickJavascript('info_user');
		}
		if(isset($_GET['idlogin']))
		{
			$idlogin=$_GET['idlogin'];
			switch ($idlogin)
			{
				case 'info_user':
				include 'view/info_user.php';
				$this->clickJavascript($idlogin);
				break;

				case 'change_pw':
				include 'view/change_pw.php';
				$this->clickJavascript($idlogin);
				break;

				case 'bill':
				include 'view/list_bill.php';
				$this->clickJavascript($idlogin);
				break;

				case 'user_update':
				include 'view/user_update.php';
				$this->clickJavascript('info_user');
				break;

				case 'bill_detail':
				include 'view/bill_detail.php';
				$this->clickJavascript('bill');
				break;

				default : echo 'Không tồn tại trang này';
			}
		}
	}
}
?>