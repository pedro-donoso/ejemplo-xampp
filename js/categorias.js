function agregarCategoria(){
    var categoria = $("#nombreCategoria").val();

    if(categoria == "") {
        swal("Debes agregar una categoria");
        return false;
    } else {
        $.ajax({
            type:"POST",
            data:"categoria=" + categoria,
            url:"../procesos/categorias/agregarCategoria.php",
            success:function(respuesta){
                console.log("Respuesta del servidor: " + respuesta); // Mensaje de depuración
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    $("#nombreCategoria").val("");
                    swal(":D", "Categoría guardada con éxito!", "success");
                } else {
                    swal(":x", "Fallo al guardar la categoría!", "error");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX: " + error); // Mensaje de depuración
                swal(":x", "Error en la solicitud AJAX!", "error");
            }
        });
    }
}

function eliminarCategoria(idCategoria) {
    $.ajax({
        type: "POST",
        url: "eliminar_categoria.php",
        data: {idCategoria: idCategoria},
        success: function(response) {
            // Actualiza la tabla después de la eliminación
            $("#tablaCategoriasDataTable").DataTable().ajax.reload();
            console.log("Categoría eliminada con éxito");
        },
        error: function(xhr, status, error) {
            console.log("Error al eliminar la categoría: " + error);
        }
    });
}


