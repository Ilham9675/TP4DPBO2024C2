<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/City.controller.php");

$City = new CityController();
if (isset($_POST['add'])) {
    $data = array(
        'city_name' => $_POST['city_name'],
        
    );
    $City->add_action($data);
    header("location:city.php");
} else if (!empty($_GET['id_hapus'])) {
    
    $id = $_GET['id_hapus'];
    $City->delete($id);
    header("location:city.php");
} else if (isset($_POST['edit'])) {
    
    
    $data = array(
        'city_id' => $_POST['city_id'],
        'city_name' => $_POST['city_name'],
    );
    $City->edit_action($data);
    header("location:city.php");
} else{
    $City->index();
}

?>
