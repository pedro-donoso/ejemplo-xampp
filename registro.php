<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./librerias/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="librerias/jquery-ui-1.14.0/jquery-ui.theme.css">
    <link rel="stylesheet" href="librerias/jquery-ui-1.14.0/jquery-ui.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Registro de usuario</h1>
        <hr>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">

                <form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off" >

                    <label>Nombre personal</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required="">
                    <label>Fecha de nacimiento</label>
                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="">
                    <label>Correo</label>
                    <input type="email" name="email" id="email" class="form-control" required="">
                    <label>Nombre de usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" required="">
                    <label>Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required="">

                    <br>

                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <button class="btn btn-primary">Registrar</button>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="index.php" class="btn btn-success loginForm">Login</a>
                        </div>
                    </div>



                </form>


            </div>
        </div>
    </div>

    <script src="librerias/jquery-3.7.1.min.js"></script>
    <script src="librerias/jquery-ui-1.14.0/jquery-ui.js"></script>
    <script src="librerias/sweetalert.min.js"></script>

    <script type="text/javascript">

    $(function(){
        var fechaA = new Date();

        var yyyy =fechaA.getFullYear();

        $("#fechaNacimiento").datepicker({

            changeMonth: true,
            changeYear: true,
            yearRange: '1900:' + yyyy,
            dateFormat: "yy-mm-dd"
        });
    });

    function agregarUsuarioNuevo() {
        $.ajax({
            method: "POST",
            data: $('#frmRegistro').serialize(),
            url: "procesos/usuario/registro/agregarUsuario.php",
            success: function(respuesta) {
                respuesta = respuesta.trim();
                switch (respuesta) {
                    case '1':
                        $('#frmRegistro')[0].reset();
                        swal(":D", "¡Agregado con éxito!", "success");
                        break;
                    case '2':
                        swal("Este usuario ya existe, por favor escribe otro !!!");
                        break;
                    default:
                        swal(":x", "¡Fallo al agregar!", "error");
                }
            }
        });

        return false;
    }
</script>


</body>

</html>