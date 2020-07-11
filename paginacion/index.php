<?php
try {
    $conexion = new PDO('mysql:host=localhost;dbname=paginacion', 'root', '');
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
    die();
}

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$postPorPagina = 5;
$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;

// SQL_CALC_FOUND_ROWS nos va a permitir usar otra propiedad para contar la cantidad de articulos en el arrays.
// como es: FOUND_ROWS().
$articulos = $conexion->prepare("
        SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $postPorPagina
");

$articulos->execute(); 
$articulos = $articulos->fetchAll();

$total_de_articulos = $conexion->query('SELECT FOUND_ROWS() as total');
$total_de_articulos = $total_de_articulos->fetch()['total'];

//Calcular la cantidad de paginas para la paginacion.
$cantida_pagina = ceil($total_de_articulos / $postPorPagina);

if (!$articulos) {
    header('Location : index.php');
}


require 'index.view.php';
?>