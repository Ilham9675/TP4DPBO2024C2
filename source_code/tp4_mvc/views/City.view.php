<?php

  class CityView {
    public function render($data){
      $no = 1;
      $dataMember = null;
      foreach($data['City'] as $val){
        list($city_id, $city_name) = $val;
        $dataMember .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $city_name . "</td>";
        
       
        $dataMember .= "
            <td>
                <a href='edit.php?id_edit=" . $city_id .  "&city' class='btn btn-warning' '>Edit</a>
                <a href='city.php?id_hapus=" . $city_id . "' class='btn btn-danger' '>Hapus</a>
            </td>";
        
        $dataMember .= "</tr>";
      }

      
      $head_table = null;
      $head_table .= '<tr>
      <th>ID</th>
      <th>KOTA</th>
      <th>ACTIONS</th>
      </tr>';

      $active_botton = null;
      $active_botton .= '<li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="city.php">City</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="membershiptype.php">Membership</a>
        </li>';

      $add_data = null;
      $add_data .= '<a type="button" class="btn btn-primary nav-link active" href="tambah.php?city">Add New</a>';


      $tpl = new Template("templates/index.html");

      $tpl->replace("DATA_TABEL", $dataMember);
      $tpl->replace("HEAD_TABLE", $head_table);
      $tpl->replace("ACTIVE_BOTTON", $active_botton);
      $tpl->replace("ADD_DATA", $add_data);
      $tpl->write(); 
    }
  }

  class AddCityView {
    public function render(){
      $data = null;
      $data .= '<form method="post" action="city.php">
 
      <br><br><div class="card">
      
      <div class="card-header bg-primary">
      <h1 class="text-white text-center">  Create New City </h1>
      </div><br>
     
      <label> NAME CITY: </label>
      <input type="text" name="city_name" class="form-control" required> <br>
     
      <button class="btn btn-success" type="submit" name="add"> Submit </button><br>
      <a class="btn btn-info" type="cancel" name="cancel" href="city.php"> Cancel </a><br>
        </form>';

      $home = null;
      $home .= '<a class="nav-link active" aria-current="page" href="city.php">City</a>';
      $tpl = new Template("templates/create.html"); 
      $tpl->replace("FORM", $data);
      $tpl->replace("HOME", $home);
      $tpl->write(); 
    }
  }

  class editCityView {
    public function render($data_member){
        $val = $data_member['City'][0];
        list($city_id, $city_name) = $val;
      $data = null;
      $data .= '<form method="post" action="city.php">
 
      <br><br><div class="card">
      
      <div class="card-header bg-warning">
      <h1 class="text-white text-center">  Update Member </h1>
      </div><br>
     
      <input type="hidden" name="city_id" value="'.$city_id.'" class="form-control"> <br>
     
      <label> NAME CITY: </label>
      <input type="text" name="city_name" value="'.$city_name.'" class="form-control"> <br>
     
      
     
      <button class="btn btn-success" type="submit" name="edit"> Submit </button><br>
      <a class="btn btn-info" type="submit" name="cancel" href="city.php"> Cancel </a><br>
     
      </div>
      </form>';
      $home = null;
      $home .= '<a class="nav-link active" aria-current="page" href="city.php">City</a>';
      $tpl = new Template("templates/create.html"); 
      $tpl->replace("FORM", $data);
      $tpl->replace("HOME", $home);
      $tpl->write(); 
    }
  }
?>