<head>
    <title>Nueva Compra</title>
</head>
<?php
session_start();
    require_once './././models/producto.php';
    $producto= new Producto();
    $productos=$producto->listar();
?>

<div class="contenedor_principal1">
    <h2>Lista de Productos<i class="fas fa-list"></i></h2>


    <div class="tabla">
        <table class="ventas">
            <thead>
                <th hidden>Codigo</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Agregar</th>
            </thead>
            <tbody>
                <?php foreach($productos as $colum =>$r):?>
                <tr>
                    <td hidden><?php echo $r->{'idproducto'}; ?></td>
                    <td><?php echo $r->{'Producto'};?></td>
                    <td><?php echo $r->{'precio'}; ?></td>


                    <form action="?c=_compras&a=Agregar" method="POST">
                        <td>
                            <input type="number" name="cantidad" id="" min="1" max="100">
                        </td>
                        <td>
                            <input type="hidden" name="txtidproducto" value="<?php echo $r->{'idproducto'}; ?>">
                            <input type="hidden" name="txtnombre" value="<?php echo $r->{'Producto'}; ?>">
                            <input type="hidden" name="txtprecio" value="<?php echo $r->{'precio'}; ?>">

                            <button type="submit">Añadir</button>

                        </td>
                    </form>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>