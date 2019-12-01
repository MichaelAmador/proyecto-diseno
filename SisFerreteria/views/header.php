<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/estilosheader.css">
    <link rel="stylesheet" href="./assets/css/estilosFooter.css">
    <link rel="stylesheet" href="./assets/css/home.css">
    <link rel="stylesheet" href="./assets/css/all.css">
    <link rel="stylesheet" href="./assets/css/all.min.css">

    <title>Inicio</title>
</head>

<body>

    <header>
        <nav class="container-nav">
            <div class="logo">
                <span><a href="home.php"> Ferretería Castillo </a></span>
            </div>
            <div class="menu">
                <div class="mostrarmenu">
                    <span onclick="MostrarMenu()">Menu</span>
                </div>
                <ul id="Menuid" class="mimenu">
                    <li><input type="text" placeholder="Encuentra el Producto ideal"><i class="fas fa-search"></i></li>
                    <li><a href="">Catalogo</a>
                        <ul>
                            <a href="gncitas.php">
                                <li>Gestionar Nueva Cita</li>
                            </a>
                            <a href="gnreparacion.php">
                                <li>Gestionar Nueva Reparación</li>
                            </a>
                        </ul>
                    </li>
                    <li><a href="gnpieza.php">Contactenos</a></li>
                    <li><a href="#">Compras</a></li>
                    <li><a href="#"><span class="usuario">Michael Amador</span> <i class="fas fa-user"></i></a>
                        <ul>
                            <a href="index.php">
                                <li>Cerrar Sesión</li>
                            </a>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>