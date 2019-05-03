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
		$query=mysqli_query($con, "select * from inventario_mo where id_MO_Inventario='".$id_producto."'");
		$count=mysqli_num_rows($query);
		if ($count>0){
			if ($delete1=mysqli_query($con,"DELETE FROM inventario_mo WHERE id_MO_Inventario='".$id_producto."'")){
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
		 $aColumns = array('id_MO_Inventario', 'labor');//Columnas de busqueda
		 $sTable = "inventario_mo";
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
		$sWhere.=" order by id_MO_Inventario desc";
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
		$reload = './inventario_mano_de_obra.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr class="info">
					<th class='text-center' style="text-align: center;" >Labor</th>
					<th class='text-center' style="text-align: center;" >Tiempo</th>
					<th class='text-center' style="text-align: center;" >Fecha</th>
					<th class='text-center' style="text-align: center;" >Lote</th>
					<th class='text-center' style="text-align: center;" >Costo</th>

					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

						$id=$row['id_MO_Inventario'];
						$labor=$row['labor'];
						$tiempo=$row['cantidad_Horas'];
						$fecha=$row['fecha'];						
						$lote=$row['lote'];
						$costo=$tiempo* 1200;
						
			
					?>
					<input type="hidden" value="<?php echo $id;?>" id="id_MO <?php echo $id;?>">					
					<input type="hidden" value="<?php echo $row['labor'];?>" id="labores<?php echo $id;?>">
		
					<input type="hidden" value="<?php echo number_format($row['tiempo'],2,'.','');?>" id="tiempo<?php echo $id?>">
					<input type="hidden" value="<?php echo $row['fecha'];?>" id="fecha<?php echo $id;?>">
					<input type="hidden" value="<?php echo number_format($row['lote'],2,'.','');?>" id="lote<?php echo $id;?>">
			

					<tr>
						<td style="text-align: center; width: 200px;"><?php echo $labor; ?></td>
					
						<td style="text-align: center; width: 200px;"><?php echo number_format($tiempo,0);?></td>
						<td style="text-align: center; width: 200px;"><?php echo $fecha; ?></td>
						<td style="text-align: center; width: 200px;"><?php echo number_format($lote,0);?></td>
						<td style="text-align: center; width: 200px;"><?php echo "₡";?><span class='pull-center'><?php echo number_format($costo,0);?></td>

						

					<td style="width: 100px;"><span class="pull-right">
					<!-- 
					<a href="#" class='btn btn-default' title='Editar Inventario Mano de Obra' onclick="obtener_datos('<?php echo $id;?>');" data-toggle="modal" data-target="#myModal2I"><i class="glyphicon glyphicon-edit"></i></a>
					--> 
					<a href="#" class='btn btn-default' title='Borrar Inventario Mano de Obra' onclick="eliminar('<?php echo $id; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
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