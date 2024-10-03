<?php
session_start();
require_once "../../clases/Conexion.php";
$idUsuario = $_SESSION["idUsuario"];
$conexion = new Conectar();
$conexion = $conexion->conexion();

try {
    $sql = "SELECT id_categoria, nombre, fechaInsert FROM t_categorias WHERE id_usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        throw new Exception("Error en la consulta: " . mysqli_error($conexion));
    }

    while ($mostrar = $result->fetch_assoc()) {
        $idCategoria = $mostrar['id_categoria'];
        ?>
        <tr>
            <td><?php echo $mostrar['nombre']; ?></td>
            <td><?php echo $mostrar['fechaInsert']; ?></td>
            <td style="text-align: center;">
                <span class="btn btn-warning btn-sm">
                    <span class="fa-solid fa-pen-to-square"></span>
                </span>
            </td>
            <td style="text-align: center;">
                <span class="btn btn-danger btn-sm">
                    <span class="fa-solid fa-trash"></span>
                </span>
            </td>
        </tr>
        <?php
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>
