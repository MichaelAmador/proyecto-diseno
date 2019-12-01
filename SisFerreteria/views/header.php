<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/estiloheader.css">
    <link rel="stylesheet" href="./assets/css/estilosFooter.css">
    <link rel="stylesheet" href="./assets/css/home.css">
    <link rel="stylesheet" href="./assets/css/all.css">
    <link rel="stylesheet" href="./assets/css/all.min.css">

    <title>Inicio</title>
</head>

<body>

    <header>
    <nav class="container-nav">
            <div class="Logo">
                <a href="#"><span>Ferreteria Castillo</span></a>
            </div>
            <div class="mostrarmenu" onclick="MostrarMenu()">
                <span>
                    Menú
                </span>
            </div>
            <ul class="menu-items" id="MenuItem">
                <li>
                    <form action="index.php" method="post"><input type="text" placeholder="Encuentra tu producto"><button><i
                            class="fas fa-search"></i></button></form>
                </li>
                <li><a href="#">Catalogo</a>
                    <ul>
                        <li><a href="">Ejemplo</a> </li>
                    </ul>
                </li>
                <li><a href="#">Contactenos</a></li>
                <li><a href="#">Compras</a></li>
                <li><a href="#"><Span>Usuario</Span><i class="fas fa-user"></i></a>
                    <ul>
                        <li><a href="#">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>

        </nav>
    </header>