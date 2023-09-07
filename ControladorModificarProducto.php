<?php

    include("ConexionBD.php");

    if ($_POST) {
        
        $codigoproducto=$_POST["codigoproducto"];
        $nombreproducto=$_POST["nombreproducto"];
        $precio=$_POST["precio"];
        $fechaproducto=$_POST["fechaproducto"];
        $idcategoria=$_POST["categoria"];
        $cantidad=$_POST["cantidad"];
        $proveedor=$_POST["proveedor"];
        $descripcion=$_POST["descripcion"];


        $sql=$conexion->query("UPDATE registro_productos SET codigoproducto='$codigoproducto', nombreproducto='$nombreproducto', precio_producto='$precio', fecha='$fechaproducto',categoria='$idcategoria', cantidad='$cantidad', proveedor='$proveedor', descripcion='$descripcion' WHERE id_producto='$id_producto'");

        if ($sql==1) {
            header("Location: Inventario.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar</div>";
        }

    }

    header('Access-Control-Allow-Origin: *');

?>