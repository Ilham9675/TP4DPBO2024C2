<?php

  class MemberView {
    public function render($data){
      $no = 1;
      $dataMember = null;
      foreach($data['Member'] as $val){
        list($id, $nama, $email, $phone, $join,$city_name,$type_name,$benefits) = $val;
        $dataMember .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $nama . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $join . "</td>
                <td>" . $city_name . "</td>
                <td>" . $type_name . "</td>";
        
       
        $dataMember .= "
            <td>
                <a href='edit.php?id_edit=" . $id .  "&member' class='btn btn-warning' '>Edit</a>
                <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
            </td>";
        
        $dataMember .= "</tr>";
      }

      $head_table = null;
      $head_table .= '<tr>
      <th>ID</th>
      <th>NAME</th>
      <th>EMAIL</th>
      <th>PHONE</th>
      <th>JOINING DATE</th>
      <th>City</th>
      <th>Membership</th>
      <th>ACTIONS</th>
      </tr>';

      $active_botton = null;
      $active_botton .= '<li class="nav-item">
      <a class="nav-link active" aria-current="page" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="city.php">City</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="membershiptype.php">Membership</a>
    </li>';

      $add_data = null;
      $add_data .= '<a type="button" class="btn btn-primary nav-link active" href="tambah.php?member">Add New</a>';

      $tpl = new Template("templates/index.html");

      $tpl->replace("DATA_TABEL", $dataMember);
      $tpl->replace("HEAD_TABLE", $head_table);
      $tpl->replace("ACTIVE_BOTTON", $active_botton);
      $tpl->replace("ADD_DATA", $add_data);
      $tpl->write(); 
    }
  }

  class AddMemberView {
    public function render($update_data){
      $data = null;
      $data .= '<form method="post" action="index.php">
 
      <br><br><div class="card">
      
      <div class="card-header bg-primary">
      <h1 class="text-white text-center">  Create New Member </h1>
      </div><br>
     
      <label> NAME: </label>
      <input type="text" name="name" class="form-control" required> <br>
     
      <label> EMAIL: </label>
      <input type="text" name="email" class="form-control" required> <br>
     
      <label> PHONE: </label>
      <input type="text" name="phone" class="form-control" required> <br>

      <label> City: </label>
      <select name="id_city" class="form-control" required>
        <option value="">--Pilih--</option>';
      foreach($update_data['City'] as $val){
        list($city_id, $city_name) = $val;
        $data .= '<option value="'.$city_id.'">'.$city_name.'</option>';
      }
      $data .= '</select> <br>

      <label> Membership: </label>
      <select name="id_type" class="form-control" required>
        <option value="">--Pilih--</option>';
      foreach($update_data['membershiptype'] as $val){
        list($id, $type_name, $benefits) = $val;
        $data .= '<option value="'.$id.'">'.$type_name.'</option>';
      }
      $data .= '</select> <br>
      <button class="btn btn-success" type="submit" name="add"> Submit </button><br>
      <a class="btn btn-info" type="cancel" name="cancel" href="index.php"> Cancel </a><br>
        </form>';

      $home = null;
      $home .= '<a class="nav-link active" aria-current="page" href="index.php">Home</a>';
      $tpl = new Template("templates/create.html"); 
      $tpl->replace("FORM", $data);
      $tpl->replace("HOME", $home);
      $tpl->write(); 
    }
  }

  class editMemberView {
    public function render($data_edit,$data_member){
        $val = $data_member['Member'][0];
      list($id, $nama, $email, $phone, $join,$selected_city_id,$selected_membership_id) = $val;
      $data = null;
      $data .= '<form method="post" action="index.php">
 
      <br><br><div class="card">
      
      <div class="card-header bg-warning">
      <h1 class="text-white text-center">  Update Member </h1>
      </div><br>
     
      <input type="hidden" name="id" value="'.$id.'" class="form-control"> <br>
     
      <label> NAME: </label>
      <input type="text" name="name" value="'.$nama.'" class="form-control"> <br>
     
      <label> EMAIL: </label>
      <input type="text" name="email" value="'.$email.'" class="form-control"> <br>
     
      <label> PHONE: </label>
      <input type="text" name="phone" value="'.$phone.'" class="form-control"> <br>
      <label> City: </label>
      <select name="id_city" class="form-control" required>
        <option value="">--Pilih--</option>';
      foreach($data_edit['City'] as $val){
        list($city_id, $city_name) = $val;
        $selected = ($city_id == $selected_city_id) ? 'selected' : '';
        $data .= '<option value="'.$city_id.'" '.$selected.'>'.$city_name.'</option>';
      }
      $data .= '</select> <br>

      <label> Membership: </label>
      <select name="id_type" class="form-control" required>
        <option value="">--Pilih--</option>';
      foreach($data_edit['membershiptype'] as $val){
        list($id, $type_name, $benefits) = $val;
        $selected = ($id == $selected_membership_id) ? 'selected' : '';
        $data .= '<option value="'.$id.'" '.$selected.'>'.$type_name.'</option>';
      }
      $data .= '</select> <br>
      <button class="btn btn-success" type="submit" name="edit"> Submit </button><br>
      <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
     
      </div>
      </form>';
      $home = null;
      $home .= '<a class="nav-link active" aria-current="page" href="index.php">Home</a>';
      
      $tpl = new Template("templates/create.html"); 
      
      $tpl->replace("FORM", $data);
      $tpl->replace("HOME", $home);
      $tpl->write(); 
    }
  }
?>