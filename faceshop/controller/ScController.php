<?php
require_once 'model/ScModel.php';
require_once 'others/TestResult.php';
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

    public function addBook($idbook,$count){
        $this->model->addBook();
    }
}
?>