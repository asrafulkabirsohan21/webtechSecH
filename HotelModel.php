<?php

function getAllHotels($con) {
    $sql = "SELECT * FROM hotel_details";
    $result = $con->query($sql);
    
    $hotels = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $hotels[] = $row;
        }
    }
    
    return $hotels;
}

?>