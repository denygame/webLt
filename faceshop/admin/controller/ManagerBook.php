<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/TypeController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/BookController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/admin/model/ManagerBookModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/constants.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';



class ManagerBook
{

  private $model;
  public function __construct(){
    $this->model=new ManagerBookModel();
  }

  public function getListTypeByIdCate($idcate){
    $type = new TypeController();
    $list = $type->loadTypeOfCategory($idcate);
    return $list;
  }


  public function getListBook($start){
    $b=new BookController();

    if(isset($_GET['idtype'])){
      $idtype=$_GET['idtype'];
      $listByType=$b->getListBookInType($idtype,$start,'normal',constants::page_managerBook);
      return $listByType;
    }

    if(isset($_GET['idcategory'])){
      $idcategory = $_GET['idcategory'];
      $listByCate = $b->getListBookInCate($idcategory,$start,'normal',constants::page_managerBook);
      return $listByCate;
    }

    $r=$this->model->getListBook($start);
    return TestResult::testResultController($r);
  }


  public function getInfoPageManageBook(){
    $b=new BookController();

    if(isset($_GET['idtype'])){
      $idtype=$_GET['idtype'];
      $listByType=$b->getInfoPageBook($idtype,1);
      return $listByType;
    }

    if(isset($_GET['idcategory'])){
      $idcategory = $_GET['idcategory'];
      $listByCate = $b->getInfoPageBook($idcategory, 0);
      return $listByCate;
    }
    $getTotal=$b->bookTotal();
    if($getTotal!=null){
      $total=mysql_fetch_assoc($getTotal)['count'];
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $limit = constants::page_managerBook;
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
    if($current_page<$nhom)
    {
      $dau=1;
      $cuoi=$nhom;
    }
    else
    {
      $dau=$current_page-2;
      $cuoi=$current_page+2;
    }
    if($cuoi>$total_page)
    {
      $dau=$current_page-4;
      $cuoi=$total_page;
    }
    if($current_page==1 && $total_page==1)
    {
      $dau=$cuoi=1;
    }
    if($current_page < $nhom && $current_page<$total_page && $total_page <= $nhom)
    {
      $dau=1;
      $cuoi=$total_page;
    }
    if($current_page ==$total_page && $current_page < $nhom && $total_page <$nhom)
    {
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

  public function pageManagerBook($current_page,$total_page){
    if(isset($_GET['idtype'])){
      $idtype=$_GET['idtype'];
      $idcategory = $_GET['idcategory'];
      $this->page("index.php?admin=manage_book&idcategory=$idcategory&idtype=$idtype",$current_page,$total_page);
      return;
    }

    if(isset($_GET['idcategory'])){
      $idcategory = $_GET['idcategory'];
      $this->page("index.php?admin=manage_book&idcategory=$idcategory",$current_page,$total_page);
      return;
    }

    $this->page("index.php?admin=manage_book",$current_page,$total_page);
  }

  public function delete($idbook){
    $re=$this->model->deleteBook($idbook);
    echo $re;
  }
}





if(isset($_GET['idcate'])){
  $m=new ManagerBook();

  $array = array();
  $types = $m->getListTypeByIdCate($_GET['idcate']);
  if($types!=null){
    while($d=mysql_fetch_array($types)) array_push($array,$d);
  }
  echo json_encode($array);
}

if(isset($_GET['listIdBookDel'])){
  $list = $_GET['listIdBookDel'];
  $m=new ManagerBook();
  for($i=0;$i<count($list);$i++) $m->delete($list[$i]);
}

?>
