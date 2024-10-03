<?php

class Conectar {
    private static $servidor = "localhost";
    private static $usuario = "root";
    private static $password = "";
    private static $base = "gestor";

    public static function conexion() {
        try {
            $conexion = mysqli_connect(
                self::$servidor,
                self::$usuario,
                self::$password,
                self::$base
            );

            if (!$conexion) {
                throw new Exception("Error de conexión: " . mysqli_connect_error());
            }

            $conexion->set_charset("utf8mb4");

            return $conexion;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            exit;
        }
    }
}