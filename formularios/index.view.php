<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <h1>Login</h1>
    </header>
    <main class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
                <label for="nombre">Name</label>
                <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre" value="<?php if (!$enviado && isset($nombre)) echo $nombre; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php if (!$enviado && isset($email)) echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="mensaje">Menssage</label>
                <textarea name="mensaje" id="mensaje" class="form-control" name="mensaje"><?php if (!$enviado && isset($mensaje)) echo $mensaje; ?></textarea>
            </div>
            <?php if(!empty($errores)): ?>
                <div class="alert error">
                    <?php echo $errores; ?>   
                </div>
            <?php endif ?>
            <?php if($enviado): ?>
                <div class="alert success">
                    <?php echo 'Mensaje enviado correctamente'; ?>   
                </div>
            <?php endif ?>
            
            <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
        </form>
    </main>
    <footer>
        
    </footer>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>