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

        <form action="?c=login&a=Registro" method="post">
            <div class="formulario">
                <h2>Registrarse</h2>
                <div class="item usuario">
                    <input type="text" name="nombre" id="" placeholder="Nombre">
                </div>
                <div class="item usuario">
                    <input type="text" name="apellido" id="" placeholder="Apellido">
                </div>
                <div class="item usuario">
                    <input type="text" name="usuario" id="" placeholder="Usuario">
                </div>

                <div class="item usuario">
                    <input type="password" name="pass" id="" placeholder="Contraseña">
                </div>

                <div class="botones">
                    <div class="derecha">
                        <button type="submit">Registrarse</button>
                    </div>

                </div>
            </div>
            <?php
                        if(isset($_GET['success'])){ 
                    
                            echo "<script type=\"text/javascript\">alert(\"usuario registrado\");</script>"; 
                    ?>
                            <div>
                                La cita se ha agregado creado.
                            </div>
                    <?php
                        }else if(isset($_GET['error'])){
                    ?>
                            <div>
                                Ha ocurrido un error al crear la cita, por favor intente de nuevo.
                            </div>
                    <?php
                        }
                    ?>

        </form>


    </div>



    <footer>
        <span>
            Todos Los Derechos Reservados &copy; - 2019
        </span>
    </footer>
</body>

</html>