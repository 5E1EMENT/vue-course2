<?php

if(!empty($_FILES)) {
    if($_FILES[0]['error'] == 0) {
        $url = "./storage/".$_FILES[0]['name'];
        if(move_uploaded_file($_FILES[0]['tmp_name'],$url)) {
            echo true;
        } else {
            echo false;
        }
    } else {
        echo false;
    }
} else {
    echo "no command, no action";
}
?>
