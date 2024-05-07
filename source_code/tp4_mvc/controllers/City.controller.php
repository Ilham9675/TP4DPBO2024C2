<?php
include_once("conf.php");
include_once("models/City.class.php");
include_once("views/City.view.php");

class CityController {
  private $City;
  
  function __construct(){
    $this->City = new City(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    
  }

  public function index() {
    $this->City->open();
    
    $this->City->getCities();
    
    $data = array(
      'City' => array(),
    );
    while($row = $this->City->getResult()){
      // echo "<pre>";
      // print_r($row);
      // echo "</pre>";
      array_push($data['City'], $row);
    }
    
    $this->City->close();
    

    $view = new CityView();
    $view->render($data);
  }


  function add_action($data){
    $this->City->open();
    $this->City->addCity($data);
    $this->City->close();
  }

  function add(){
    $view = new AddCityView();
    $view->render();
  }

  function edit($id){
    $this->City->open();
    
    $this->City->getCityById($id);
    
    $data = array(
      'City' => array(),
    );
    array_push($data['City'], $this->City->getResult());
    $this->City->close();
    $view = new editCityView();
    $view->render($data);
  }

  function edit_action($data){
    $this->City->open();
    $this->City->editCity($data);
    $this->City->close();
  }

  function delete($id){
    
    $this->City->open();
    $this->City->deleteCity($id);
    $this->City->close();
  }

}