<?php
require_once './././models/inventario.php';
        $inventario= new Inventario();
        $inventarios=$inventario->listar();
    ?>

    <div class="tabla">
        <table>
            <thead>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Cantidad</th>
            </thead>
            <tbody>
            <?php foreach($inventarios as $colum =>$r):?>
                <tr>
                    <td><?php echo $r->{'idInventario'};?></td>
                    <td><?php echo $r->{'nombre'};?></td>
                    <td><?php echo $r->{'cantidad'}; ?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>