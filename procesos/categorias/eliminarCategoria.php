<?php
session_start();
require_once "../../clases/Conexion.php";

$idCategoria = $_POST['idCategoria'];

$conexion = new Conectar();
$conexion = $conexion->conexion();

$sql = "DELETE FROM t_categorias WHERE id_categoria = '$idCategoria'";
if (mysqli_query($conexion, $sql)) {
    echo 1;
} else {
    echo 0;
}
?>
