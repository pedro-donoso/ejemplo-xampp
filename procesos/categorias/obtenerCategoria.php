<?php

require_once "Conexion.php";
require_once "Categorias.php"; // assuming the class is in a separate file

$categoria = new Categorias();

echo "Ingrese el id de la categoría: ";
$idCategoria = readline();

$resultado = $categoria->obtenerCategoria($idCategoria);

if ($resultado) {
    echo "Id Categoria: " . $resultado["idCategoria"] . "\n";
    echo "Nombre Categoria: " . $resultado["nombreCategoria"] . "\n";
} else {
    echo "No se encontró la categoría con id $idCategoria\n";
}

?>