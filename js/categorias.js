function agregarCategoria() {
    var nombreCategoria = $('#nombreCategoria').val();
    $('#btnGuardarCategoria').prop('disabled', true);

    $.ajax({
        type: "POST",
        data: { nombreCategoria: nombreCategoria },
        url: "../procesos/categorias/agregarCategoria.php",
        success: function(response) {
            $('#mensaje').html(response); // Insertar el mensaje HTML en el contenedor
            if (response.includes("success")) {
                $('#frmCategorias')[0].reset();
                $('#tablaCategorias').load('../vistas/categorias/tablaCategoria.php', function() {
                    console.log("Tabla recargada después de agregar");
                });
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
                $('#mensaje').html(response); // Insertar el mensaje HTML en el contenedor
                if (response.includes("success")) {
                    $('#tablaCategorias').load('../vistas/categorias/tablaCategoria.php', function() {
                        console.log("Tabla recargada después de eliminar");
                    });
                }
            }
        });
    }
}

function mostrarCategoriaPorConsola(idCategoria, nombreCategoria) {
    console.log("ID Categoría: " + idCategoria);
    console.log("Nombre Categoría: " + nombreCategoria);
}











