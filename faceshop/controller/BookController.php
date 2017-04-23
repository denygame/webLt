<?php
require_once 'model/BookModel.php';

    class BookController
    {
        private $model;

        public function __construct()
        {
            $this->model = new BookModel();
        }

        public function load6BookHighlight()
        {
            $result = $this->model->get6BookHighlights();
            if(!$result) echo 'Lỗi truy vấn';
            if ($result == null) return null;
            else return $result;
        }

        public function load12BookNew(){
            $result = $this->model->get12BookNew();
            if(!$result) echo 'Lỗi truy vấn';
            if ($result == null) return null;
            else return $result;
        }

        public function load6BookFuture(){
            $result = $this->model->get6BookFuture();
            if(!$result) echo 'Lỗi truy vấn';
            if ($result == null) return null;
            else return $result;
        }

        public function showMainBook(){
            $idBook=$_GET['idbook'];
            if(isset($idBook)){
                $result =$this->model->getBookById($idBook);
                if(!$result) return false;
                if ($result == null) return false;
                else{
                    include 'view/main_book.php';
                    return true;
                }
            }
            else return false;
        }

        public function getBookById($idBook){
            $result = $this->model->getBookById($idBook);
            if(!$result) echo 'Lỗi truy vấn';
            if ($result == null) return null;
            else return mysql_fetch_assoc($result);
        }

        public function get6BookSameType($idBook,$idType){
            $result = $this->model->get6BookSameType($idType,$idBook);
            if(!$result) echo 'Không có sách nào cùng thể loại';
            if ($result == null) return null;
            else return $result;
        }
    }
?>