<head><title>Listar proveedores</title></head>
<div class="contenedor_principal">
    <h2>Lista de proveedores<i class="fas fa-list"></i></h2>

    <?php
        require_once './././models/proveedor.php';
        $proveedor= new Proveedor();
        $proveedors=$proveedor->listar();
    ?>

    <div class="tabla">
        <table>
            <thead>
                <th hidden>Codigo</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Web</th>
                <th>Editar</th>
            </thead>
            <tbody>
            <?php foreach($proveedors as $colum =>$r):?>
                <tr>
                    
                    <td hidden><?php echo $r->{''}; ?></td>
                    <!-- <td><?php echo var_dump($r);?></td> -->
                    <td><?php echo $r->{'nombre'};?></td>
                    <td><?php echo $r->{'direccion'};?></td>
                    <td><?php echo $r->{'telefono'}; ?></td>
                    <td><?php echo $r->{'web'}; ?></td>                    
                    <td><a href="?c=_aproveedor&a=editproveedor&verprov=<?php echo $r->{'idProveedor'};?>"">Editar</a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>