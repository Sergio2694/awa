	<?php
		if (isset($title))
		{
	?>
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Café Misión</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Café Misión</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $active_finca;?>"><a href="finca.php"><i class='glyphicon glyphicon-grain'></i> Finca <span class="sr-only">(current)</span></a></li>
        <li class="<?php echo $active_productos;?>"><a href="productos.php"><i class='glyphicon glyphicon-barcode'></i> Consulta de Productos</a></li>

		<li class="<?php echo $active_inventario;?>"><a href="inventario.php"><i class='glyphicon glyphicon-list-alt'></i> Inventario </a></li>
		<li class="<?php echo $active_insumo;?>"><a href="insumo.php"><i  class='glyphicon glyphicon-list-alt'></i> Insumo </a></li>
    <li class="<?php echo $active_MO;?>"><a href="mano_de_obra.php"><i  class='glyphicon glyphicon-wrench'></i> Labores de finca </a></li>
		<li class="<?php echo $active_IMO;?>"><a href="inventario_mano_de_obra.php"><i  class='glyphicon glyphicon-wrench'></i> Registro de labores</a></li>
    <li class="<?php echo $active_usuarios;?>"><a href="usuarios.php"><i  class='glyphicon glyphicon-user'></i> Usuarios</a></li>
    <li class="<?php echo $active_mapas;?>"><a href="asset-info/mapas.php"><i class='glyphicon glyphicon-picture'></i> Mapas</a></li>
       </ul>
      <ul class="nav navbar-nav navbar-right">
    
		<li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php
		}
	?>