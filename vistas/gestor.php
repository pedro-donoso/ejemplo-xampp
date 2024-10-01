<?php include "header.php"; ?>

<div class="jumbotron">
    <h1 class="display-4">Gestor de archivos</h1>
    <div id="tablaGestorArchivos"></div>
</div>

<?php include "footer.php"; ?>

<script src="../librerias/bootstrap/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaGestorArchivos').load('gestor/tablaGestor.php');
    });
</script>