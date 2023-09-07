<?php

    session_start();

    if (!empty($_POST["btningreso"])) {
        
        if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
            
            $usuario=$_POST["usuario"];
            $password=$_POST["password"];
            
            $sql=$conexion->query("SELECT * FROM registrousuario WHERE usuario = '$usuario' AND password = '$password'");

            if ($datos=$sql->fetch_object()){

                $_SESSION["id"]=$datos->ID;
                $_SESSION["nombre"]=$datos->nombre;
                $_SESSION["rol"]=$datos->rol;

                if ($_SESSION["rol"] == 1) {
                    header("Location: Inicio.php");
                } else if($_SESSION["rol"] == 2) {
                    header("Location: CatalogoUser.php");
                }
                



            } else {
                echo "<script>alert('Acceso denegado')</script>";
            }
            

        } else {
            echo "<script>alert('Los campos están vacíos')</script>";
        }
        

    }

    header('Access-Control-Allow-Origin: *');

?>