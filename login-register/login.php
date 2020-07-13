<?php session_start();


$errores = '';
if (isset($_SESSION['usuario'])) {
    header('Location: contenido.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var(htmlspecialchars(strtolower($_POST['usuario'])), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    try {
        $conexion = new PDO('mysql:host=localhost;dbname=forms_login', 'root', '');

    } catch (PDOException $e) {

        echo "Error: " . $e->getMessage();
    }

    $statement = $conexion->prepare('SELECT usuario,password FROM usuarios WHERE (usuario=:usuario AND password=:password)');
    $statement->execute(array(':usuario'=>$usuario, ':password'=>$password));
    $resultado = $statement->fetch();

    if ($resultado == false) {
       $errores.="Usuario o/y contraseña incorrecto";
    }else {
        $_SESSION['usuario'] = $usuario;
        header('Location: contenido.php');
    }
}



require 'view/login.view.php';
?>