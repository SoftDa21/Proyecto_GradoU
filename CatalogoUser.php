<?php

    session_start();
    include("ConexionBD.php");
    if (empty($_SESSION["nombre"])) {
        header("Location: Login.php");
    }

    header('Access-Control-Allow-Origin: *');

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b430d0c62c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="StyleCatalogo.css">
    <title>Catalogo</title>
</head>
<body>


<!-- Header !-->

    <header>
            
            <div class="user">

                <?php
                        echo $_SESSION["nombre"] ."  "."<i class='fas fa-user-alt' style='font-size:22px'; color: 'white';></i>";
                ?>

            </div>

            <div class="userout">

                <a href="ControladorLogout.php">Salir</a>

            </div>

    </header>
    
<!--Fin del header!-->


<!-- Contenido Catalogo User !-->

    <div class="contenido_catalogouser">

       <div class="col-8 p-6" style="width: 100%;">

       <table class="table caption-top table-striped" id="myTable">
            
            <caption>Lista de Productos</caption>
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="text-align: center;">Foto</th>
                        <th scope="col" style="text-align: center;">Nombre Producto</th>
                        <th scope="col" style="text-align: center;">Descripción Producto</th>
                        <th scope="col" style="text-align: center;">Precio Producto</th>
                        <th scope="col" style="text-align: center;">Categoria Producto</th>

                    </tr>
                </thead>
                <tbody>

                <?php
                
                    $sql=$conexion->query("SELECT * FROM registro_productos LEFT JOIN categoria_producto ON registro_productos.categoria = categoria_producto.id");
                
                    while ($datos=$sql->fetch_object()){   ?>


                    <tr>
                        <td>
                            <img width="90px" src="<?= $datos->foto?>" alt="">
                        </td>
                        <td><?=$datos->nombreproducto?></td>
                        <td><?=$datos->descripcion?></td>
                        <td>$<?=number_format($datos->precio_producto)?></td>
                        <td><?=$datos->categoria?></td>
                    </tr>

            <?php   }

            ?>

                </tbody>
            </table>
       </div>

    </div>

<!--Fin del Contenido !-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>

    let table = new DataTable('#myTable');

</script>
    
</body>
</html>