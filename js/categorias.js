$(document).ready(function () {
  $("#tablaCategorias").load("../vistas/categorias/tablaCategoria.php");

  $("#btnGuardarCategoria").click(function () {
    agregarCategoria();
  });

  $("#btnActualizaCategoria").click(function () {
    var idCategoria = $("#idCategoria").val();
    var nombreCategoria = $("#categoriaU").val();

    $.ajax({
      type: "POST",
      data: { idCategoria: idCategoria, nombreCategoria: nombreCategoria },
      url: "../procesos/categorias/actualizarCategoria.php",
      success: function (respuesta) {
        respuesta = respuesta.trim();

        if (respuesta == 1) {
          $("#tablaCategorias").load("categorias/tablaCategoria.php");

          swal(":D", "¡Actualizado con exito!", "success");
          $("#btnCerrarUpedateCategoria").click();
        } else {
          swal(":x", "Fallo al actualizar", "error");
        }
      },
    });
  });
});

function agregarCategoria() {
  var nombreCategoria = $("#nombreCategoria").val();
  $("#btnGuardarCategoria").prop("disabled", true);

  $.ajax({
    type: "POST",
    data: { nombreCategoria: nombreCategoria },
    url: "../procesos/categorias/agregarCategoria.php",
    success: function (response) {
      $("#mensaje").html(response); // Insertar el mensaje HTML en el contenedor
      if (response.includes("success")) {
        $("#frmCategorias")[0].reset();
        $("#tablaCategorias").load(
          "../vistas/categorias/tablaCategoria.php",
          function () {
            console.log("Tabla recargada después de agregar");
          }
        );
      }
      $("#btnGuardarCategoria").prop("disabled", false);
    },
  });
}

function eliminarCategoria(idCategoria) {
  if (confirm("¿Estás seguro de que deseas eliminar esta categoría?")) {
    $.ajax({
      type: "POST",
      data: { idCategoria: idCategoria },
      url: "../procesos/categorias/eliminarCategoria.php",
      success: function (response) {
        $("#mensaje").html(response); // Insertar el mensaje HTML en el contenedor
        if (response.includes("success")) {
          $("#tablaCategorias").load(
            "../vistas/categorias/tablaCategoria.php",
            function () {
              console.log("Tabla recargada después de eliminar");
            }
          );
        }
      },
    });
  }
}

function mostrarCategoriaPorConsola(idCategoria, nombreCategoria) {
    $.ajax({
      type: "POST",
      data: { idCategoria: idCategoria },
      url: "../procesos/categorias/obtenerCategoria.php",
      success: function(respuesta) {
        try {
          respuesta = jQuery.parseJSON(respuesta);
          $("#categoriaActual").val(respuesta["nombre"]);
          $("#categoriaNueva").val(""); // Establece el valor de categoriaNueva en un valor predeterminado
          $('#editCategoryModal').modal('show'); // Show the modal
        } catch (e) {
          console.error("Error parsing JSON:", e);
          console.error("Server response:", respuesta);
          $("#mensaje").html(respuesta); // Insertar el mensaje HTML en el contenedor
        }
      },
    });
  }

  $("#btnActualizaCategoria").click(function () {
    var idCategoria = $("#idCategoria").val();
    var categoriaNueva = $("#categoriaNueva").val();
  
    console.log(idCategoria); // Imprime el valor de idCategoria
    console.log(categoriaNueva); // Imprime el valor de categoriaNueva
  
    $.ajax({
      type: "POST",
      data: { idCategoria: idCategoria, categoriaNueva: categoriaNueva },
      url: "../procesos/categorias/actualizarCategoria.php",
      success: function (respuesta) {
        respuesta = respuesta.trim();
  
        if (respuesta == 1) {
          $("#tablaCategorias").load("categorias/tablaCategoria.php");
  
          swal(":D", "¡Actualizado con exito!", "success");
          $("#btnCerrarUpedateCategoria").click();
        } else {
          swal(":x", "Fallo al actualizar", "error");
        }
      },
    });
  });

$("#btnCerrarUpedateCategoria").click(function() {
    $("#editCategoryModal").modal("hide");
});

$("#editCategoryModal .close").click(function() {
    $("#editCategoryModal").modal("hide");
});
