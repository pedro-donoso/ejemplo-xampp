<?php
session_start();
require_once "../../clases/Conexion.php";

$idUsuario = $_SESSION["idUsuario"];
$nombreCategoria = $_POST['nombreCategoria'];

$conexion = new Conectar();
$conexion = $conexion->conexion();

// Verificar si la categoría ya existe
$sqlVerificar = "SELECT * FROM t_categorias WHERE nombre = ? AND id_usuario = ?";
$stmtVerificar = $conexion->prepare($sqlVerificar);
$stmtVerificar->bind_param("si", $nombreCategoria, $idUsuario);
$stmtVerificar->execute();
$resultVerificar = $stmtVerificar->get_result();

if ($resultVerificar->num_rows > 0) {
    echo 0; // La categoría ya existe
} else {
    $sqlInsertar = "INSERT INTO t_categorias (id_usuario, nombre, fechaInsert) VALUES (?, ?, NOW())";
    $stmtInsertar = $conexion->prepare($sqlInsertar);
    $stmtInsertar->bind_param("is", $idUsuario, $nombreCategoria);
    if ($stmtInsertar->execute()) {
        echo 1; // Categoría agregada con éxito
    } else {
        // Log the error internally
        error_log("Error al agregar la categoría: " . $stmtInsertar->error);
        echo 0; 
    }
}

$stmtVerificar->close();
$stmtInsertar->close();
$conexion->close();
?>

