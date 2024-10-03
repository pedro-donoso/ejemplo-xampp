<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . "/../../clases/Conexion.php";

$idUsuario = $_SESSION["idUsuario"];
$conexion = new Conectar();
$conexion = $conexion->conexion();

$sql = "SELECT id_categoria, nombre, fechaInsert FROM t_categorias WHERE id_usuario = '$idUsuario'";
$result = mysqli_query($conexion, $sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>

<div class="table-responsive">
    <table class="table table-hover table-dark" id="tablaCategoriaDataTable">
        <thead>
            <tr style="text-align:center">
                <td>Nombre</td>
                <td>Fecha</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tbody>
            <?php while($mostrar = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $mostrar["nombre"]; ?></td>
                <td><?php echo $mostrar["fechaInsert"]; ?></td>
                <td style="text-align: center">
                    <span class="btn btn-warning btn-sm">
                        <i class="fas fa-pen-to-square"></i>
                    </span>
                </td>
                <td style="text-align: center">
                    <span class="btn btn-danger btn-sm" onclick="eliminarCategoria('<?php echo $mostrar['id_categoria']; ?>')">
                        <i class="fas fa-trash"></i>
                    </span>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>




