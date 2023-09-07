<?php

    if (!empty($_GET["id"])) {
        
        $id=$_GET["id"];

        $sql=$conexion->query("DELETE FROM registrousuario WHERE ID=$id");
        if ($sql==1) {
            echo "<div class='alert alert-danger'>Datos eliminados exitosamente</div>";
        }else {
            echo "<div class='alert alert-danger'>Error al eliminar</div>";
        }

    }
    
    header('Access-Control-Allow-Origin: *');

?>