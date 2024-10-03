<?php
session_start();
require_once "../../clases/Conexion.php";

$idUsuario = $_SESSION["idUsuario"];
$nombreCategoria = $_POST['nombreCategoria'];

$conexion = new Conectar();
$conexion = $conexion->conexion();

// Verificar si la categoría ya existe
$sqlVerificar = "SELECT * FROM t_categorias WHERE nombre = '$nombreCategoria' AND id_usuario = '$idUsuario'";
$resultVerificar = mysqli_query($conexion, $sqlVerificar);

if (mysqli_num_rows($resultVerificar) > 0) {
    echo 0; // La categoría ya existe
} else {
    $sqlInsertar = "INSERT INTO t_categorias (id_usuario, nombre, fechaInsert) VALUES ('$idUsuario', '$nombreCategoria', NOW())";
    if (mysqli_query($conexion, $sqlInsertar)) {
        echo 1; // Categoría agregada con éxito
    } else {
        echo 0; // Error al agregar la categoría
    }
}
?>

