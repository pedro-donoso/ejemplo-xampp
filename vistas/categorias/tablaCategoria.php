<?php 
    session_start();
    require_once "../../clases/Conexion.php";   
    $idUsuario = $_SESSION["idUsuario"];
    $conexion = new Conectar();   
    $conexion = $conexion->conexion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Tabla de Categorías</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-hover table-dark" id="tablaCategoriaDataTable">
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Fecha</td>
                                <td>Editar</td>
                                <td>Eliminar</td>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        
                        $sql = "SELECT id_categoria, nombre, fechaInsert FROM t_categorias WHERE id_usuario = '$idUsuario'";
                        $result = mysqli_query($conexion, $sql);

                        while($mostrar = mysqli_fetch_array($result)){
                            $idCategoria = $mostrar["id_categoria"];
                    ?>
                        <tr>
                            <td><?php echo $mostrar["nombre"]; ?></td>
                            <td><?php echo $mostrar["fechaInsert"]; ?></td>
                            <td>
                                <span class="btn btn-warning btn-sm">
                                    <i class="fas fa-pen-to-square"></i>
                                </span>
                            </td>
                            <td>
                                <span class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </span>
                            </td>
                        </tr>
                    <?php 
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
