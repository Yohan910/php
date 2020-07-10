<?php
$errores = '';
$enviado = false;


if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    if (!empty($nombre)) {
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    }else {
        $errores .= 'Por favor ingrese un nombre <br />';
    }

    if (empty($email)) {
        $errores.='Por favor ingrese un email <br />';
    }else {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores .= 'Por favor introdusca un email valido <br />';
        }
    }

    if (!empty($mensaje)) {
        $mensaje = htmlspecialchars($mensaje);
        $mensaje = trim($mensaje);
        $mensaje =stripslashes($mensaje);
    }else {
        $errores.= 'Por favor ingrese el mensaje <br />';
    }

    if (!$errores) {
        $enviar_a = 'tomando123123@gmail.com';
        $asunto = 'Correo enviado desde MiPagina.com';
        $mensaje_preparado = "De: $nombre \n";
        $mensaje_preparado = "Correo: $email \n";
        $mensaje_preparado = "Mensaje: ".$mensaje;

        //main($enviar_a, $asunto, $mensaje_preparado);
        $enviado = true;
    }
}



require 'index.view.php';


?>