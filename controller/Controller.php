<?php
include_once("model/Model.php");

class Controller {
	public $model;
	
	public function Controller()  
    {  
        $this->model = new Model();

	} 
	public function show()
	{
	 $result = $this->model->insert_data();
	 include 'view/view.php';
	}
	public function show1()
	{
	 $result = $this->model->insert_user();
	 include 'view/signUp.php';
	}
	
	
	
}

?>