<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");
include_once("controllers/City.controller.php");
include_once("controllers/MembershipType.controller.php");

$Member = new MemberController();
$City = new CityController();
$MembershipType = new MembershipTypeController();
if (isset($_GET['member'])){
    $id = $_GET['id_edit'];
    $Member->edit($id);
}elseif (isset($_GET['city'])) {
    $id = $_GET['id_edit'];
    $City->edit($id);
}elseif (isset($_GET['membershiptype'])) {
    $id = $_GET['id_edit'];
    $MembershipType->edit($id);
}

?>
