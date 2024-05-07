<?php

class MembershipType extends DB
{
    function getMembershipTypes()
    {
        $query = "SELECT * FROM membership_types";
        return $this->execute($query);
    }

    function getMembershipTypeById($id)
    {
        $query = "SELECT * FROM membership_types WHERE type_id = $id";
        return $this->execute($query);
    }

    function addMembershipType($data)
    {
        $type_name = $data['type_name'];
        $benefits = $data['benefits'];

        $query = "INSERT INTO membership_types (type_name, benefits) VALUES ('$type_name', '$benefits')";
        return $this->execute($query);
    }

    function editMembershipType($data)
    {
        $type_id = $data['id'];
        $type_name = $data['type_name'];
        $benefits = $data['benefits'];

        $query = "UPDATE membership_types SET type_name = '$type_name', benefits = '$benefits' WHERE type_id = $type_id";
        return $this->execute($query);
    }
    
    function deleteMembershipType($id)
    {
        $query = "DELETE FROM membership_types WHERE type_id = $id";
        return $this->execute($query);
    }
}

?>
