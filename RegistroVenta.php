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
    <link rel="stylesheet" href="StyleNV.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    
    <title>Registro Venta</title>
</head>
<body>

    <script>

        function mostrardiv(){
            var div = document.getElementById("Producto");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }

    </script>

<!-- Header -->

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

<!-- Fin Header -->

<!-- Barra Lateral -->

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
                <a href="#">
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
            <br><br><br><br><br><br><br><br><br>
            <li>
                <a href="Administrar.php">
                    <i class='fas fa-cog' style='font-size:24px' ; color: 'white';></i>
                    <span>Administrar</span>
                </a>
            </li>

        </ul>

    </div>

        <div class="container_registro">

            <br><h1 style="text-align: center;">Registro Venta</h1><br><br>

             
            <?php
            
                include("ControladorRegistroVenta.php")
            
            ?>

            <form method="post" action="">

                    <label for="">Nombre Cliente:</label><br>
                    <input type="text" placeholder="Ingresa el nombre del cliente" class="nombre-cliente" name="nombrecliente"><br><br>

                    <label for="">Producto:</label>
                    <select name="producto" class="form-select">
                    <option selected>Selecciona Producto</option>
                    <?php

                        include ("ConexionBD.php");
                        $sql=$conexion->query("SELECT * FROM registro_productos");

                        while ($datos=$sql->fetch_object()) { ?>
                            
                            <option value="<?= $datos->id_producto ?>"><?= $datos->nombreproducto?></option>
                            
                            
                    <?php }

                   
                    ?>
                    
                    </select>

                    <label for="" class="label-telefono">Teléfono Cliente:</label>
                    <input type="number" placeholder="Ingresa teléfono cliente" class="telefono-cliente" name="telefonocliente">

                    <label for="" class="label-precio">Precio Unitario:</label><br>
                    <input class="precio-producto" type="number" name="precioventa" min="0" required><br><br>

                    <label for="">Cantidad:</label>
                    <input type="number" class="cantidad-producto" name="cantidad"><br><br>

                    <label for="" class="label-vendedor">Vendedor:</label>
                    <input type="text" class="vendedor" placeholder="Ingresa el nombre del vendedor" name="vendedor">

                    <label for="" class="label-mdp">Medio de Pago:</label>
                    <select name="mediopago" class="form-select" id="form-select2">
                    
                            <option selected>Selecciona medio pago</option>
                            <?php
                            
                                include("ConexionBD.php");
                                $sql=$conexion->query("SELECT * FROM mediopago");

                                while ($datos=$sql->fetch_object()) { ?>
                                    <option value="<?=$datos->id_mp?>"><?=$datos->medio?></option>
                        <?php   }
                            
                            ?>
                    </select>


                <button type="submit" class="vender_prod" name="registrar">Registrar Venta</button>

            </form>
                        


        </div>

</body>
</html>