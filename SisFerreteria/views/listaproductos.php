<?php
    include_once './models/producto.php';
    $categoria="";
    $categoria=$_REQUEST['buscar'];
    $producto = new Producto();
    $productos = $producto->Buscar($categoria);

?>
    <div class="container_productos">
    <div class="lista">
        <?php
            if(!$productos){
             echo '<span>No se encontraron datos<span>';
            }else{
            foreach($productos as $colum):
        ?>
        <div class="item_lista">
            <div class="columna1">
                <div class="imagen">
                    <a href="">
                        <img url="<?php echo $colum->imagen; ?>" alt="">
                    </a>
                </div>
            </div>
            <div>
            </div>
            <div class="columna2">
                <div class="nombre">
                    <a href=""><span><?php echo $colum->nombre; ?></span></a>
                </div>
                <div class="descripcion">
                    <span>marca <?php echo $colum->marca; ?> </span>
                    <span>Precio <?php echo $colum->precio; ?></span>
                </div>
                <div class="ver">
                    <a href="" class="boton">
                        Ver Detalles
                    </a>
                </div>
               
            </div>

        </div>

        <?php
            endforeach;
        }
        ?>


    </div>
</div>
