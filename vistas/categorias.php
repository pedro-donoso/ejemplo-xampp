<?php
session_start();

if (isset($_SESSION["usuario"])) {
    include "header.php";
    require_once __DIR__ . "../../clases/Conexion.php"; // Ajuste de la ruta
    $idUsuario = $_SESSION["idUsuario"];
    $conexion = new Conectar();
    $conexion = $conexion->conexion();

    if (!$conexion) {
        die("Error en la conexión: " . mysqli_connect_error());
    }
    ?>
    

    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <h1 class="display-4">Categorías</h1>
            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaCategoria">
                        <span class="fa-solid fa-plus"></span> Agregar nueva categoría
                    </span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaCategorias">
                        <?php include "../vistas/categorias/tablaCategoria.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAgregaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nueva categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmCategorias">
                        <label>Nombre de la categoría</label>
                        <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCategoryLabel">Editar Categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-group">
  <label for="categoriaActual" class="col-form-label">Categoría Actual:</label>
  <input type="text" class="form-control" id="categoriaActual" name="categoriaActual" readonly>
</div>
<div class="form-group">
  <label for="categoriaNueva" class="col-form-label">Nueva Categoría:</label>
  <input type="text" class="form-control" id="categoriaNueva" name="categoriaNueva">
</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarUpedateCategoria">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizaCategoria">Actualizar</button>
      </div>
    </div>
  </div>
</div>

    <script src="../js/categorias.js"></script>

    <?php
} else {
    header("location:../index.php");
    exit; // Add this to ensure the script stops executing
}
?>