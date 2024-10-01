<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./librerias/bootstrap/bootstrap.min.css">
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">

            <div class="fadeIn first">
                <img src="./img/php.png"
                    id="icon" alt="User Icon" width="150" height="150"/>
                <h1>Gestor de archivos</h1>
            </div>

            <form>
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="username">
                <input type="password" id="password" class="fadeIn third" name="login" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Entrar">
            </form>

            <div id="formFooter">
                <a class="underlineHover" href="registro.php">Registrar</a>
            </div>

        </div>

    </div>


    <script src="librerias/sweetalert.min.js"></script>

    <script>
        //document.getElementById("loginForm").addEventListener("submit", function(event){
        // event.preventDefault();
        //swal("Good job!", "You clicked the button!", "success");
        // });
    </script>

</body>

</html>