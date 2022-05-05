<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/registros.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Registro($db);
    $stmt = $items->getRegistros();
    $itemCount = $stmt->rowCount();

    echo json_encode($itemCount);
    if($itemCount > 0){
        
        $registroArr = array();
        $registroArr["data"] = array();
        $registroArr["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "first_name" => $first_name,
                "last_name" => $last_name
                "email" => $email,
                "gender" => $gender,
                "ip_address" => $ip_address,
            );
            array_push($registroArr["data"], $e);
        }
        echo json_encode($registroArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No se encontraron registros.")
        );
    }
?>