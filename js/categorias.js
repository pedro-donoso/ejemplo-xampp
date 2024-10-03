function agregarCategoria() {
    var nombreCategoria = $('#nombreCategoria').val();

    $.ajax({
        type: "POST",
        data: { nombreCategoria: nombreCategoria },
        url: "../procesos/categorias/agregarCategoria.php",
        success: function(response) {
            if (response == 1) {
                $('#frmCategorias')[0].reset();
                $('#tablaCategorias').load('../vistas/categorias/tablaCategoria.php');
            } else {
                alert("Error al agregar categoría");
            }
        }
    });
}



