

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleLogin.css">
    <title>Login</title>
</head>
<body>


    <div class="form-login">

    <?php

        include "ConexionBD.php";
        include "ControladorLogin.php";

        header('Access-Control-Allow-Origin: *');

    ?>
        <br>
        <h1>OsPixel</h1>

        
        <form method="post" action="Login.php">

            <label for="">Ingresa Usuario</label><br>
            <input class="input-text" type="text" name="usuario" placeholder="Digita Usuario"><br><br>

            <label for="">Ingresa Contraseña</label><br>
            <input class="input-text" type="password" name="password" placeholder="Digita Contraseña"><br><br>

            <button type="submit" class="btn btn-secondary"  name="btningreso" value="Ingresar">Ingresar</button><br><br>
            <p>¿No tiene usuario registrado?   <a style="color:lightsteelblue" href="RegistroPersonal.php" class="boton_registrar">Registrarse</a></p>

        </form>

    </div>

</body>



</html>