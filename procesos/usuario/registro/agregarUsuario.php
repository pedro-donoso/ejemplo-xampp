<?php

require_once "../../../clases/Usuario.php";

$password = sha1($_POST['password']);
$datos = array(
    "nombre" => $_POST['nombre'], 
    "fechaNacimiento" => $_POST['fechaNacimiento'], 
    "email" => $_POST['email'], 
    "usuario" => $_POST['usuario'], 
    "password" => $password // Usar la contraseña encriptada
);

$usuario = new Usuario();
echo $usuario->agregarUsuario($datos);

?>
