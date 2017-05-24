<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/ScModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';


class ScController
{
	private $model;
	public function __construct()
    {
        $this->model = new ScModel();
    }

    public function getSC(){
        $sc=$this->model->getSC();
        return $sc;
    }

    public function writeCountBook(){
    	$r = $this->model->countBook();
    	if($r==null) $r=0;
    	echo $r;
    }

    public function addBookToSc($idbook){
        $this->model->addBook($idbook);
    }

    public function getCount(){
        $result=$this->model->countSC();
        $row = mysql_num_rows($result);
        if($row>0){
            $row = mysql_fetch_assoc($result); 
            $sum = $row['count'];
            if(is_numeric($sum))
                echo $sum;
            else echo '0';
        }
        else echo '0';
    }

    public function delete($idbook){
        $this->model->deleteBook($idbook);
    }

    public function updateSC($idbook,$count,$type){
        $this->model->update($idbook,$count,$type);
    }
}

//ajax file countBookSC.js add book to shoppingcart
if(isset($_GET['addbook'])){
    $idbook=$_GET['addbook'];
    $sc=new ScController();
    $sc->addBookToSc($idbook);

    //return total book in sc
    $sc->getCount();
}

//ajax file deleteSC.js
if(isset($_GET['delbook'])){
    $idbook=$_GET['delbook'];
    $sc=new ScController();
    $sc->delete($idbook);

    //return total book in sc
    $sc->getCount();
    unset($_GET['idbook']);
}


//ajax for update book in main_book.php
if(isset($_GET['updatebook'])){
    $sc=new ScController();
    $idbook=$_GET['updatebook'];
    $count=$_GET['count'];
    $sc->updateSC($idbook,$count,1);
}

if(isset($_GET['justCount'])){
    $sc=new ScController();
    $sc->getCount();
}
?>