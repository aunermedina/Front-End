<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../../config/database.php';
    include_once '../../class/registros.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Registro($db);
    
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();;
    
    if($item->deleteRegistro()){
        echo json_encode(array("message" => "Registro eliminado."));
    } else{
        echo json_encode(array("message" =>"Información no pudo ser eliminada."));
    }
?>