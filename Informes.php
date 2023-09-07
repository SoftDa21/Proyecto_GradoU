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
    <link rel="stylesheet" href="StyleInformes.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <title>Informes</title>
</head>
<body>

<!-- Header -->

    <header>

    <div class="img_title">

        

    </div>
        
    <div class="user">

        <?php
            echo $_SESSION["nombre"] ."  "."<i class='fas fa-user-alt' style='font-size:22px'; color: 'white';></i>";
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



    <div class="contenido_informes">


    <div class="col-8 p-6" style="width: 100%;">

        <br>
    
        <h2 style="text-align: center"><b>Informes de Ventas</b></h2>
    
        <br>

        <table class="table table-striped" id="myTable">

            
            <thead class="bg-body-tertiary">

                <tr>

                    <th scope="col" style="display: none;">ID Venta</th>
                    <th scope="col">Nombre Cliente</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Valor Venta</th>
                    <th scope="col">Medio Pago</th>
                    <th scope="col">Vendedor</th>
                    <th scope="col">Fecha Venta</th>
                    <th scope="col">Pre-Factura</th>

                </tr>

            </thead>

            <tbody>

                <?php

                    $sql=$conexion->query("SELECT * FROM registro_ventas JOIN mediopago ON registro_ventas.mediopago = mediopago.id_mp 
                    JOIN registro_productos ON registro_ventas.producto = registro_productos.id_producto;");
                
                    while ($datos=$sql->fetch_object()) { ?>
                        
                        <tr>
                            <td style="display: none;"><?= $datos->id_venta?></td>
                            <td><?= $datos->nombrecliente?></td>
                            <td><?= $datos->telefonocliente?></td>
                            <td style="width: 200px;"><?= $datos->nombreproducto?></td>
                            <td style="width: 20px;"><?= $datos->cantidadvendida?></td>
                            <td>$<?= number_format($datos->precioventa)?></td>
                            <td><?= $datos->medio?></td>
                            <td style="width: 140px;"><?= $datos->vendedor?></td>
                            <td><?= $datos->fechaventa?></td>
                            <td style="text-align: center;">

                                <a href="fpdf/PruebaH.php?id=<?=$datos->id_venta?>" target="_blank" class="btn btn-danger" style="height: 35px;">
                                    <i class="far fa-file-pdf"></i>
                                </a>

                            </td>
                        </tr>
                    
            <?php }
                
                ?>

            </tbody>

        </table>

    </div>

    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>

    let table = new DataTable('#myTable');

</script>
</html>