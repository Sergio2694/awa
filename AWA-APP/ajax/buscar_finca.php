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
		$query=mysqli_query($con, "select * from finca where id_Finca='".$id_producto."'");
		$count=mysqli_num_rows($query);
		if ($count>0){
			if ($delete1=mysqli_query($con,"DELETE FROM finca WHERE id_Finca='".$id_producto."'")){
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
		 $aColumns = array('id_Finca', 'nombre_Finca');//Columnas de busqueda
		 $sTable = "finca";
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
		$sWhere.=" order by id_Finca desc";
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
		$reload = './finca.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);
			?>
			<div class="table-responsive">
			  <table class="table" >
				<tr  class="info">
					<th class='text-center' style="text-align: center;" >Nombre</th>
					<th class='text-center' style="text-align: center;" >Descripción</th>
					<th class='text-center' style="text-align: center;">Cantidad de lotes</th>
					<th class='text-center' style="text-align: center;" >Área neta</th>
					<th class='text-center' style="text-align: center;" >Área bruta</th>
					<th class='text-center' style="text-align: center;" >Teléfono</th>
					<th class='text-center' style="text-align: center;" >Correo Electrónico</th>
					<th class='text-center' style="text-align: center;" >Dueños</th>

				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

						$id=$row['id_Finca'];
						$nombre=$row['nombre_Finca'];
						$descripcion=$row['descripcion_Finca'];
						$lotes=$row['cantidad_Lotes'];
						$neta=$row['area_Neta'];
						$bruta=$row['area_Bruta'];						
						$telef=$row['telefono'];
						$correo=$row['mail'];
						$dueño=$row['dueno'];
			
					?>
					<input type="hidden" value="<?php echo $id;?>" id="id_Finca <?php echo $id;?>">					
					<input type="hidden" value="<?php echo $row['nombre_Finca'];?>" id="nombre<?php echo $id;?>">
					<input type="hidden" value="<?php echo $row['descripcion_Finca'];?>" id="des<?php echo $id;?>">
					<input type="hidden" value="<?php echo $row['cantidad_Lotes'];?>" id="lotes<?php echo $id;?>">
					<input type="hidden" value="<?php echo $row['area_Neta'];?>" id="neta<?php echo $id;?>">
					<input type="hidden" value="<?php echo $row['area_Bruta'];?>" id="bruta<?php echo $id;?>">

					<input type="hidden" value="<?php echo $row['telefono'];?>" id="telef<?php echo $id;?>">
					<input type="hidden" value="<?php echo $row['mail'];?>" id="correo<?php echo $id;?>">
					<input type="hidden" value="<?php echo $row['dueno'];?>" id="dueno<?php echo $id;?>">
					<tr>
						<td style="text-align: center;"><?php echo $nombre; ?></td>
						<td style="text-align: center;"><?php echo $descripcion; ?></td>
						<td style="text-align: center;"><?php echo $lotes;?></td>
						<td style="text-align: center;"><?php echo $neta;?></td>
						<td style="text-align: center;"><?php echo $bruta;?></td>
						<td style="text-align: center;"><?php echo $telef;?></td>
						<td style="text-align: center;"><?php echo $correo;?></td>
						<td style="text-align: center;"><?php echo $dueño;?></td>
						

					<td ><span class="pull-right">
					<a href="#" class='btn btn-default' title='Editar Finca' onclick="obtener_datos('<?php echo $id;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=9><span class="pull-right">
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