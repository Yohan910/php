<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="contenedor">
        <h1 class="titulo">Login</h1>
        <hr class="border">


        <form action="" method="post" class="formulario" name="login">
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario">
            </div>

            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password_btn" placeholder="Contraseña">
                <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
            </div>
            <div>
                <ul>
                    <?php if(!empty($errores)):?>
                        <?php echo "<li style='color:red'>$errores</li>"; ?>
                    <?php endif ?>
                </ul>
            </div>
        </form>
        <p class="texto-registrate">
            ¿Aun no tienes cuenta?
            <a href="register.php">Registrate</a>
        </p>
    </div>
    <script src="https://use.fontawesome.com/f6c6553cef.js"></script>
</body>
</html>