<?php
        require_once './././models/producto.php';
        $producto= new Producto();
        $productos=$producto->listar();
    ?>
<head><title>Listar Productos</title></head>
<div class="contenedor_principal">
    <h2>Lista de Productos<i class="fas fa-list"></i></h2>
   

    <div class="tabla">
        <table>
            <thead>
                <th hidden>Codigo</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Precio</th>
                <th>imagen</th>
                <th>Categoria</th>
                <th>Editar</th>
            </thead>
            <tbody>
                <?php foreach($productos as $colum =>$r):?>
                <tr>
                    
                    <td hidden><?php echo $r->{'idproducto'}; ?></td>
                    <!-- <td><?php echo var_dump($r);?></td> -->
                    <td><?php echo $r->{'Producto'};?></td>
                    <td><?php echo $r->{'Marca'};?></td>
                    <td><?php echo $r->{'precio'}; ?></td>
                    <td><img src="<?php echo $r->{'ruta_imagen'}; ?>" alt="imagen"></td>
                    <td><?php echo $r->{'Categoria'}; ?></td>
                    <td><a href="?c=_aproducto&a=editproducto&verprod=<?php echo $r->{'idproducto'};?>"">Editar</a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>