<?php

session_start();

if (isset($_SESSION["usuario"])) {
    include "header.php";
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

            </div>
        </div>
    </div>

    <?php

} else {
    header("location:../index.php");
}
?>