<body>
    <header>
        <nav class="container-nav">
            <div class="Logo">
                <a href="?c=Index"><span>Ferreteria Castillo</span></a>
            </div>
            <div class="mostrarmenu" onclick="MostrarMenu()">
                <span>
                    Menú
                </span>
            </div>
            <ul class="menu-items" id="MenuItem">
                <li>
                    <form action="?c=productos" method="post">
                        <input type="text" name="buscar" id="buscar" placeholder="Encuentra tu producto"><button><i class="fas fa-search"></i></button></form>
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