<?php
    include "ConexionBD.php";
    $id=$_GET["id"];
    $sql=$conexion->query("SELECT * FROM registrousuario WHERE ID=$id");
    header('Access-Control-Allow-Origin: *');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
        

        <form class="col-4 p-3 m-auto" method="POST">

            <h5 class="text-center alert alert-info">Modificar Usuario</h5>

            <input type="hidden" name="id" value="<?= $_GET["id"]?>">

            <?php
                
                include "ControladorModificarUsuario.php";

                while($datos=$sql->fetch_object()){ ?>

                    <label for="exampleInputEmail">Ingresa Nombre: </label><br>
                    <input class="form-control" type="text" name="nombre" value="<?=$datos->nombre?>"><br>
             
                    <label for="exampleInputEmail">Ingresar E-mail:</label><br>
                    <input class="form-control" type="email" name="email" value="<?=$datos->email?>"><br>

                    <label for="exampleInputEmail">Ingresar Usuario:</label><br>
                    <input class="form-control" type="text" name="usuario" value="<?=$datos->usuario?>"><br>

                    <label for="exampleInputEmail">Ingresar rol del usuario:</label><br>
                    
                    <select required name="rol" class="form-select">
                        <option selected>Selecciona</option>
                        <option value="1">Administrador</option>
                        <option value="2">Lector</option>
                    </select>

                    <br>

                    <button type="submit" class="btn btn-primary" name="modificaruser" value="ok">Modificar Usuario</button>

            <?php }

        ?>

        </form>
</body>
</html>