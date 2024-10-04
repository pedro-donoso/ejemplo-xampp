<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conexionPath = __DIR__ . "/../../clases/Conexion.php";
if (!file_exists($conexionPath)) {
    die("File not found: " . $conexionPath);
}
require_once $conexionPath;

$idUsuario = $_SESSION["idUsuario"];
$conexion = new Conectar();
$conexion = $conexion->conexion();

$sql = "SELECT id_categoria, nombre, fechaInsert FROM t_categorias WHERE id_usuario = '$idUsuario' ORDER BY fechaInsert DESC";
$result = mysqli_query($conexion, $sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>



<div class="table-responsive">
  <table class="table table-bordered table-dark" id="tablaCategoria">
    <thead>
      <tr>
        <td>ID</td>
        <td>Nombre</td>
        <td>Fecha</td>
        <td>Eliminar</td>
      </tr>
    </thead>
    <tbody>
      <?php while ($mostrar = mysqli_fetch_array($result)) { ?>
        <tr>
          <td><?php echo $mostrar["id_categoria"]; ?></td>
          <td><?php echo $mostrar["nombre"]; ?></td>
          <td><?php echo $mostrar["fechaInsert"]; ?></td>
          <td style="text-align: center">
            <span class="btn btn-danger btn-sm"
              onclick="eliminarCategoria('<?php echo $mostrar['id_categoria']; ?>')">
              <i class="fas fa-trash"></i>
            </span>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

