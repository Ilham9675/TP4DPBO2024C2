<?php

class City extends DB
{
    function getCities()
    {
        $query = "SELECT * FROM cities";
        return $this->execute($query);
    }

    function getCityById($id)
    {
        $query = "SELECT * FROM cities WHERE city_id = $id";
        return $this->execute($query);
    }

    function addCity($data)
    {
        $city_name = $data['city_name'];

        $query = "INSERT INTO cities (city_name) VALUES ('$city_name')";
        return $this->execute($query);
    }

    function editCity($data)
    {
        $city_id = $data['city_id'];
        $city_name = $data['city_name'];

        $query = "UPDATE cities SET city_name = '$city_name' WHERE city_id = $city_id";
        return $this->execute($query);
    }
    
    function deleteCity($id)
    {
        $query = "DELETE FROM cities WHERE city_id = $id";
        return $this->execute($query);
    }
}

?>
