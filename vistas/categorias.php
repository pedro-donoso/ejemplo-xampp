<?php

session_start();

if (isset($_SESSION["usuario"])) {
    include "header.php";
    ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Categorías</h1>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaCategorias"></div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tablaCategorias').load('categorias/tablaCategoria.php');
        });
    </script>

<?php 

} else {
    header("location:../index.php");
}

?>


