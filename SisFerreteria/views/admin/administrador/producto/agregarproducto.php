<head><title>Nuevo Producto</title></head>
<?php
    require_once './././models/categoria.php';
    require_once './././models/marca.php';
    $categoria= new Categoria();
    $categorias=$categoria->listar();
    $marca= new Marca();
    $marcas=$marca->listar();
?>
<div class="contenedor_principal">
    <h2>Nuevo Producto<i class="fas fa-box"></i></h2>
    <form action="?c=_aproducto&a=Guardar" method="post" enctype="multipart/form-data">
        <div class="formulario">

            <input type="text" name="nombre" id="" placeholder="Nombre">
            <select name="marca" id="">
                <?php foreach($marcas as $r): ?>
                <option value="<?php echo $r->idmarca ?>"><?php echo $r->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="precio" id="" placeholder="Precio">
            <span>El archivo no debe ser mayor a los 2MB de tamaño</span>
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