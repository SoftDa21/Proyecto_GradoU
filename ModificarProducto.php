<?php

    session_start();
    include ("ConexionBD.php");
    $id_producto=$_GET["id_producto"];
    $sql=$conexion->query("SELECT * FROM registro_productos WHERE id_producto=$id_producto");
    header('Access-Control-Allow-Origin: *');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleNR.css">
    <title>Inicio</title>
</head>
<body>

<!-- Header -->

    <header>
        
    <div class="user">

        <?php
            echo $_SESSION["nombre"] ."  "."<i class='fas fa-user-alt' style='font-size:22px'; color: 'white';></i>";
        ?>

        <div class="userout">

            <a href="ControladorLogout.php">Salir</a>

        </div>

</div>

    </header>

    

<!-- Formulario Nuevo Registro -->


<div class="form-registro">

    <h1 class="title_form">Modificar Producto</h1>
    <br>

    <form action="" enctype="multipart/form-data" method="POST" >

    <input type="hidden" name="id_producto" value="<?= $_GET["id_producto"]?>">

        <?php
        
        include("ControladorModificarProducto.php");
        
        while ($datos=$sql->fetch_object()){ ?>         
 
        <label for="" style="display: none;">Código Producto:</label>
        <input style="display: none;" required class="codigo-producto" type="number" name="codigoproducto" value="<?=$datos->codigoproducto?>">

        <label style="display: none;" class="nombre-producto_label" for="">Nombre Producto:</label>
        <input style="display: none;" required class="nombre-producto" type="text" name="nombreproducto" value="<?=$datos->nombreproducto?>"><br><br>

        <label for="">Precio:</label>
        <input required class="precio-producto" type="number" name="precio" value="<?=$datos->precio_producto?>">

        <label class="fecha-label" for="">Fecha:</label>
        <input required class="fecha-producto" type="date" name="fechaproducto" value="<?=$datos->fechaproducto?>"><br><br>

        <label class="" for="">Categoría:</label>
        <select required name="categoria" class="select-cat">

            <option selected>Selecciona</option>
            <option value="1">Computadora</option>
            <option value="2">Celulares</option>
            <option value="3">Dispositivos Electrónicos</option>

        </select>

        <label class="fecha-label" for="">Cantidad:</label>
        <input required class="fecha-producto" type="number" name="cantidad" value="<?=$datos->cantidad?>"><br><br>

        <label class="" for="">Proveedor:</label>
        <input required class="precio-producto" type="text" name="proveedor" value="<?=$datos->proveedor?>">

        <br><br>

        <label for="">Descripción:</label>
        <input required class="descrip-input" type="text" name="descripcion" value="<?=$datos->descripcion?>">

        <br><br><br><br><br><br>

        <button type="submit" class="btn btn-success" name="agregar">Modificar Producto</button>

    <?php } 
?>    
    </form>

    

</div>

</body>

</html>