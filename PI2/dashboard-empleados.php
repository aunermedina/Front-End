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
          <a class="nav-link active" aria-current="page" href="dashboard-empleados">Empleados</a>
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
            <div class="col-md-12 m-2 p-3 bg-body rounded shadow-sm">
                <h5 id="titlePage">Data Table con Empleados</h5>
                <!-- <input type="file" name="file" id="inputFile"> -->
                <button id="agregarRegistro" class="btn btn-primary">Agregar</button>
                <div class="row m-3">
                    <div id="datatable">
                        <div class="row">
                            <div class="col-md-3 me-auto">
                                <div class="input-group" id="datatable_lenght">
                                    <label class="m-2">Mostrar </label>
                                    <select class="form-select" name="mostrar" id="mostrar">
                                        <option selected value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group" id="datatable_filter">
                                    <label for="inputFiltrar" class="m-2">Buscar</label>
                                    <input type='text' class='form-control' onkeyup='filtrar()' id='inputFiltrar'>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table m-2 table-sortable" id="resultados">
                                    <thead>
                                        <tr>
                                            <th scope="col"># </th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Edad</th>
                                            <th scope="col">Departamento</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr id="loading">
                                            <td></td>
                                            <td></td>
                                            <td>Cargando información...</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 me-auto" id="datatable_info">
                            </div>
                            <div class="col-md-6" id="datatable_paginate">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div id="editarModal" class="modal">

        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <br>
            <form id="editarEmpleado" method="put" onsubmit="return false">
                <input type="hidden" name="id" id="idEmpleado">
                <br><label>Nombre: <input type="text" id="inputName" required></label>
                <br><label>Edad: <input type="text" id="inputEdad" required></label>
                <br><label>Email: <input type="email" id="inputEmail" required></label>
                <br><label>Departamento: <input type="text" id="inputDepto" required></label>
                <br><br><button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>

</body>

<script src="jquery-ui-custom/external/jquery/jquery.js"></script>
<script type="text/javascript" src="src/js/script-empleados.js"></script>
<script src="jquery-ui-custom/jquery-ui.js"></script>

</html>