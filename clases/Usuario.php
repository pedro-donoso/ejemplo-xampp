<?php

require_once "Conexion.php";

class Usuario extends Conectar
{
    public function agregarUsuario($datos)
    {
        $conexion = Conectar::conexion();

        if ($this->buscarUsuarioRepetido($datos['usuario'])) {
            return 2; // Usuario ya existe
        } else {
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
        
            if ($query->execute()) {
                $query->close();
                return 1; // Usuario agregado con éxito
            } else {
                $query->close();
                return 0; // Error al agregar usuario
            }
        }
    }

    public function buscarUsuarioRepetido($usuario)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT usuario FROM t_usuarios WHERE usuario = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('s', $usuario);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            return 1; // Usuario encontrado
        } else {
            return 0; // Usuario no encontrado
        }
    }
}

?>
