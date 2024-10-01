<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./librerias/bootstrap/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Registro de usuario</h1>
        <hr>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">

                <form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()">

                    <label>Nombre personal</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required="">
                    <label>Fecha de nacimiento</label>
                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="">
                    <label>Correo</label>
                    <input type="text" name="correo" id="correo" class="form-control" required="">
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

    <script src="librerias/sweetalert.min.js"></script>

    <script type="text/javascript">
        function agregarUsuarioNuevo() {
            $.ajax({
                method: "POST",
                data: $('#frmRegistro').serialize(),
                url: "procesos/usuario/registro/agregarUsuario.php",
                success:function(respuesta){
                    console.log(respuesta);
                }
            });

            return false;
        }
    </script>

</body>

</html>