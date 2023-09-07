<?php

    session_start();
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
    <link rel="stylesheet" href="StyleInventario.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <title>Inventario</title>
</head>
<body>


    <script>

        function eliminar(){
            var respuesta=confirm("¿Estas seguro que deseas eliminar este registro?");
            return respuesta
        }

    </script>


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


<!-- Barra Lateral !-->

    <div class="container-menu">

        <br><br>
        <ul class="list-bar">

            <li>

                <a href="Inicio.php">
                <i class='fas fa-home' style='font-size:22px'; color: 'white';></i>
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
                <span>Registrar Venta</span>
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
            <br><br><br><br><br><br><br><br><br>
            <li>
                <a href="Administrar.php">
                    <i class='fas fa-cog' style='font-size:24px' ; color: 'white';></i>
                    <span>Administrar</span>
                </a>
            </li>

        </ul>

    </div>

<!-- Fin de la barra lateral !-->


<!-- Contenido de la página !-->


    <div class="container_inventario">
        
        <br>
        <h2 style="text-align: center;"><b>Inventario</b></h2>
        <br>

        <a style="text-align: justify;" href="NuevoRegistro.php" class="btn btn-success ">Agregar Producto</a>
        <a href="fpdf/PruebaV.php" target="_blank" style="float: right;" class="btn btn-danger" id="btn-pdf">
        <i class="fa-solid fa-file-pdf"></i>
        <span>Generar PDF</span> 
        </a>

        <div class="col-8 p-6" style="width: 100%;">


            <?php
            
                require("ConexionBD.php");
                $sql=$conexion->query("SELECT * FROM registro_productos LEFT JOIN categoria_producto ON registro_productos.categoria = categoria_producto.id");
                require("ControladorEliminarProducto.php");
            
            ?>
        <br>
            <table class="table table-striped" id="myTable">

                <thead class="bg-body-tertiary">
                    <tr align-items="center">
                    
                    <th scope="col" style="display:none">ID</th>
                    <th scope="col">Código Producto</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Fecha Ingreso</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Acciones</th>

                    </tr>
                </thead>

                <tbody>

                    <?php
                    
                        while($datos=$sql->fetch_object()){ ?>

                        <tr>
                        
                        <td style="display: none;"><?= $datos->id_producto?></td>
                        <td width=100><?= $datos->codigoproducto?></td>
                        <td width="440"><?= $datos->descripcion?></td>
                        <td width=20><?= $datos->cantidad?></td>
                        <td><?= $datos->fecha?></td>
                        <td>$<?=number_format($datos->precio_producto)?></td>
                        <td><?= $datos->proveedor?></td>
                        <td>
                                <a href="ModificarProducto.php?id_producto=<?=$datos->id_producto?>"  class="btn btn-small btn-warning">
                                    <i class='far fa-edit'></i>
                                </a>
                                <a onclick="return eliminar()" href="Inventario.php?id_producto=<?=$datos->id_producto?>" class="btn btn-small btn-danger">
                                    <i class='fas fa-trash';></i>
                                </a>
                        </td>

                        </tr>
                    
                <?php } 
                
                ?>
                    

                </tbody>

            </table>


        </div>


    </div>


<!-- Fin del contenido de la página-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>

    let table = new DataTable('#myTable');

</script>

</body>
</html>