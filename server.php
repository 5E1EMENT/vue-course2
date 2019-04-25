<?php

if(!empty($_POST['range'])){
    if($_POST['range']=='all'){;
        $db = mysqli_connect('localhost', 'root', '', 'car');
        if($db->connect_error){
            exit(json_encode([false,$db->connect_error]));
        }
        $sql = "SELECT `car_id`, `brand`, `model` FROM `cars`";
        //$sql = "SELECT `car_id`, `brand`, `model` FROM `car` WHERE `brand`='Ferrari'";
        $result = mysqli_query($db, $sql);
        if($result){
            // check num_rows
            if($result->num_rows == 0){
                // no row retrieved
                echo json_encode([false,"Sorry, no match found..."]);
            }else{
                while($each_row = $result->fetch_assoc()){
                    $all_rows[] = $each_row;
                }
                echo json_encode([true,$all_rows]);
            }
            $result->free();
        }else{
            // SQL Query Error
            echo json_encode([false,"Sorry,SQL Query Error"]);
        }
        $db->close();
        // free() close()
    }
}
?>