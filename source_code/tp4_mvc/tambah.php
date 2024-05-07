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
    $Member->add();
}elseif (isset($_GET['city'])) {
    $City->add();
}elseif (isset($_GET['membershiptype'])) {
    $MembershipType->add();
}

?>
