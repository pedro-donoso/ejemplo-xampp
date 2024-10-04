<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$conexionPath = __DIR__ . "/../../clases/Conexion.php";
if (!file_exists($conexionPath)) {
    die("File not found: " . $conexionPath);
}
require_once $conexionPath;

$idCategoria = $_POST["idCategoria"];
$conexion = new Conectar();
$conexion = $conexion->conexion();

$sql = "SELECT id_categoria, nombre FROM t_categorias WHERE id_categoria = '$idCategoria'";
$result = mysqli_query($conexion, $sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$categoria = mysqli_fetch_assoc($result);
echo json_encode($categoria);
?>

