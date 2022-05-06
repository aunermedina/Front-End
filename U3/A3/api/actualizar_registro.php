<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../class/registros.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Registro($db);
    
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();;
    
    $item->first_name = isset($_GET['first_name']) ? $_GET['first_name'] : die();
    $item->last_name = isset($_GET['last_name']) ? $_GET['last_name'] : die();
    $item->email = isset($_GET['email']) ? $_GET['email'] : die();
    $item->gender = isset($_GET['gender']) ? $_GET['gender'] : die();
    $item->ip_address = isset($_GET['ip_address']) ? $_GET['ip_address'] : die();
    
    if($item->updateRegistro()){
        echo json_encode(array("message" => "Información del registro actualizada."));
    } else{
        echo json_encode(array("message" => "Información no pudo ser actualizada."));
    }
?>