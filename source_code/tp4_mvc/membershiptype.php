<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/MembershipType.controller.php");

$MembershipType = new MembershipTypeController();

if (isset($_POST['add'])) {
    $data = array(
        'type_name' => $_POST['type_name'],
        'benefits' => $_POST['benefits'],
    );
    $MembershipType->add_action($data);
    header("location:membershiptype.php");
} else if (!empty($_GET['id_hapus'])) {
    
    $id = $_GET['id_hapus'];
    $MembershipType->delete($id);
    header("location:membershiptype.php");
} else if (isset($_POST['edit'])) {
    
    
    $data = array(
        'id' => $_POST['id'],
        'type_name' => $_POST['type_name'],
        'benefits' => $_POST['benefits']
    );
    $MembershipType->edit_action($data);
    header("location:membershiptype.php");
} else{
    $MembershipType->index();
}
