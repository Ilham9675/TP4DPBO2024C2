<?php
include_once("conf.php");
include_once("models/membershiptype.class.php");
include_once("views/membershiptype.view.php");

class membershiptypeController {
  private $membershiptype;
  
  function __construct(){
    $this->membershiptype = new membershiptype(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    
  }

  public function index() {
    $this->membershiptype->open();
    
    $this->membershiptype->getMembershipTypes();
    
    $data = array(
      'membershiptype' => array(),
    );
    while($row = $this->membershiptype->getResult()){
      // echo "<pre>";
      // print_r($row);
      // echo "</pre>";
      array_push($data['membershiptype'], $row);
    }
    
    $this->membershiptype->close();
    

    $view = new membershiptypeView();
    $view->render($data);
  }

  function add_action($data){
    $this->membershiptype->open();
    $this->membershiptype->addmembershiptype($data);
    $this->membershiptype->close();
  }

  function add(){
    $view = new AddmembershiptypeView();
    $view->render();
  }

  function edit($id){
    $this->membershiptype->open();
    
    $this->membershiptype->getmembershiptypeById($id);
    
    $data = array(
      'membershiptype' => array(),
    );
    array_push($data['membershiptype'], $this->membershiptype->getResult());
    $this->membershiptype->close();
    $view = new editmembershiptypeView();
    $view->render($data);
  }

  function edit_action($data){
    $this->membershiptype->open();
    $this->membershiptype->editmembershiptype($data);
    $this->membershiptype->close();
  }

  function delete($id){
    
    $this->membershiptype->open();
    $this->membershiptype->deleteMembershipType($id);
    $this->membershiptype->close();
  }

}