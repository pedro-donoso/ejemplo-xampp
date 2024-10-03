<?php 

require_once "../../clases/Categorias.php";
$Categorias = new Categorias();

echo json_encode($Categorias->obtenerCategoria($_POST['idCategoria']));

?>