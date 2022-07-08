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
            <?php if(isset($_SESSION['autenticado'])){ ?>
                <form action="/logout" method="post">
                    <input type="submit" value="Cerrar Sesión">
                </form>
                <a href="/cargarPublicacion"><input type="submit" value="Cargar Publicacion"></a>
            <?php ;}
            else { ?>
                <a href="/login"><input type="submit" value="Iniciar Sesión"></a>
            <?php ;} ?>
        </header>
        <br />
        <br />
        <table>
            <?php 
                $filas = PublicacionControlador::ObtenerTodos();
                foreach($filas as $fila){
                    $c = 0;
                    $publicacion = PublicacionControlador::Obtener($fila[$c] -> Id);
                    ?>
                    <tr>
                        <th><?php echo $publicacion -> Cuerpo; ?></th>
                        <th><?php echo $publicacion -> Autor; ?></th>
                        <th><?php echo $publicacion -> FechaHora; ?></th>
                    </tr>
            <?php $c++; } ?>
        </table>
        <?php var_dump($_SESSION); ?>
    </body>
</html>