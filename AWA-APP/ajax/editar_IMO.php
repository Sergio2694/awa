<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
		}else if (empty($_POST['mod_labores'])) {
           $errors[] = "nombre vacíos";
		} else if (empty($_POST['mod_tiempo'])){
			$errors[] = "Neta vacío";
		} else if (empty($_POST['mod_fecha'])){
			$errors[] = "Bruta vacío";
		} else if (empty($_POST['mod_lote'])){
			$errors[] = "Telefono vacío";
		} else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_labores']) &&
			!empty($_POST['mod_tiempo']) &&
			!empty($_POST['mod_fecha']) &&
			!empty($_POST['mod_lote']) &&
		
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		//$id=intval($_POST['mod_id']);

		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_labores"],ENT_QUOTES)));

		$tiempo=intval($_POST['mod_tiempo']);
		$fecha=mysqli_real_escape_string($con,(strip_tags($_POST["mod_fecha"],ENT_QUOTES)));
		$lote=intval($_POST['mod_lote']);

			


		$id_producto=$_POST['mod_id'];
		$sql="UPDATE inventario_mo SET labor='".$nombre."',
		cantidad_Horas='".$tiempo."', fecha='".$fecha."', lote='".$lote."', costo_MO='".($tiempo*1200)."'
		 WHERE id_MO_Inventario='".$id_producto."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Finca ha sido actualizado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>