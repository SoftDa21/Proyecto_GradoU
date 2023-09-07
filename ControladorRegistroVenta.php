<?php

    include("ConexionBD.php");

    if ($_POST) {
                    
        $nombrecliente=$_POST["nombrecliente"];
        $telefonocliente=$_POST["telefonocliente"];
        $producto=$_POST["producto"];
        $cantidad=$_POST["cantidad"];
        $precioventa=$_POST["precioventa"] * $_POST["cantidad"];
        $mediopago=$_POST["mediopago"];
        $vendedor=$_POST["vendedor"];


        $sql = "SELECT nombreproducto, cantidad FROM registro_productos WHERE id_producto = $producto";
        $resultado = mysqli_query($conexion, $sql);
        $cantidaddisponible = mysqli_fetch_assoc($resultado);

        if ($cantidaddisponible['cantidad'] < $cantidad) {
            echo "<script>alert('No hay suficiente stock para la venta del producto')</script>";
        } else {
            
            $nuevacantidad = $cantidaddisponible['cantidad'] - $cantidad;
            $sql = "UPDATE registro_productos SET cantidad = $nuevacantidad WHERE id_producto = $producto";

            $fecha = date('Y-m-d H:i:s');
            $sql = ("INSERT INTO registro_ventas( nombrecliente, telefonocliente, producto, cantidadvendida, precioventa, mediopago, vendedor, fechaventa) VALUES ('$nombrecliente', '$telefonocliente', '$producto', '$cantidad', '$precioventa', $mediopago, '$vendedor', '$fecha')");
            mysqli_query($conexion, $sql);

            echo "<script>alert('Venta registrada correctamente')</script>";

        }
        
}

header('Access-Control-Allow-Origin: *');

?>