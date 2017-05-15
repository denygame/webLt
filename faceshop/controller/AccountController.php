<?php
require_once 'model/AccountModel.php';
class AccountController
{
	private $model;
	public function __construct(){
		$this->model=new AccountModel();
	}


	public function login(){
		if(isset($_POST['btn_submit']))
		{
			// lấy thông tin người dùng
			$email = $_POST["email"];
			$password = $_POST["password"];
			//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
			//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
			$email = strip_tags($email);
			$email = addslashes($email);
			$password = strip_tags($password);
			$password = addslashes($password);
			if ($email == "" || $password =="") {
				echo "Email hoặc Password bạn không được để trống!";
			}
			else{
				$passEn = sha1($password);
				$kq = $this->model->checkLogin($email,$passEn);
				if($kq!=null){
            		//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
					$_SESSION['email'] = $email;
					echo "<script language='javascript'>alert('Đăng Nhập Thành Công');";
					echo "location.href='index.php';</script>";
				}
				else
				{
					echo "<script language='javascript'>alert('Đăng Nhập Thất Bại');";
					echo "location.href='index.php?id=login';</script>";
				}
			}
		}
	}

}
?>