<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . "/../../clases/Conexion.php";

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
        error_log("Error al agregar la categoría: " . $stmtInsertar->error);
        echo 0; 
    }
}

$stmtVerificar->close();
$stmtInsertar->close();

// Mostrar las categorías ordenadas por fecha de inserción
$sqlMostrar = "SELECT id_categoria, nombre, fechaInsert FROM t_categorias WHERE id_usuario = ? ORDER BY fechaInsert DESC";
$stmtMostrar = $conexion->prepare($sqlMostrar);
$stmtMostrar->bind_param("i", $idUsuario);
$stmtMostrar->execute();
$resultMostrar = $stmtMostrar->get_result();

$categorias = [];
while ($row = $resultMostrar->fetch_assoc()) {
    $categorias[] = $row;
}

$stmtMostrar->close();
$conexion->close();

echo json_encode($categorias);
?>

