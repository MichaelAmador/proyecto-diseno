<head><title>Nuevo usuario</title></head>
<?php
    require_once './././models/categoria.php';
    $categoria= new Categoria();
    $categorias=$categoria->listar();
?>
<div class="contenedor_principal">
    <h2>Nuevo usuario<i class="fas fa-box"></i></h2>
    <form action="?c=_ausuario&a=Guardar" method="post">
        <div class="formulario">

            <input type="text" name="nombre" id="">
            <input type="text" name="apellido" id="">
            <input type="text" name="login" id="">
            <input type="text" name="clave" id="">>
            <select name="tipo_usuario" id="">
                <?php foreach($tipo_usuario as $colum): ?>
                <option value="<?php echo $colum->idtipo_usuario ?>"><?php echo $colum->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Registrar</button>


        </div>
    </form>

</div>