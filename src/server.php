<?php
header("Access-Control-Allow-Origin: *");

if(!empty($_POST['action'])){
    $db = @new MySQLi('localhost','root','','car');
    if($db->connect_error){
        exit(json_encode([false,$db->connect_error]));
    }
    if($_POST['action']=='retrieve_all'){

        $sql = "SELECT `car_id`, `brand`, `model`, `engine`, `gear_box` FROM `cars`";
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
    } else if($_POST['action']=='create_item'){
        // sanitizing data first
        //echo json_encode([true,'Пришло']);
        if(!empty($_POST['new_item'])){
            if(!empty($_POST['new_item']['brand'])&&!empty($_POST['new_item']['model'])&&!empty($_POST['new_item']['engine'])&&!empty($_POST['new_item']['gearbox'])){
                // check brand, model, engine and gearbox
                // translate engine and gearbox code...
                $brand = $db->real_escape_string($_POST['new_item']['brand']);
                $model = $db->real_escape_string($_POST['new_item']['model']);
                $engine = $db->real_escape_string($_POST['new_item']['engine']);
                $gearbox = $db->real_escape_string($_POST['new_item']['gearbox']);

                switch($engine){
                    case 1:
                        $engine = "Petrol";
                        break;
                    case 2:
                        $engine = "Diesel";
                        break;
                    case 3:
                        $engine = "Electric";
                        break;
                    case 4:
                        $engine = "Hybrid";
                        break;
                    case 5:
                        $engine = "Hydrigen";
                        break;
                    default:
                        $engine = false;
                }
                if($gearbox ==1){
                    $gearbox = "Automatic";
                }elseif($gearbox ==2){
                    $gearbox = "Manual";
                }else{
                    $gearbox = false;
                }
                if($engine==false||$gearbox == false){
                    echo json_encode([false,'illegal data...']);
                }else{
                    $sql = "INSERT INTO `cars` SET `brand`='{$brand}', `model`='{$model}', `engine`='{$engine}', `gear_box`='{$gearbox}' ";
                    $result = $db->query($sql);
                    if($result){
                        echo json_encode([true,'new row created']);
                    }else{
                        echo json_encode([false,'SQL Error']);
                    }
                }

            }else{
                echo json_encode([false,'insufficient data, cannot create new row...']);
            }
        }else{
            echo json_encode([false,'no data sent, cannot create new row...']);
        }
        $db->close();
    }
}
?>
