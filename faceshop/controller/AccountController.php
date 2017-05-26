<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/AccountModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/constants.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/PHPMailer/PHPMailerAutoload.php';

class AccountController
{
	private $model;
	public function __construct(){
		$this->model=new AccountModel();
	}

	public function getAccByEmail($email){
		$result=$this->model->getAcc($email);
		return TestResult::testResultController($result);
	}

//sc là 0, login là 1
	public function login($path, $scOrLogin){
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
				if($scOrLogin==1) echo "Email hoặc Password bạn không được để trống!";
				else echo "<script language='javascript'>alert('Email hoặc Password bạn không được để trống!');</script>";
			}
			else{
				$passEn = sha1($password);
				$kq = $this->model->checkLogin($email,$passEn);
				if($kq!=null){
            		//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
					$_SESSION['email'] = $email;
					echo "<script language='javascript'>alert('Đăng Nhập Thành Công');";
					echo "location.href='".$path."';</script>";
				}
				else
				{
					echo "<script language='javascript'>alert('Đăng Nhập Thất Bại');";
					echo "location.href='".$path."';</script>";
				}
			}
		}
	}


	public function existsEmail($email){
		$result=$this->model->exEmail($email);
		if($result) echo 'true'; else echo false;
	}


	public function register($email,$pass,$idcity,$name,$sex,$tel,$address,$district){
		$this->model->insert($email,$pass,$idcity,$name,$sex,$tel,$address,$district);
	}


//sinh ngẫu nhiên pass
	private function getPassRandom($lenght){
		$validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
		$validCharNumber = strlen($validCharacters);
		$result="";
		for ($i = 0; $i < $lenght; $i++)
		{
			$index = mt_rand(0, $validCharNumber - 1);
			$result .= $validCharacters[$index];
		}
		return $result;
	}


	public function resetPass($email){
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = constants::email;
		$mail->Password = constants::passEmail;
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom(constants::email, constants::name);
		$mail->addReplyTo(constants::email, constants::name);
		$mail->addAddress($email);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

		$mail->isHTML(true);

		$rand_newPass = $this->getPassRandom(12);

		$bodyContent = '<h1>T2HD</h1>';
		$bodyContent .= '<p>New Password: <b>'.$rand_newPass.'</b></p>';

		$mail->Subject = 'T2HD - Reset Password';
		$mail->Body    = $bodyContent;

		if(!$mail->send()) {
        /*echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;*/
        echo 'false';
	    } else {
	    	$this->model->updateNewPass($email,sha1($rand_newPass));
	    	echo 'true';
	    }
	}

	public function updateUser($email,$idcity,$name,$sex,$tel,$address,$district){
		$this->model->updateUserProfile($email,$idcity,$name,$sex,$tel,$address,$district);
	}

	public function getSex($email){
		$r=$this->model->getSex($email);
		if($r=='Nam') echo 'Male'; else echo 'Female';
	}

	public function getIdCity($email){
		$r=$this->model->getIdCity($email);
		echo $r;
	}

	public function renewPass($email,$old,$new,$renew){
		if($renew!=$new){
			echo 'falseRenew';
			return;
		}
		$passOldHash=sha1($old);
		$acc=$this->model->getAcc($email);
		$passInDb=mysql_fetch_assoc($acc)['pass'];
		if($passOldHash==$passInDb){
			$this->model->updateNewPass($email,sha1($new));
			echo 'true';
		}else{
			echo 'false';
		}
	}
}


//ajax of file register.js
if(isset($_GET['testExistsEmail'])){
	$email=$_GET['testExistsEmail'];
	$acc=new AccountController();
	$acc->existsEmail($email);
}

//ajax of file register.js register Account
if(isset($_GET['registerEmail'])){
	$email=$_GET['registerEmail'];
	$pass=$_GET['password'];
	$idcity=$_GET['city'];
	$name=$_GET['name'];
	$sex=$_GET['sex'];
	$tel=$_GET['tel'];
	$address=$_GET['address'];
	$district=$_GET['district'];

	$acc=new AccountController();
	$acc->register($email,$pass,$idcity,$name,$sex,$tel,$address,$district);
}

if(isset($_GET['forgotEmail'])){
	$email=$_GET['forgotEmail'];
	$acc=new AccountController();
	$acc->resetPass($email);
}

if(isset($_GET['emailUpdate'])){
	$email=$_GET['emailUpdate'];
	$idcity=$_GET['city'];
	$name=$_GET['name'];
	$sex=$_GET['sex'];
	$tel=$_GET['tel'];
	$address=$_GET['address'];
	$district=$_GET['district'];

	$acc=new AccountController();
	$acc->updateUser($email,$idcity,$name,$sex,$tel,$address,$district);
}

if(isset($_GET['getSex'])){
	$email=$_GET['getSex'];
	$acc=new AccountController();
	$acc->getSex($email);
}

if(isset($_GET['getIdCity'])){
	$email=$_GET['getIdCity'];
	$acc=new AccountController();
	$acc->getIdCity($email);
}

if(isset($_GET['emailReNewPass'])){
	$email=$_GET['emailReNewPass'];
	$old=$_GET['oldPass'];
	$new=$_GET['newPass'];
	$renew=$_GET['renew'];

	$acc=new AccountController();
	$acc->renewPass($email,$old,$new,$renew);
}
?>
