<?php
session_start();
require_once "../../clases/Conexion.php";

$idUsuario = $_SESSION["idUsuario"];
$nombreCategoria = $_POST['nombreCategoria'];

$conexion = new Conectar();
$conexion = $conexion->conexion();

$sql = "INSERT INTO t_categorias (id_usuario, nombre, fechaInsert) VALUES ('$idUsuario', '$nombreCategoria', NOW())";
echo mysqli_query($conexion, $sql);
?>
