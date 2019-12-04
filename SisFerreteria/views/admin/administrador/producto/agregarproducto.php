<head><title>Nuevo Producto</title></head>
<?php
    require_once './././models/categoria.php';
    $categoria= new Categoria();
    $categorias=$categoria->listar();
?>
<div class="contenedor_principal">
    <h2>Nuevo Producto<i class="fas fa-box"></i></h2>
    <form action="?c=_aproducto&a=Guardar" method="post">
        <div class="formulario">

            <input type="text" name="nombre" id="" placeholder="Nombre">
            <input type="text" name="marca" id="" placeholder="Marca">
            <input type="text" name="precio" id="" placeholder="Precio">
            
            <!-- Image -->

            <input type="File" name="productoimagen" id="productoimagen">
            <!-- fin image -->
            <select name="categoria" id="">
                <?php foreach($categorias as $colum): ?>
                <option value="<?php echo $colum->idcategoria ?>"><?php echo $colum->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Registrar</button>


        </div>
    </form>

</div>