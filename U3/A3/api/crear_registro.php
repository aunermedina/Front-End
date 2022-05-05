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

    $data = json_decode(file_get_contents("php://input"));

    $item->first_name = $data->first_name;
    $item->last_name = $data->last_name;
    $item->email = $data->email;
    $item->gender = $data->gender;
    $item->ip_address = $data->ip_address;
    
    if($item->createRegistro()){
        echo 'Registro creado satisfactoriamente.';
    } else{
        echo 'Registro no pudo ser creado.';
    }
?>