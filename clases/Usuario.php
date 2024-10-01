<?php

require_once "Conexion.php";

class Usuario extends Conectar
{
    public function agregarUsuario($datos)
    {
        $conexion = Conectar::conexion();

        $sql = "INSERT INTO t_usuarios (
        nombre, 
        fechaNacimiento, 
        email, 
        usuario, 
        password
        ) VALUES (?, ?, ?, ?, ?)";

        $query = $conexion->prepare($sql);
        $query->bind_param(
            'sssss',
            $datos['nombre'],
            $datos['fechaNacimiento'],
            $datos['email'],
            $datos['usuario'],
            $datos['password']
        );

        $exito = $query->execute();
        $query->close();

        return $exito;
    }
}

?>