<?php

  class membershiptypeView {
    public function render($data){
      $no = 1;
      $datamembershiptype = null;
      foreach($data['membershiptype'] as $val){
        list($id, $type_name, $benefits) = $val;
        $datamembershiptype .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $type_name . "</td>
                <td>" . $benefits . "</td>";
        
       
        $datamembershiptype .= "
            <td>
                <a href='edit.php?id_edit=" . $id .  "&membershiptype' class='btn btn-warning' '>Edit</a>
                <a href='membershiptype.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
            </td>";
        
        $datamembershiptype .= "</tr>";
      }

      $head_table = null;
      $head_table .= '<tr>
      <th>ID</th>
      <th>Membership</th>
      <th>benefits</th>
      <th>ACTIONS</th>
      </tr>';

      $active_botton = null;
      $active_botton .= '<li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="city.php">City</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="membershiptype.php">membership</a>
    </li>';

      $add_data = null;
      $add_data .= '<a type="button" class="btn btn-primary nav-link active" href="tambah.php?membershiptype">Add New</a>';

      $tpl = new Template("templates/index.html");

      $tpl->replace("DATA_TABEL", $datamembershiptype);
      $tpl->replace("HEAD_TABLE", $head_table);
      $tpl->replace("ACTIVE_BOTTON", $active_botton);
      $tpl->replace("ADD_DATA", $add_data);
      $tpl->write(); 
    }
  }

  class AddmembershiptypeView {
    public function render(){
      $data = null;
      $data .= '<form method="post" action="membershiptype.php">
 
      <br><br><div class="card">
      
      <div class="card-header bg-primary">
      <h1 class="text-white text-center">  Create New Membership </h1>
      </div><br>
     
      <label> Membership: </label>
      <input type="text" name="type_name" class="form-control" required> <br>
     
      <label> Benefits: </label>
      <input type="text" name="benefits" class="form-control" required> <br>
     
     
      <button class="btn btn-success" type="submit" name="add"> Submit </button><br>
      <a class="btn btn-info" type="cancel" name="cancel" href="membershiptype.php"> Cancel </a><br>
        </form>';

      $home = null;
      $home .= '<a class="nav-link active" aria-current="page" href="membershiptype.php">Membership</a>';
      $tpl = new Template("templates/create.html"); 
      $tpl->replace("FORM", $data);
      $tpl->replace("HOME", $home);
      $tpl->write(); 
    }
  }

  class editmembershiptypeView {
    public function render($data_membershiptype){
        $val = $data_membershiptype['membershiptype'][0];
        list($id, $type_name, $benefits) = $val;
      $data = null;
      $data .= '<form method="post" action="membershiptype.php">
 
      <br><br><div class="card">
      
      <div class="card-header bg-warning">
      <h1 class="text-white text-center">  Update membershiptype </h1>
      </div><br>
     
      <input type="hidden" name="id" value="'.$id.'" class="form-control"> <br>
     
      <label> Membership: </label>
      <input type="text" name="type_name" value="'.$type_name.'" class="form-control"> <br>
     
      <label> Benefits: </label>
      <input type="text" name="benefits" value="'.$benefits.'" class="form-control"> <br>
     
     
      <button class="btn btn-success" type="submit" name="edit"> Submit </button><br>
      <a class="btn btn-info" type="submit" name="cancel" href="membershiptype.php"> Cancel </a><br>
     
      </div>
      </form>';
      $home = null;
      $home .= '<a class="nav-link active" aria-current="page" href="membershiptype.php">Membership</a>';
      
      $tpl = new Template("templates/create.html"); 
      
      $tpl->replace("FORM", $data);
      $tpl->replace("HOME", $home);
      $tpl->write(); 
    }
  }
?>