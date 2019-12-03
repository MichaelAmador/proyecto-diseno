<?php
 
    
?>

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
                <li><a href="#">Inventario</a>
                    <ul>
                        <li><a href="">Listar</a></li>
                    </ul>
                </li>
                <li><a href="#">Productos</a>
                    <ul>
                        <li><a href="?c=_aproducto">Nuevo</a></li>
                        <li><a href="?c=_aproducto&a=Ver">Listar</a></li>
                    </ul>
                </li>
                <li><a href="#">Proveedor</a>
                    <ul>
                        <li><a href="">Nuevo</a></li>
                        <li><a href="">Listar</a></li>
                    </ul>
                </li>
                <li><a href="#">Compras</a>
                    <ul>
                        <li><a href="">Nueva</a></li>
                        <li><a href="">Listar</a></li>
                    </ul>
                </li>
                <li><a href="#">Ventas</a>
                    <ul>
                        <li><a href="">Nueva</a></li>
                        <li><a href="">Listar</a></li>
                    </ul>
                </li>
                <li><a href="#"><Span>Ususario</Span><i class="fas fa-user"></i></a>
                    <ul>
                        <li><a href="#">Registrar Nuevo</a></li>
                        <li><a href="#">Listar</a></li>
                        <li><a href="#">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>

        </nav>
    </header>