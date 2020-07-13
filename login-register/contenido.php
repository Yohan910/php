<?php session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

require 'view/contenido.view.php';

?>