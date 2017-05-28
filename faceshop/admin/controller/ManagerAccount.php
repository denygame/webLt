<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/AccountController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/admin/model/ManagerAccountModel.php';

class ManagerAccount
{
  private $model;
  function __construct()
  {
    $this->model=new ManagerAccountModel();
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
				echo "<script language='javascript'>alert('Email Password không được trống!');</script>";
			}
			else{
				$passEn = sha1($password);
				$kq = $this->model->checkLogin($email,$passEn);
				if($kq!=null){
            		//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
					$_SESSION['emailAdmin'] = $email;
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



  public function getInfoPageAccount(){
    $acc=new AccountController();
    $getTotal=$acc->getCountNotDelete();
    if($getTotal!=null){
      $total=mysql_fetch_assoc($getTotal)['count'];
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $limit = constants::page_managerAcc;
      $total_page = ceil($total / $limit);
      $start = ($current_page - 1) * $limit;
      $result = array('current_page' => $current_page,'total_page'=>$total_page,'start'=>$start );
      return $result;
    }
  }


  private function page($str,$current_page,$total_page){
    $nhom=5;
    if ($current_page > 1 && $total_page > 1){
      echo '<a class="phantrang" href="'.$str.'&page=1"> &#10094;&#10094; </a>';
      echo '<a class="phantrang" href="'.$str.'&page='.($current_page-1).'"> &#10094 </a>';
    }
    if($current_page<$nhom){
      $dau=1;
      $cuoi=$nhom;
    } else {
      $dau=$current_page-2;
      $cuoi=$current_page+2;
    }

    if($cuoi>$total_page){
      $dau=$current_page-4;
      $cuoi=$total_page;
    }

    if($current_page==1 && $total_page==1) {
      $dau=$cuoi=1;
    }

    if($current_page < $nhom && $current_page<$total_page && $total_page <= $nhom) {
      $dau=1;
      $cuoi=$total_page;
    }
    if($current_page ==$total_page && $current_page < $nhom && $total_page <$nhom) {
      $dau=1;
      $cuoi=$total_page;
    }

    for ($i = $dau; $i <= $cuoi; $i++){
      if ($i == $current_page){
        echo '<span class="selected">'. $i .'</span>     ';
      }
      else{
        echo '<a class="phantrang" href="'.$str.'&page='.$i.'">'. $i .'</a>     ';
      }
    }

    if ($current_page < $total_page && $total_page > 1){
      echo '<a class="phantrang" href="'.$str.'&page='. ($current_page+1) .'"> &#10095; </a>      ';
      echo '<a class="phantrang" href="'.$str.'&page='.$total_page.'"> &#10095;&#10095; </a>';
    }
  }


  public function pageManagerAccount($current_page,$total_page){
    $this->page("index.php?admin=manage_account",$current_page,$total_page);
  }

  public function delete($email){
    $re=$this->model->deleteEmail($email);
    echo $re;
  }
}

if(isset($_GET['listEmailAccountDel'])){
  $list = $_GET['listEmailAccountDel'];
  $m=new ManagerAccount();
  for($i=0;$i<count($list);$i++) $m->delete($list[$i]);
}
?>
