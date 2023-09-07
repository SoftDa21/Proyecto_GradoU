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
    <link rel="stylesheet" href="StyleAdmin.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    
    <title>Administrar Usuario</title>
</head>
<body>

    <script>

        function eliminar(){
            var respuesta=confirm("¿Estas seguro que deseas eliminar este registro?");
            return respuesta
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
            <br><br><br><br><br><br><br><br><br>
            <li>
                <a href="Administrar.php">
                    <i class='fas fa-cog' style='font-size:24px' ; color: 'white';></i>
                    <span>Administrar</span>
                </a>
            </li>

        </ul>

    </div>

<!-- Fin Barra Lateral -->

<!-- Contenido Página Web -->
<div class="crud_usuario">

    <br>
    <h3 style="text-align: center;"><b>Administrar Usuarios</b></h3><br>


    <div class="col-10 p-6" style="width: 100%;">

        <?php
        
            include "ConexionBD.php";
            include "ControladorEliminarUsuario.php";
        
        ?>

        <table class="table table-striped" id="myTable">

        <br>
            <thead class="bg-body-tertiary">
                <tr>
                   
                <th style="display: none;" scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">E-mail</th>
                <th scope="col">Usuario</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>

                <?php
                
                    
                    $sql=$conexion->query("SELECT registrousuario.ID, registrousuario.nombre, registrousuario.email, registrousuario.usuario, roles.rol FROM registrousuario LEFT JOIN roles ON registrousuario.rol = roles.ID");
                    while($datos=$sql->fetch_object()){ ?>
                        <tr>
                            
                            <td style="display: none;"><?= $datos->ID?></td>
                            <td><?= $datos->nombre?></td>
                            <td><?= $datos->email?></td>
                            <td><?= $datos->usuario?></td>
                            <td><?= $datos->rol?></td>
                            <td>
                                <a href="ModificarUsuario.php?id=<?=$datos->ID?>"  class="btn btn-small btn-warning">
                                    <i class='far fa-edit'></i>
                                </a>
                                <a onclick="return eliminar()" href="Administrar.php?id=<?=$datos->ID?>" class="btn btn-small btn-danger">
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
<!-- Fin Contenido Página Web -->
                    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>

    let table = new DataTable('#myTable');

</script>


</body>

</html>