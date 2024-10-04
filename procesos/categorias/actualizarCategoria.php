<?php
require_once __DIR__ . "../../clases/Conexion.php";

$conexion = new Conectar();
$conexion = $conexion->conexion();

if (!$conexion) {
  die("Error en la conexión: " . mysqli_connect_error());
}

$idCategoria = $_POST["idCategoria"];
$categoriaNueva = $_POST["categoriaNueva"];

$query = "UPDATE t_categorias SET nombre = '$categoriaNueva' WHERE id_categoria = '$idCategoria'";

$resultado = mysqli_query($conexion, $query);

if ($resultado) {
  echo "Categoría actualizada con éxito"; // Imprime un mensaje de éxito
} else {
  echo "Error al actualizar la categoría: " . mysqli_error($conexion); // Imprime un mensaje de error
}
?>