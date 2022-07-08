<?php
    require "../utils/autoload.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Blog</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <header>
            <a href="/sesion">Sesión</a>
        </header>
        <br />
        <br />
        <?php
            print_r(UsuarioControlador::ObtenerTodos());
        ?>
    </body>
</html>