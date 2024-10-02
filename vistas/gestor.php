<?php 

session_start();
if (isset($_SESSION["usuario"])){
include "header.php"; 
?>

    <div class="container">
      <div class="jumbotron">
        <h1 class="display-4">Gestor de archivos</h1>
        <div id="tablaGestorArchivos"></div>
    </div>  
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tablaGestorArchivos').load('gestor/tablaGestor.php');
        });
    </script>

<?php 

    } else {
        header("location:../index.php");
    }
?>