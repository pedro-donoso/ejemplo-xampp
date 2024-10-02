<?php

session_start();

require_once "../../clases/Categorias.php";
$Categorias = new Categorias();

$datos = array(
        "idUsuario"=> $_SESSION["idUsuario"],
        "categoria"=> $_POST["categoria"]
);

echo $Categorias->agregarCategoria($datos);

?>