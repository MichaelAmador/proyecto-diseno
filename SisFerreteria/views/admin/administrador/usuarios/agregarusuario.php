<head><title>Nuevo usuario</title></head>
<?php
    require_once './././models/usuario.php';
    $usuario= new usuario();
    $usuarios=$usuario->listartipo();
    echo var_dump($usuarios);
?>
<div class="contenedor_principal">
    <h2>Nuevo usuario<i class="fas fa-user"></i></h2>
    <form action="?c=ausuario&a=Guardar" method="post">
        <div class="formulario">

            <input type="text" name="nombre" id="" placeholder="Nombre">
            <input type="text" name="apellido" id="" placeholder="Apellido">
            <input type="text" name="login" id="" placeholder="Usuario">
            <input type="password" name="clave" id="" placeholder="Contraseña">
            <select name="tipo_usuario" id="">
                <?php foreach($usuarios as $colum): ?>
                  
                <option value="<?php echo $colum->idTipoUsuario?>"><?php echo $colum->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Registrar</button>


        </div>
    </form>

</div>