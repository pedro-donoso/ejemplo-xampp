<?php

session_start();

if (isset($_SESSION["usuario"])) {
    include "header.php";
    ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Categorias</h1>

        </div>
    </div>

    <?php
    include "footer.php";
} else {
    header("location:../index.php");
}
?>