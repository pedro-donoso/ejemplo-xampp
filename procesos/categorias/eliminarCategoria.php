<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "../../clases/Conexion.php";

$idCategoria = $_POST['idCategoria'];
$idUsuario = $_SESSION["idUsuario"];

$conexion = new Conectar();
$conexion = $conexion->conexion();

$sql = "DELETE FROM t_categorias WHERE id_categoria = '$idCategoria'";
if (mysqli_query($conexion, $sql)) {
    // Obtener las categorías actualizadas
    $sqlMostrar = "SELECT id_categoria, nombre, fechaInsert FROM t_categorias WHERE id_usuario = '$idUsuario' ORDER BY fechaInsert DESC";
    $resultMostrar = mysqli_query($conexion, $sqlMostrar);

    if ($resultMostrar) {
        $categorias = [];
        while ($row = mysqli_fetch_assoc($resultMostrar)) {
            $categorias[] = $row;
        }
        echo json_encode($categorias);
    } else {
        echo json_encode([]);
    }
} else {
    echo 0;
}
?>

