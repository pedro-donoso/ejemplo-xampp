<?php 

class Conectar {
    public function conexion() {
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $base = "gestor";

        $conexion = mysqli_connect(
            $servidor,
         $usuario,
          $password,
           $base);

        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        $conexion->set_charset("utf8mb4");

        return $conexion;
    }
}