function agregarCategoria() {
    var nombreCategoria = $('#nombreCategoria').val();
    $('#btnGuardarCategoria').prop('disabled', true);

    $.ajax({
        type: "POST",
        data: { nombreCategoria: nombreCategoria },
        url: "../procesos/categorias/agregarCategoria.php",
        success: function(response) {
            if (response == 1) {
                $('#frmCategorias')[0].reset();
                $('#tablaCategorias').load('../vistas/categorias/tablaCategoria.php', function() {
                    console.log("Tabla recargada después de agregar");
                });
                alert("Categoría agregada con éxito");
            } else {
                alert("Error al agregar categoría");
            }
            $('#btnGuardarCategoria').prop('disabled', false);
        }
    });
}

function eliminarCategoria(idCategoria) {
    if (confirm("¿Estás seguro de que deseas eliminar esta categoría?")) {
        $.ajax({
            type: "POST",
            data: { idCategoria: idCategoria },
            url: "../procesos/categorias/eliminarCategoria.php",
            success: function(response) {
                if (response == 1) {
                    $('#tablaCategorias').load('../vistas/categorias/tablaCategoria.php', function() {
                        console.log("Tabla recargada después de eliminar");
                    });
                    alert("Categoría eliminada con éxito");
                } else {
                    alert("Error al eliminar categoría");
                }
            }
        });
    }
}

$(document).ready(function(){
    $('#tablaCategorias').load('../vistas/categorias/tablaCategoria.php', function() {
        console.log("Tabla cargada al iniciar");
    });

    $('#btnGuardarCategoria').click(function(){
        agregarCategoria();
    });
});




