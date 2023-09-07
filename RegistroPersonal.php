<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleLogin.css">
    <title>Registro Personal</title>
</head>
<body>


    <div class="registropersonal">

        <br>

        <h1>Registro Personal</h1>
    
        <form action="" method="POST">
        
        <?php
        
            include("ConexionBD.php");
            include("ControladorNuevoRegistro.php");
            header('Access-Control-Allow-Origin: *');
        
        ?>

            <br><br>

            <label for="">Ingresa Nombre: </label><br>
            <input class="input_form" type="text" name="nombre"><br><br>

            <label for="">Ingresar E-mail:</label><br>
            <input class="input_form" type="email" name="email"><br><br>

            <label for="">Ingresar Usuario:</label><br>
            <input class="input_form" type="text" name="usuario"><br><br>

            <label for="">Ingresar Contraseña:</label><br>
            <input class="input_form" type="password" name="clave"><br><br>
            
            <select style="display: none;" required name="rol" class="form-select">
                    <option selected value="1">Selecciona</option>
            </select>
            <button type="submit" class="btn btn-secondary" value="Registrar" name="registro">Registrar</button><br>
            <a href="Login.php" class="boton_salir">Salir</a>

        </form>

    </div>

</body>
</html>