<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        session_unset();
        session_destroy();
        header('Location:?c=_alogin&a=loginadmin');
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="././assets/css/login.css">
    <title>Login</title>

</head>

<body>
    <header>
        <a href="#">Ferreteria Castillo</a>
    </header>
    <div class="conteinerlogin">

        <form action="?c=_alogin&a=Login" method="post">
            <div class="formulario">
                <h2>Inicio de Sesión</h2>
                <div class="item usuario">
                    <input type="text" name="user" id="" placeholder="Usuario">
                </div>

                <div class="item usuario">
                    <input type="password" name="pass" id="" placeholder="Contraseña">
                </div>

                <div class="botones">
                    <div class="derecha">
                        <button type="submit">Inicia Sesion</button>
                    </div>

                </div>
            </div>


        </form>


    </div>



    <footer>
        <span>
            Todos Los Derechos Reservados &copy; - 2019
        </span>
    </footer>
</body>

</html>