<?php

include "ConexionBD.php";


if ($_POST) {
    
    $codigoproducto=$_POST["codigoproducto"];
    $nombreproducto=$_POST["nombreproducto"];
    $precio=$_POST["precio"];
    $fechaproducto=$_POST["fechaproducto"];
    $idcategoria=$_POST["idcategoria"];
    $cantidad=$_POST["cantidad"];
    $proveedor=$_POST["proveedor"];
    $descripcion=$_POST["descripcion"];
    
    $foto=$_FILES["foto"]["tmp_name"];
    $nombreImagen=$_FILES["foto"]["name"];
    $tipoimagen=strtolower(pathinfo($nombreImagen,PATHINFO_EXTENSION));
    $sizeImagen=$_FILES["foto"]["size"];
    $directorio="FotoProductos/";
    
    if ($tipoimagen=="jpg" or $tipoimagen=="jpeg" or $tipoimagen=="png") {
    
        $registro=$conexion->query("INSERT INTO registro_productos(codigoproducto, nombreproducto, precio_producto, fecha, categoria, cantidad, proveedor, foto, descripcion) VALUES ('$codigoproducto','$nombreproducto', '$precio', '$fechaproducto', '$idcategoria', '$cantidad', '$proveedor', '', '$descripcion')");
    

        $idRegistro=$conexion->insert_id;

        $rutaimg=$directorio.$idRegistro.".".$tipoimagen;
        $agregarImagen=$conexion->query("UPDATE registro_productos set foto='$rutaimg' WHERE id_producto=$idRegistro");

        if (move_uploaded_file($foto,$rutaimg)) {
            echo "<div class='alert alert-info'>Registro de producto exitoso</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al guardar la imagen</div>";
        }
        


    } else {
        echo "<div class='alert alert-info'>No se acepta este formato</div>";
    } ?>
    

    <script>
        history.replaceState(null,null,location.pathname);
    </script>
    

<?php 

header('Access-Control-Allow-Origin: *');

}

    