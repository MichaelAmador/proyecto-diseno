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
        <a href="?c=Index">Ferreteria Castillo</a>
    </header>
    <div class="conteinerlogin">

        <form action="?c=login&a=Ingresar" method="post">
            <div class="formulario">
                <h2>Inicio de Sesión</h2>
                <div class="item usuario">
                    <input type="text" name="usuario" id="" placeholder="Usuario">
                </div>

                <div class="item usuario">
                    <input type="password" name="clave" id="" placeholder="Contraseña">
                </div>

                <div class="botones">
                    <div class="derecha">
                        <button type="submit">Inicia Sesion</button>
                    </div>
                    <div class="izquierda">
                        <span>
                            !No tienes cuenta
                        </span>
                        <a class="boton" href="?c=login&a=registrarse">Registrate</a>
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