<?php
session_start();

$user = $_POST['eMail'];
$password = $_POST['palabraClave'];

// $conn = new mysqli("localhost", "root", "", "front-end");

// if (mysqli_connect_errno()) {
//     echo mysqli_connect_error();
// } else {
//     $resultado = mysqli_num_rows($conn->query("SELECT * FROM usuarios WHERE usuario='$user' AND password='$password'"));

//     if ($resultados > 0) {
//         $url = "dashboard.php";
//         header("Location: " . $url);
//         exit;
//         unset($_SESSION['error_credenciales']);
//     } else {
//         header('Location: index.php');
//         $_SESSION['error_credenciales'] = true;
//     }
// }

include_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();

echo $db; 

$sqlQuery = "SELECT * FROM usuarios WHERE usuario='$user' AND password='$password'";
echo $sqlQuery;
// $resultados = $db->query($sqlQuery);

// echo $resultados;

// if ($resultados > 0) {
//     header('Location: dashboard.php');
//     unset($_SESSION['error_credenciales']);
// } else {
//     header('Location: index.php');
//     $_SESSION['error_credenciales'] = true;
// }
