<?php
header("Access-Control-Allow-Origin: *");

if(!empty($_POST['action'])){
    $db = @new MySQLi('localhost','root','','car');
    if($db->connect_error){
        exit(json_encode([false,$db->connect_error]));
    }
    if($_POST['action']=='retrieve_all'){

        $sql = "SELECT `car_id`, `brand`, `model` FROM `cars`";
        $result = $db->query($sql);
        if($result){
            if($result->num_rows==0){
                // no row retrieved
                echo json_encode([false,'no row retrieved']);
            }else{
                while($each_row = $result->fetch_assoc()){
                    $all_rows[] = $each_row;
                }
                echo json_encode([true,$all_rows]);
            }
            $result->free();
        }else{
            // sql query error
            echo json_encode([false,'SQL Query Error']);
        }
        $db->close();
    } else if($_POST['action']=='delete_item') {
        if(!empty($_POST['car_id'])) {
            $_POST['car_id'] = $db->real_escape_string($_POST['car_id']);
            $sql = "DELETE FROM `cars` WHERE `car_id` = '{$_POST['car_id']}'";
            $result = $db->query($sql);
            if($result) {
                echo json_encode([true,'delete successful']);
            } else {
                echo json_encode([false,'delete failure']);
            }
        } else {
            echo json_encode([false,'need car id to delete...']);
        }
        $db->close();
    }
}
?>
