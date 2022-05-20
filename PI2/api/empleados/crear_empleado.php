<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../../config/database.php';
    include_once '../../class/empleados.php';
    
    $database = new Database();
    $db = $database->getConnection();

    $item = new Empleado($db);

    $item->name = isset($_GET['name']) ? $_GET['first_name'] : die();
    $item->email = isset($_GET['email']) ? $_GET['email'] : die();
    $item->age = isset($_GET['age']) ? $_GET['age'] : die();
    $item->designation = isset($_GET['designation']) ? $_GET['designation'] : die();
    $item->created = date('Y-m-d H:i:s');
    
    if($item->createEmpleado()){
        echo json_encode(
            array("message" => "Empleado creado satisfactoriamente."));
    } else{
        echo json_encode(
            array("message" => "Empleado no pudo ser creado."));
    }
?>