<?php

    if (!empty($_POST["registro"])){
        if (empty($_POST["nombre"]) or empty($_POST["email"]) or empty($_POST["usuario"]) or empty($_POST["clave"]) or empty($_POST["rol"])){
            echo "<script>alert('Los campos están vacíos')</script>";
        } else {
            $nombre=$_POST["nombre"];
            $email=$_POST["email"];
            $usuario=$_POST["usuario"];
            $rol=$_POST["rol"];
            $clave=$_POST["clave"];

            $sql=$conexion->query("INSERT INTO registrousuario(nombre, email, usuario, rol, password) VALUES ('$nombre','$email','$usuario','$rol','$clave')");

            if ($sql==1) {
                echo "<script>alert('Usuario registrado correctamente')</script>";
                header("Location: Login.php");
            } else {
                echo "<script>alert('Error al registrar')</script>";
            }
            
        }
        
    }

    header('Access-Control-Allow-Origin: *');

?>