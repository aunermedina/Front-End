<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../class/registro.php';

    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Registro($db);

    $item->first_name = isset($_GET['first_name']) ? $_GET['first_name'] : die();
    $item->last_name = isset($_GET['last_name']) ? $_GET['last_name'] : die();
    $item->email = isset($_GET['email']) ? $_GET['email'] : die();
    $item->gender = isset($_GET['gender']) ? $_GET['gender'] : die();
    $item->ip_address = isset($_GET['ip_address']) ? $_GET['ip_address'] : die();
    
    if($item->createRegistro()){
        echo json_encode(
            array("message" => "Registro creado satisfactoriamente."));
    } else{
        echo json_encode(
            array("message" => "Registro no pudo ser creado."));
    }
?>