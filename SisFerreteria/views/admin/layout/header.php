<?php
 
    
?>

<header>
        <nav class="container-nav">
            <div class="Logo">
                <a href="?c=_admin"><span>Ferreteria Castillo</span></a>
            </div>
            <div class="mostrarmenu" onclick="MostrarMenu()">
                <span>
                    Menú
                </span>
            </div>
            <ul class="menu-items" id="MenuItem">
                <li><a href="#">Inventario</a>
                    <ul>
                        <li><a href="?c=_inventario&a=listarinventario">Listar</a></li>
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
                        <li><a href="?c=_aproveedor">Nuevo</a></li>
                        <li><a href="?c=_aproveedor&a=Ver">Listar</a></li>
                    </ul>
                </li>
                <li><a href="#">Compras</a>
                    <ul>
                        <li><a href="?c=_compras&a=Index">Nueva</a></li>
                        <li><a href="">Listar</a></li>
                    </ul>
                </li>
                <li><a href="#">Ventas</a>
                    <ul>
                        <li><a href="?c=_ventas&a=Index">Nueva</a></li>
                        <li><a href="">Listar</a></li>
                    </ul>
                </li>
                <li><a href="#"><Span>Usuario</Span><i class="fas fa-user"></i></a>
                    <ul>
                        <li><a href="?c=ausuario&a=nuevousuario">Registrar Nuevo</a></li>
                        <li><a href="#">Listar</a></li>
                        <li><a href="#">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>

        </nav>
    </header>