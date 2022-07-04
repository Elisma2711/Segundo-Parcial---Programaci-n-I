<?php
    require "../utils/autoload.php";
?>

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
        <script src="" async defer></script>

        <form action="/register" method="post">
            User: <input type="text" name="usuario"> <br />
            Complete name: <input type="text" name="complete_name"> <br />
            Password: <input type="password" name="password"> <br />
            <input type="submit" name="Registrar">
        </form>
    </body>
</html>