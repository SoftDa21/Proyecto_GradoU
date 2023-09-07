<?php

    if (!empty($_POST["modificaruser"])){

        

        if (!empty($_POST["nombre"]) and !empty($_POST["email"]) and !empty($_POST["usuario"]) and !empty($_POST["rol"])){
            
            $id=$_POST["id"];
            $nombre=$_POST["nombre"];
            $email=$_POST["email"];
            $usuario=$_POST["usuario"];
            $rol=$_POST["rol"];

            $sql=$conexion->query("UPDATE registrousuario SET nombre='$nombre', email='$email', usuario='$usuario', rol=$rol WHERE ID=$id");
            
            if ($sql==1) {
                header("Location: Administrar.php");
            } else {
                echo "<div class='alert alert-danger'>Error al modificar</div>";
            }
            
            

        } else {
            echo "<div class='alert alert-warning'>Campos vacíos</div>";
        }
        
    }

    header('Access-Control-Allow-Origin: *');

?>