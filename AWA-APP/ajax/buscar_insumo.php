<?php

	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../funciones.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_producto=intval($_GET['id']);
		$query=mysqli_query($con, "select * from insumo where id_Insumo='".$id_producto."'");
		$count=mysqli_num_rows($query);
		if ($count>0){
			if ($delete1=mysqli_query($con,"DELETE FROM insumo WHERE id_Insumo='".$id_producto."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			 
		}
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('id_Insumo', 'nombre_Producto_Inventario');//Columnas de busqueda
		 $sTable = "insumo";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by id_Insumo desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './insumo.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th class='text-center' style="text-align: center;" >Nombre del encargado</th>
					<th class='text-center' style="text-align: center;" >Cantidad</th>
					<th class='text-center' style="text-align: center;" >Fecha de compra</th>
					<th class='text-center' style="text-align: center;" >Identificador del producto en inventario</th>
					<th class='text-right'>Acciones</th>


				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

						$id_Producto=$row['id_Insumo'];
						$nombre_Producto=$row['nombre_Producto_Inventario'];
						$unidad=$row['cantidad'];
						$fecha=$row['fecha_De_Ingreso'];
						$id_inventario=$row['id_Inventario']

						
			
					?>
					<input type="hidden" value="<?php echo $id_Producto;?>" id="id_Producto <?php echo $id_Producto;?>">		
					<input type="hidden" value="<?php echo $row['nombre_Producto_Inventario'];?>" id="nombre<?php echo $id_Producto;?>">
					<input type="hidden" value="<?php echo $row['cantidad'];?>" id="unidades<?php echo $id_Producto;?>">
					<input type="hidden" value="<?php echo $row['fecha_De_Ingreso'];?>" id="fecha<?php echo $id_Producto;?>">
					<input type="hidden" value="<?php echo $row['id_Inventario'];?>" id="inventario<?php echo $id_Producto;?>">


					<tr>
						<td style="text-align: center; width:400px;"><?php echo $nombre_Producto; ?></td>
						<td style="text-align: center; width:200px;"><?php echo $unidad ;?></td>
						<td style="text-align: center; width:400px; "><?php echo $fecha;?></td>
						<td style="text-align: center; width:200px; "><?php echo $id_inventario;?></td>

					<td style="text-align: center; width:100px;"><span class="pull-right">
					<a href="#" class='btn btn-default' title='Borrar inventario' onclick="eliminar('<?php echo $id_Producto; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=9 style="text-align: center;"><span class="pull-center">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>