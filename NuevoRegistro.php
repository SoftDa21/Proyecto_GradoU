<?php

    session_start();
    include ("ConexionBD.php");
    if (empty($_SESSION["nombre"])) {
        header("Location: Login.php");
    }

    header('Access-Control-Allow-Origin: *');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b430d0c62c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleNR.css">
    <title>Nuevo Registro</title>
</head>
<body>

<!-- Header -->

    <header>

    <div class="img_title">

        

    </div>
        
    <div class="user">

        <?php
            echo $_SESSION["nombre"] ."  "."<i class='fa-solid fa-user' style='font-size:22px'; color: 'white';></i>";
        ?>

        <div class="userout">

            <a href="ControladorLogout.php">Salir</a>

        </div>

</div>

    </header>

    <div class="container-menu">
        <br><br>
        <ul class="list-bar">

            <li>

                <a href="Inicio.php">
                <i class="fa-solid fa-house" style='font-size:22px'; color: 'white';></i>
                <span>Inicio</span>
                </a>

            </li>

            <li>
                <a href="NuevoRegistro.php">
                <i class='fas fa-cart-plus' style='font-size:24px' ; color: 'white';></i>
                
                <span>Nuevo Producto</span>
                </a>
            </li>

            <li>
                <a href="RegistroVenta.php">
                <i class='fas fa-shopping-cart' style='font-size:24px' ; color: 'white';></i>
                <span>Registro Venta</span>
                </a>
            </li>

            <li>
                <a href="Inventario.php">
                <i class='fas fa-boxes' style='font-size:24px' ; color: 'white';></i>
                <span>Inventario</span>
                </a>
            </li>

            <li>
                <a href="Catalogo.php">
                <i class='fas fa-shopping-bag' style='font-size:24px' ; color: 'white';></i>
                <span>Catálogo</span>
                </a>
            </li>

            <li>
                <a href="Informes.php">
                <i class='fas fa-file-alt' style='font-size:24px' ; color: 'white';></i>
                <span>Informes</span>
                </a>
            </li>
            <br><br><br><br><br><br><br><br>  
            <li>
                <a href="Administrar.php">
                    <i class='fas fa-cog' style='font-size:24px' ; color: 'white';></i>
                    <span>Administrar</span>
                </a>
            </li>

        </ul>

    </div>

<!-- Formulario Nuevo Registro -->


<div class="form-registro">

    <h1 class="title_form">Nuevo Producto</h1>
    <br>
    <form action="" enctype="multipart/form-data" method="POST" >

        <?php
        
        include("ControladorRegistroProducto.php");
        
        ?>
 
        
        <label for="">Código Producto:</label>
        <input required class="codigo-producto" type="number" name="codigoproducto" id="">

        <label class="nombre-producto_label" for="">Nombre Producto:</label>
        <input required class="nombre-producto" type="text" name="nombreproducto" id=""><br><br>

        <label for="">Precio:</label>
        <input required class="precio-producto" type="number" name="precio" id="">

        <label class="fecha-label" for="">Fecha Ingreso:</label>
        <input required class="fecha-producto" type="date" name="fechaproducto" id=""><br><br>

        <label class="" for="">Categoría:</label>
        <select required name="idcategoria" class="select-cat">

            <option selected>Selecciona</option>
            <option value="1">Computadora</option>
            <option value="2">Celulares</option>
            <option value="3">Dispositivos Electrónicos</option>

        </select>

        <label class="fecha-label" for="">Cantidad:</label>
        <input required class="fecha-producto" type="number" name="cantidad"><br><br>

        <label class="" for="">Proveedor:</label>
        <input required class="precio-producto" type="text" name="proveedor">

        <label class="foto-label" for="">Foto:</label>
        <input required class="foto-input" type="file" name="foto"><br><br>

        <label for="">Descripción:</label>
        <input required class="descrip-input" type="text" name="descripcion">

        <br><br><br><br><br><br>

        <button type="submit" class="btn btn-success" name="agregar">Agregar Producto</button>

    </form>

</div>

</body>
</html>