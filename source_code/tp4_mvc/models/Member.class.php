<?php

class Member extends DB
{
    function getMemberJoin(){
        $query = "SELECT m.id, m.name, m.email, m.phone, m.join_date, c.city_name, mt.type_name, mt.benefits
        FROM members m
        LEFT JOIN cities c ON m.city_id = c.city_id
        LEFT JOIN membership_types mt ON m.type_id = mt.type_id";
        return $this->execute($query);
    }


    function getMember()
    {
        $query = "select * from members";
        return $this->execute($query);
    }

    function getMemberById($id)
    {
        $query = "SELECT * FROM members WHERE id = $id";
        return $this->execute($query);
    }


    function addMember($data)
    {
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_city = $data['id_city'];
        $id_type = $data['id_type'];

        $query = "INSERT INTO members (name, email, phone, join_date, city_id, type_id) VALUES ('$nama', '$email', '$phone', '$join_date', $id_city, $id_type)";
        return $this->execute($query);
    }

    
    function editMember($data)
    {
        $id = $data['id'];
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $id_city = $data['id_city'];
        $id_type = $data['id_type'];

        $query = "UPDATE members SET name = '$nama', email = '$email', phone = '$phone', city_id = $id_city, type_id = $id_type WHERE id = $id";
        return $this->execute($query);
    }
    
    function deleMember($id)
    {
        $query = "DELETE from `members` where id=$id";
        return $this->execute($query);
    }
}


?>