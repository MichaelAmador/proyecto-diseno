<?php
        require_once './models/producto.php';
        require_once './././models/categoria.php';
        $categoria= new Categoria();
        $categorias=$categoria->listar();
        $idpro="";
        $idpro=$_REQUEST['verprod'];
        $producto = new Producto();
        $productos = $producto->listardetalle($idpro);
        $array=json_decode(json_encode($productos),true);
        echo var_dump($array);
?>
  </head>
      <title>Edicion de Productos</title>
  </head>
  
  <div class="contenedor_principal">
    <h2>Editar Producto<i class="fas fa-box"></i></h2>
    <form action="?c=_aproducto&a=Editar" method="post">
        <div class="formulario">

            <input type="text" name="nombre" id="" value="<?php echo $array['0']['Producto'] ?>">
            <input type="text" name="marca" id="" value="<?php echo $array['0']['Marca'] ?>">
            <input type="text" name="precio" id="" value="<?php echo $array['0']['precio'] ?>">
            <input type="File" name="productoimagen" id="productoimagen" value=">" >
            <select name="categoria" id="" >
                <?php foreach($categorias as $colum): ?>
                <option value="<?php echo $colum->idcategoria ?>"><?php echo $colum->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Registrar</button>
            <input type="hidden" name="idproducto" value="<?php echo $array['0']['idproducto'] ?>">


        </div>
    </form>

</div>