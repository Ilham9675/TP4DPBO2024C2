<?php
include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/City.class.php");
include_once("models/membershiptype.class.php");
include_once("views/Member.view.php");

class MemberController {
  private $Member;
  private $City;
  private $membershiptype;
  
  function __construct(){
    $this->Member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->City = new City(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->membershiptype = new membershiptype(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    
  }

  
  
  

  public function index() {
    $this->Member->open();
    // $this->City->open();
    // $this->membershiptype->open();
    
    $this->Member->getMemberJoin();
    
    $data = array(
      'Member' => array(),
      // 'City' => array(),
      // 'membershiptype' => array(),
    );
    while($row = $this->Member->getResult()){
      array_push($data['Member'], $row);
    }
    // while($row = $this->City->getResult()){
    //   array_push($data['City'], $row);
    // }
    // while($row = $this->membershiptype->getResult()){
    //   array_push($data['membershiptype'], $row);
    // }


    
    $this->Member->close();
    // $this->City->close();
    // $this->membershiptype->close();

    $view = new MemberView();
    $view->render($data);
  }

  function add_action($data){
    $this->Member->open();
    $this->Member->addMember($data);
    $this->Member->close();
  }

  function add(){
    $this->City->open();
    $this->membershiptype->open();

    $this->City->getCities();
    $this->membershiptype->getMembershipTypes();

    $data = array(
      
      'City' => array(),
      'membershiptype' => array(),
    );
    
    while($row = $this->City->getResult()){
      array_push($data['City'], $row);
    }
    while($row = $this->membershiptype->getResult()){
      array_push($data['membershiptype'], $row);
    }
    $view = new AddMemberView();
    $view->render($data);
  }

  function edit($id){
    $this->Member->open();
    
    $this->Member->getMemberById($id);
    
    $data = array(
      'Member' => array(),
    );

    array_push($data['Member'], $this->Member->getResult());


    $this->City->open();
    $this->membershiptype->open();

    $this->City->getCities();
    $this->membershiptype->getMembershipTypes();

    $data_edit = array(
      
      'City' => array(),
      'membershiptype' => array(),
    );
    
    while($row = $this->City->getResult()){
      array_push($data_edit['City'], $row);
    }
    while($row = $this->membershiptype->getResult()){
      array_push($data_edit['membershiptype'], $row);
    }
    $this->Member->close();
    $view = new editMemberView();
    $view->render($data_edit,$data);
  }

  function edit_action($data){
    $this->Member->open();
    $this->Member->editMember($data);
    $this->Member->close();
  }

  function delete($id){
    
    $this->Member->open();
    $this->Member->deleMember($id);
    $this->Member->close();
  }

}