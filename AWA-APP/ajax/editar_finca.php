<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
		}else if (empty($_POST['mod_nombre'])) {
           $errors[] = "nombre vacíos";
        }else if (empty($_POST['mod_descripcion'])) {
           $errors[] = "Descripcion vacío";
        } else if (empty($_POST['mod_lote'])){
			$errors[] = "Lote vacío";
		} else if (empty($_POST['mod_neta'])){
			$errors[] = "Neta vacío";
		} else if (empty($_POST['mod_bruta'])){
			$errors[] = "Bruta vacío";
		} else if (empty($_POST['mod_tel'])){
			$errors[] = "Telefono vacío";
		} else if (empty($_POST['mod_correo'])){
			$errors[] = "correo vacía";
		} else if (empty($_POST['mod_dueno'])){
			$errors[] = "dueño vacío";
		} else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_nombre']) &&
			!empty($_POST['mod_descripcion']) &&
			!empty($_POST['mod_lote']) &&
			!empty($_POST['mod_neta']) &&
			!empty($_POST['mod_bruta']) &&
			!empty($_POST['mod_tel']) &&
			!empty($_POST['mod_correo']) &&
			!empty($_POST['mod_dueno'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		//$id=intval($_POST['mod_id']);

		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre"],ENT_QUOTES)));
		$descripcion=mysqli_real_escape_string($con,(strip_tags($_POST["mod_descripcion"],ENT_QUOTES)));
		$lote=mysqli_real_escape_string($con,(strip_tags($_POST["mod_lote"],ENT_QUOTES)));
		$neta= mysqli_real_escape_string($con,(strip_tags($_POST["mod_neta"],ENT_QUOTES)));
		$bruta=mysqli_real_escape_string($con,(strip_tags($_POST["mod_bruta"],ENT_QUOTES)));
		$telef=mysqli_real_escape_string($con,(strip_tags($_POST["mod_tel"],ENT_QUOTES)));
		$correo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_correo"],ENT_QUOTES)));
		$dueno=mysqli_real_escape_string($con,(strip_tags($_POST["mod_dueno"],ENT_QUOTES)));
			


		$id_producto=$_POST['mod_id'];
		$sql="UPDATE finca SET nombre_Finca='".$nombre."', descripcion_Finca='".$descripcion."', cantidad_Lotes='".$lote."',
		area_Neta='".$neta."', area_Bruta='".$bruta."', telefono='".$telef."',
		mail='".$correo."', dueno='".$dueno."'
		 WHERE id_Finca='".$id_producto."'";
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