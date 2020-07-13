<?php session_start();

$errores = '';

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (empty($usuario) or empty($usuario) or empty($usuario)) {
        $errores.= 'Existen campos vacios <br />';
    }else {

        
        if (strlen($password)<8 or strlen($password2)<8) {
            $errores.='Tiene menos de 8 caracteres <br />';
        }else {
            if ($password != $password2) {
                $errores.='Las contraseñas no coinciden <br />';
            }
        }
    }

    if (empty($errores)) {
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=forms_login','root', '');
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario=:usuario');
        $statement->execute(array(':usuario'=>$usuario));
        $resultado = $statement->fetch();
        if ($resultado != false) {
            $errores.="El usuario ya existe";
        }

        $password = hash('sha512', $password);
        $password2 = hash('sha512', $password2);


        if (empty($errores)) {
            $statement = $conexion->prepare('INSERT INTO usuarios VALUES(null, :usuario, :password)');
            $statement->execute(array(
                ':usuario'=>$usuario, 
                ':password'=>$password
            ));

            header('Location: login.php');
        }

        
    }

}

require 'view/register.view.php';
?>