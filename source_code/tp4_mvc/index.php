<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");

$Member = new MemberController();

if (isset($_POST['add'])) {
    $data = array(
        'nama' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'join_date' => date('Y-m-d'),
        'id_city' => $_POST['id_city'],
        'id_type' => $_POST['id_type']
    );
    $Member->add_action($data);
    header("location:index.php");
} else if (!empty($_GET['id_hapus'])) {
    
    $id = $_GET['id_hapus'];
    $Member->delete($id);
    header("location:index.php");
} else if (isset($_POST['edit'])) {
    
    
    $data = array(
        'id' => $_POST['id'],
        'nama' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'id_city' => $_POST['id_city'],
        'id_type' => $_POST['id_type']
    );
    $Member->edit_action($data);
    header("location:index.php");
} else{
    $Member->index();
}
