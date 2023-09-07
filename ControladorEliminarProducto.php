<?php

    if (!empty($_GET["id_producto"])) {
        
        $id_producto=$_GET["id_producto"];

        $sql=$conexion->query("DELETE FROM registro_productos WHERE id_producto=$id_producto");
        if ($sql==1) {
            header("Location: Inventario.php");   
        }

    }
    
    

?>