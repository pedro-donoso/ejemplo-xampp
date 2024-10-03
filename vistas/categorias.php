<?php
session_start();
if (isset($_SESSION["usuario"])) {
    include "header.php";
    ?>

    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <h1 class="display-4">Categorías</h1>
            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaCategoria">
                        <span class="fa-solid fa-plus"></span> Agregar nueva categoria
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
                        <span aria-hidden="true">×</span>
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

    <script src="../js/categorias.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tablaCategorias').load('../vistas/categorias/tablaCategoria.php');

            $('#btnGuardarCategoria').click(function () {
                agregarCategoria();
            });
        });
    </script>
    <?php
} else {
    header("location:../index.php");
}
?>

