<?php
session_start();
require_once "../../clases/Conexion.php";

$idCategoria = $_POST['idCategoria'];

$conexion = new Conectar();
$conexion = $conexion->conexion();

try {
    $sql = "DELETE FROM t_categorias WHERE id_categoria = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idCategoria);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        http_response_code(200); // Devuelve un código de respuesta HTTP 200 OK
        echo "Categoría eliminada con éxito";
    } else {
        http_response_code(404); // Devuelve un código de respuesta HTTP 404 Not Found
        echo "No se pudo eliminar la categoría";
    }
} catch (Exception $e) {
    http_response_code(500); // Devuelve un código de respuesta HTTP 500 Internal Server Error
    echo "Error: " . $e->getMessage();
    exit;
}