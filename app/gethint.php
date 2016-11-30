<?php

require './db-config.php';
if (isset($_REQUEST['q'])) {
    $response = "";
    $result = $conn->query("SELECT * FROM `cities` WHERE country_id='" . $_REQUEST['q'] . "'");
//    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
//    echo json_encode($rows);
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
            echo "<option value='". $row['id'] ."'>". $row['city'] ."</option>";
        }
    }
}


// <?php
//                $result = $conn->query("SELECT * FROM `countries`");
//                $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
//                echo json_encode($rows);
//                
?>
