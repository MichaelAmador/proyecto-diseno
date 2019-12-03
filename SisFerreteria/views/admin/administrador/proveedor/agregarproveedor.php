<head><title>Nuevo proveedor</title></head>
<?php
    require_once './././models/categoria.php';
    $categoria= new Categoria();
    $categorias=$categoria->listar();
?>
<div class="contenedor_principal">
    <h2>Nuevo proveedor<i class="fas fa-box"></i></h2>
    <form action="?c=_aproveedor&a=Guardar" method="post">
        <div class="formulario">

            <input type="text" name="nombre" id="">
            <input type="text" name="direccion" id="">
            <input type="text" name="telefono" id="">
            <input type="text" name="web" id="">
            
            <button type="submit">Registrar</button>


        </div>
    </form>

</div>