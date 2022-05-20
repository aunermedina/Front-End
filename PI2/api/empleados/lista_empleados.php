<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config/database.php';
    include_once '../../class/empleados.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Empleado($db);
    $stmt = $items->getEmpleados();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){
        
        $employeeArr = array();
        $employeeArr["data"] = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "age" => $age,
                "designation" => $designation,
                "created" => $created
            );
            array_push($employeeArr["data"], $e);
        }
        echo json_encode($employeeArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No se encontraron registros.")
        );
    }
?>