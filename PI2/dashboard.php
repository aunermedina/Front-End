<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/style2.css">
    <link rel="stylesheet" href="jquery-ui-custom/jquery-ui.css">
    <link rel="stylesheet" href="jquery-ui-custom/jquery-ui.theme.css">
    <title>Front End</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">Desarrollo en Front End</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="dashboard-empleados.php">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard-clientes.php">Clientes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">

        <div class="row">
            <h2>Dashboard</h2>
            <div class="col-md-12 m-2 p-3 bg-body rounded shadow-sm d-flex">
                <div class="card m-3 bg-success p-2 text-dark bg-opacity-50" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Empleados</h5>
                        <h6 class="card-subtitle mb-2 text-muted" id="numEmpleado">0</h6>
                        <a href="dashboard-empleados.php" class="card-link">Detalles</a>
                        
                    </div>
                </div>
                <div class="card m-3 bg-primary p-2 text-dark bg-opacity-50" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                        <h6 class="card-subtitle mb-2 text-muted" id="numCliente">0</h6>
                        <a href="dashboard-clientes.php" class="card-link">Detalles</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

<script src="jquery-ui-custom/external/jquery/jquery.js"></script>
<script src="jquery-ui-custom/jquery-ui.js"></script>
<script type="text/javascript" src="src/js/script-dashboard.js"></script>

</html>