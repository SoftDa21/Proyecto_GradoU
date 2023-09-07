<?php

    session_start();

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
    <link rel="stylesheet" href="StyleInicio.css">
    <title>Inicio</title>
</head>
<body>

<!-- Header -->

    <header>
        
                <div class="user">

                    <?php
                        echo $_SESSION["nombre"] ."  "."<i class='fa-solid fa-user' style='font-size:22px'; color: 'white';></i>";
                    ?>

                </div>

                <div class="userout">

                    <a href="ControladorLogout.php">Salir</a>

                </div>

    </header>

<!-- Fin Header -->

<!-- Barra Lateral -->



<!-- Fin Barra Lateral -->

<!-- Contenido Página Web -->

    <div class="container_inicio">

    <br><br>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card">
            <img src="ImagenPagina/RegistroProducto.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="fw-bold">Registro Nuevo Producto</h5><br>
                <p class="card-text">Módulo de registro de producto.</p><br>
                <a href="NuevoRegistro.php" class="btn btn-primary">Registro Producto</a>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <img src="ImagenPagina/RegistroVenta.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="fw-bold">Registro Venta Producto</h5><br>
                <p class="card-text">Módulo de registro venta de producto.</p><br>
                <a href="RegistroVenta.php" class="btn btn-primary">Registro Venta</a>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <img src="ImagenPagina/Registro.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="fw-bold">Inventario</h5><br>
                <p class="card-text">Inventario de productos registrados.</p><br>
                <a href="Inventario.php" class="btn btn-primary">Inventario</a>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <img src="ImagenPagina/Inventario.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="fw-bold">Administrar Usuarios</h5><br>
                <p class="card-text">Administrar usuarios registrados.</p><br>
                <a href="Administrar.php" class="btn btn-primary">Administrar Usuarios</a>
            </div>
            </div>
        </div>
    </div>

<!-- Fin Contenido Página Web -->

</body>

</html>