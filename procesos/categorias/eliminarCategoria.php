<?php
require_once __DIR__ . "../../../clases/Conexion.php";

$idCategoria = filter_input(INPUT_POST, "idCategoria", FILTER_VALIDATE_INT);

if ($idCategoria === false) {
    echo "Error: ID de categoría no válido";
    exit;
}

$conexion = new Conectar();
$conexion = $conexion->conexion();

$stmt = $conexion->prepare("DELETE FROM t_categorias WHERE id_categoria = ?");
$stmt->bind_param("i", $idCategoria);

if (!$stmt->execute()) {
    echo "Error al eliminar la categoría: " . $stmt->error;
} else {
    echo "1";
}
?>