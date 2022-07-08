<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="/cargarPublicacion" method="post">
            Ingrese su publicación: <input type="text" name="cuerpo">
            <?php $_SESSION['nombreUsuario']; ?>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>