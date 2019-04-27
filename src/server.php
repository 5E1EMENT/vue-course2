<?php
header("Access-Control-Allow-Origin: *");
if(!empty($_POST['range'])){
    if($_POST['range']=='all'){
        $db = @new MySQLi('localhost','root','','car');
        if($db->connect_error){
            exit(json_encode([false,$db->connect_error]));
        }
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
    }
}
?>
// Сервер поднимается отдельно от vue cli
