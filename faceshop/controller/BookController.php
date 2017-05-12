<?php
require_once 'model/BookModel.php';
require_once 'others/TestResult.php';
require_once 'others/constants.php';
class BookController
{
    private $model;
    private $typeModel;
    public function __construct()
    {
        $this->model = new BookModel();
        $this->typeModel=new TypeModel();
    }

    public function load6BookHighlight()
    {
        $result = $this->model->get6BookHighlights();
        return TestResult::testResultController($result);
    }

    public function load12BookNew(){
        $result = $this->model->get12BookNew();
        return TestResult::testResultController($result);
    }

    public function load6BookFuture(){
        $result = $this->model->get6BookFuture();
        return TestResult::testResultController($result);
    }
    
//test lại
    public function showMainBook(){
        if(isset($_GET['idbook']))
        {
            $idBook=$_GET['idbook'];
            if(isset($idBook)){
                $result =$this->model->getBookById($idBook);
                if(!$result || $result == null) {
                    include 'view/main_home.php';
                    return;
                }
                else{
                    include 'view/main_book.php';
                    return;
                }
            }
            else include 'view/main_home.php';
        }
        else include 'view/main_home.php';
    }

    



    public function getBookById($idBook){
        $result = $this->model->getBookById($idBook);
        if ($result == null) return null; else return mysql_fetch_assoc($result);
    }

    public function get6BookSameType($idBook,$idType){
        $result = $this->model->get6BookSameType($idType,$idBook);
        return TestResult::testResultController($result);
    }



    public function getListBookInType($idtype,$start,$sort){
        $result = $this->model->getListBookInType($idtype,$start,$sort);
        return TestResult::testResultController($result);
    }


//hàm haiz, xem
    public function getListBookInCate($idcategory,$start,$sort){
        $listIdType=$this->typeModel->getListIdType($idcategory);
        if ($listIdType == null) return null; 
        else{
            $rows=array();//tạo một mảng
            while($d=mysql_fetch_assoc($listIdType)) array_push($rows, $d['idtype']); //qua mỗi dòng add vào mảng trường idtype
            $result = $this->model->getListBookInCate($rows,$start,$sort);
            return TestResult::testResultController($result);
        }
    }

    // hàm tìm kiếm !!!!!!!!!!!!!!!
    public function getListBookInSearch($search,$sort,$start){
        $result = $this->model->getListBookSearch($search,$start,$sort);
        return TestResult::testResultController($result);

    }




//lấy theo Cate là 0, type là 1, search 2
    public function getInfoPageBook($id,$typeCateSearch){
        $total_books =$this->model->getTotalBook($id,$typeCateSearch);
//return null?

        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = constants::page_book;
        $total_page = ceil($total_books / $limit);
        $start = ($current_page - 1) * $limit;
        $result = array('current_page' => $current_page,'total_page'=>$total_page,'start'=>$start );
        return $result;
    }




//#Region - Page Book - //
    private function printPrevious($str,$current_page){
        if(isset($_GET['search'])){
          if($current_page == 1) { echo '<a>Prev</a>'; return; }
          echo '<a href="index.php?' . $str . '&page=' . ($current_page - 1) . '">Prev</a>  ';
      }else{
        if($current_page == 1) { echo '<a>Prev</a>'; return; }
        echo '<a href="index.php?id=category&' . $str . '&page=' . ($current_page - 1) . '">Prev</a>  ';
    }
}

private function printNext($str,$current_page,$total_page){
  if(isset($_GET['search'])){
      if($current_page == $total_page) { echo '<a>Next</a>'; return; }
      echo '<a href="index.php?' . $str . '&page=' . ($current_page + 1) . '">Next</a>  ';
  }else{
    if($current_page == $total_page) { echo '<a>Next</a>'; return; }
    echo '<a href="index.php?id=category&' . $str . '&page=' . ($current_page + 1) . '">Next</a>  ';
}
}

private function printSpanCurent($pageName){
    echo '<a style="color: #FF0000">' . $pageName . '</a>  ';
}

private function printOthersPage($str,$pageName){
    if(isset($_GET['search'])){
        echo '<a href="index.php?' . $str . '&page=' . $pageName . '">' . $pageName . '</a>  ';
    } else echo '<a href="index.php?id=category&' . $str . '&page=' . $pageName . '">' . $pageName . '</a>  ';
}

private function printLast($str,$current_page,$total_page){
    if(isset($_GET['search'])) {
        if($current_page == $total_page) { echo '<a>Last</a>'; return; }
        echo '<a href="index.php?' . $str . '&page=' . $total_page . '">Last</a>  ';
    } else {
        if($current_page == $total_page) { echo '<a>Last</a>'; return; }
        echo '<a href="index.php?id=category&' . $str . '&page=' . $total_page . '">Last</a>';
    }
}

private function printFirst($str,$current_page){
    if(isset($_GET['search'])) {
        if($current_page == 1) { echo '<a>First</a>'; return; }
        echo '<a href="index.php?' . $str . '&page=1">First</a>';
    } else {
        if($current_page == 1) { echo '<a>First</a>'; return; }
        echo '<a href="index.php?id=category&' . $str . '&page=1">First</a>';
    }
}

public function pageBook($str,$current_page,$total_page){
    $this->printFirst($str,$current_page);
    $this->printPrevious($str,$current_page);
        //total bé hơn 4 k cần chấm chấm
    if($total_page <= 4) {
        for($i = 1; $i <= $total_page; $i++) {
            if ($i == $current_page) $this->printSpanCurent($i); else $this->printOthersPage($str,$i); 
        }  
        $this->printNext($str,$current_page,$total_page);
        $this->printLast($str,$current_page,$total_page);
        return;
    }
        //total >4 
    if ($current_page < 3) {
                // Lặp khoảng giữa là 4 trang
        for ($i = 1; $i <= 4; $i++) {
            if ($i == $current_page) $this->printSpanCurent($i); else $this->printOthersPage($str,$i);
        }
        $this->printNext($str,$current_page,$total_page);
        $this->printLast($str,$current_page,$total_page);
    }
    else {
        for ($i = $current_page - 1; $i <= $current_page + 2; $i++) {
            if($i==$total_page+1) break;
            if ($i == $current_page) $this->printSpanCurent($i);  else $this->printOthersPage($str,$i);
        }
        $this->printNext($str,$current_page,$total_page);
        $this->printLast($str,$current_page,$total_page);
    } 
}
//#End Region - Page Book - //
}
?>