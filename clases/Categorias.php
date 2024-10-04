<?php 

    require_once "Conexion.php";
    class Categorias extends Conectar {

        public function agregarCategoria($datos){
            $conexion = Conectar::conexion();

            $sql = "INSERT INTO t_categorias (id_usuario, nombre) 
                    VALUES (?, ?)";

                    $query = $conexion->prepare($sql);
                    $query->bind_param("is", $datos["idUsuario"], 
                                                    $datos["categoria"]);
                    
                    $respuesta = $query->execute();
                    $query->close();

                    return $respuesta;
        }

        public function obtenerCategoria($idCategoria) {
            $conexion = Conectar::conexion();

            $sql = "SELECT id_categoria, nombre FROM t_categorias WHERE id_categoria = '$idCategoria'";
            $result = mysqli_query($conexion, $sql);

            $categoria = mysqli_fetch_array($result);   

            $datos = array("idCategoria" => $categoria["id_categoria"],"nombreCategoria" => $categoria["nombre"]);
            return $datos;
        }
    }

?>