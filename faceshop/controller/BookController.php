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

    public function showMainCategory(){
        if(isset($_GET['idtype'])) $idtype=$_GET['idtype'];
        if(isset($_GET['idcategory'])) $idcategory=$_GET['idcategory'];

        if(!isset($idtype)&&!isset($idcategory)){include 'view/main_home.php';return;}
        if(isset($idcategory)&&isset($idtype)){echo 'Không thể thực thi';return;}
        if(isset($idtype)){include 'view/main_category.php'; return;}
        if(isset($idcategory)){include 'view/main_category.php'; return;}

        include 'view/main_home.php'; return;
    }

    public function getListBookInType($idtype,$start){
        $result = $this->model->getListBookInType($idtype,$start);
        return TestResult::testResultController($result);
    }


//hàm haiz, xem
    public function getListBookInCate($idcategory,$start){
        $listIdType=$this->typeModel->getListIdType($idcategory);
        if ($listIdType == null) return null; 
        else{
            $rows=array();//tạo một mảng
            while($d=mysql_fetch_assoc($listIdType)) array_push($rows, $d['idtype']); //qua mỗi dòng add vào mảng trường idtype
            $result = $this->model->getListBookInCate($rows,$start);
            return TestResult::testResultController($result);
        }
    }

//lấy theo Cate là 0, type là 1
    public function getInfoPageBook($id,$typeOrCate){
        $total_books =$this->model->getTotalBook($id,$typeOrCate);
//return null?

        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = constants::page_book;
        $total_page = ceil($total_books / $limit);
        $start = ($current_page - 1) * $limit;
        $result = array('current_page' => $current_page,'total_page'=>$total_page,'start'=>$start );
        return $result;
    }



}
?>