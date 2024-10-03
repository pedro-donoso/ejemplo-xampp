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
                        <span class="fa-solid fa-plus"></span> Agregar nueva categoria
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaCategorias"></div>
                </div>
            </div>

            <hr>

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
                        <?php
                        $sql = "SELECT id_categoria, nombre, fechaInsert FROM t_categorias WHERE id_usuario = '$idUsuario'";
                        $result = mysqli_query($conexion, $sql);

                        if (!$result) {
                            die("Error en la consulta: " . mysqli_error($conexion));
                        }

                        while ($mostrar = mysqli_fetch_array($result)) {
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
                        ?>
                    </tbody>
                </table>
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

    <!-- Incluye tus scripts aquí -->
    <script src="../js/categorias.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#btnGuardarCategoria').click(function(){
            agregarCategoria();
        });
    });
    </script>

    <?php
} else {
    header("location:../index.php");
}
?>



