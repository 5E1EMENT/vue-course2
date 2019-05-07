<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

//echo "this is PHP api".$_GET['msg'];
//$request_body = file_get_contents("php://input");
//$data = json_decode($request_body, true);
//echo $data['msg'];
//echo $_POST['msg'];

echo "MSG FROM POST:".$_POST['msg']."msg from GET".$_GET['author']
?>
