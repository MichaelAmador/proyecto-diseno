<?php
    require_once './././models/proveedor.php';
       
    if (isset($_SESSION['carrito'])) {
        $carrito = $_SESSION['carrito'];
        $total = 0;
        $i = 0;
    } else {
        $total = 0;
        $carrito = array();
    }

    $iduser=$_SESSION['idusuario'];
    $proveedor= new Proveedor();
    $proveedors=$proveedor->listar();
?>
<div class="contenedor-detalle">
    <div class="formulario">
        <h2>Compras <i class="fas fa-store"></i> </h2>
        <form action="?c=_compras&a=Comprar" method="POST">
            <div class="tabladetalle">
                <table>
                    <thead>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Quitar</th>
                    </thead>
                    <tbody>
                        <?php foreach($carrito as $m): ?>
                        <tr>
                            <td><?php echo $m->idproducto;?></td>
                            <td><?php echo $m->nombre;?></td>
                            <td><?php echo $m->precio;?></td>
                            <td><?php echo $m->cantidad;?></td>
                            <td><?php echo $m->subtotal;?></td>
                            <td>
                                <a class="boton" href="?c=_compras&a=Quitar&i=<?php echo $i; ?>">Quitar</a>
                            </td>
                        </tr>
                        <?php
                    $total += $m->subtotal;
                    $i++
                    ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <div class="entradas">
                <input type="text" name="total" id="" value="<?php echo $total?>">
                <input type="text" name="descuento" id="" placeholder="descuento">
                <input type="date" name="fechacompra" id="" placeholder="Total">
                <select name="proveedor" id="">
                    <?php foreach($proveedors as $colum): ?>
                    <option value="<?php echo $colum->idProveedor ?>"><?php echo $colum->nombre ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" name="idusuario" value="<?php echo $iduser?>">
                <button type="submit" name="guardar">Guardar</button>

            </div>

        </form>

    </div>

</div>