<?php

require_once "Conexion.php";

class Usuario extends Conectar
{
    public function agregarUsuario()
    {
        $conexion = Conectar::conexion();
    }
}

?>