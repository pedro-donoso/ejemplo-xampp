<?php

require_once "../../../clases/Usuario.php";

print_r($_POST);

    $datos = array(
                $_POST['nombre'], 
                $_POST['fechaNacimiento'], 
                $_POST['correo'], 
                $_POST['usuario'], 
                $_POST['password']
            );
?>