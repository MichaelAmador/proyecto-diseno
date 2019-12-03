<?php
        require_once './models/producto.php';
        $categoria="";
        $categoria=$_REQUEST['verprod'];
        $producto = new Producto();
        $productos = $producto->listardetalle($categoria);
        $array=json_decode(json_encode($productos),true);
?>
<div class="conteinerdetalle">
    <div class="item_detalle">
        <div class="columna1">
            <div class="imagen">
                <a href="">
                    <img src="" alt="">
                </a>
            </div>
        </div>
        <div>
        </div>
        <div class="columna2">
            <div class="nombre">
                <span><?php echo $array['0']['Producto']; ?></span>
            </div>
            <div class="descripcion">
                <span>Marca</span>
                <p><?php echo $array['0']['Marca']; ?></p>
                <span>Precio C$</span>
                <p> <?php echo $array['0']['precio']; ?></p>
            </div>
            <div class="ver">
                <a href="?c=productos&a=Index2&verprod=<?php echo $productos->idproducto;?>" class="boton">
                    Agregar
                </a>
            </div>

        </div>

    </div>
</div>