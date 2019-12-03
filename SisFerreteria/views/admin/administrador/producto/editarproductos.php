<?php
  include_once "../com/head.php";    
  ?>
  
  <link rel="stylesheet" href="../../misc/css/estilos-gnpieza.css">
      <title>Edicion de Productos</title>
<?php

  include '../../modelo/producto.php';

  $producto     = new Producto();
  $id       = isset($_GET['idproducto'])?$_GET['idproducto']:null;
  
  $producto    = $producto->Bproducto($id);
  $nombre= '';  
  $marca = '';
  $precio = '';
  $categoria    = '';
  
  if($producto){
    
    $nombre     =$producto[0]['nombre'];
    $marca     =$producto[0]['marca'];
    $precio =$producto[0]['precio'];
    $categoria =$producto[0]['categoria'];

  }
  ?>
  </head>
  
  <body>
        <?php
          include_once "../com/header.php";
  
          include_once "../com/toolbar.php";
        ?>   
          <div class="container-principal">
        <h1><i class="fas fa-calendar-check"></i>Gestión de productos</h1>

        <div class="formulario3">
            <img src="../../misc/img/productos.png" alt="productos">
            <div class="item">
                <h2>Editar producto</h2>
                <form action="../../controlador/producto.php" method="post">
                    <ul>
                        <li><input type="text" name="nombre_producto" placeholder="Nombre de producto" class="textbox" value="<?php echo $nombre; ?>" required></li>
                        <li><input type="text" name="marca" id="" placeholder="Marca" class="textbox" value="<?php echo $marca; ?>" required></li>
                        <li><input type="text" name="precio" id="" placeholder="precio" class="textbox" value="<?php echo $precio; ?>" required></li>
                        <li><input type="text" name="categoria" id="" placeholder="categoria" class="textbox" value="<?php echo $categoria; ?>" required></li>
                        <li class="boton"><input type="submit" name="Editar" value="Editar producto"></li>
                    </ul>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                </form>
            </div>

        </div>
    </div>

    <?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
			<script>
				$(document).ready(function(){
					alert('Realizado exitosamente');
				});
        echo "Actualizado con Exito..";
			</script>
			</div>
	<?php
  		}else if(isset($_GET['error'])){
    ?>
    <script>
				$(document).ready(function(){
					alert('Ha ocurrido un error al crear el producto, por favor intente de nuevo.');
				});
		</script>
			<div class="alert alert-danger">
				Ha ocurrido un error al editar la producto, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
 
    
    <?php
        include_once "../com/footer.php"
    ?>

</body>
</html>