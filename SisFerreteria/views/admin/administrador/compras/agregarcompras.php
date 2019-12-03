<head><title>Nueva compra</title></head>
<?php
    require_once './././models/categoria.php';
    $categoria= new Categoria();
    $categorias=$categoria->listar();
?>
<div class="contenedor_principal">
    <h2>Nueva compra<i class="fas fa-box"></i></h2>
    <form action="?c=_acompra&a=Guardar" method="post">
        <div class="formulario">

            <input type="text" name="fecha" id="">
            <input type="text" name="total" id="">
            <input type="text" name="usuario" id="">
            <input type="text" name="proveedor" id="">
            <button type="submit">Registrar</button>


        </div>
    </form>

</div>