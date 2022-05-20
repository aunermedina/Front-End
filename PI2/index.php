<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="Carlos Auner Medina Montejano - 303668622">
    <link href="src/css/style.css" rel="stylesheet">
    <link href="src/css/style2.css" rel="stylesheet">
    <title>Ajax</title>
</head>

<body>
    <?php
    session_start();
    session_unset();
    session_destroy();
    ?>

    <div class="form-signin">

        <h2>PI Aplicación Web con Javascript</h2>
        <br>
        <h3>Inicio de sesión</h3>
        <?php
        if (isset($_SESSION["error_credenciales"])) {
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        Correo electrónico o contraseña incorrectos!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }
        ?>
        <form action="access_point.php" method="POST">
            <div class="form-floating">
                <input type="email" class="form-control" name="eMail" id="eMail" placeholder="ejemplo@dominio.com">
                <label for="eMail">Correo Electrónico</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="palabraClave" id="palabraClave" placeholder="malditosHackers">
                <label for="palabraClave">Contraseña</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Iniciar sesión</button>
        </form>
    </div>
</body>

</html>