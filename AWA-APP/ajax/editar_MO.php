<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
		}else if (empty($_POST['mod_labores'])) {
           $errors[] = "nombre vacíos";
        }else if (empty($_POST['mod_detalles'])) {
           $errors[] = "Descripcion vacío";
        } else if (empty($_POST['mod_des'])){
			$errors[] = "Lote vacío";
		}else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_labores']) &&
			!empty($_POST['mod_detalles']) &&
			!empty($_POST['mod_des']) 

		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		//$id=intval($_POST['mod_id']);

		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_labores"],ENT_QUOTES)));
		$detalle=mysqli_real_escape_string($con,(strip_tags($_POST["mod_detalles"],ENT_QUOTES)));
		$des=mysqli_real_escape_string($con,(strip_tags($_POST["mod_des"],ENT_QUOTES)));
		$tiempo=1;
		$fecha="12/10/2019";
		$lote=1;
		$produ="FD";
		$precio=1200;
		$id_Finca = '3' ;
			


		$id_producto=$_POST['mod_id'];
		$sql="UPDATE mano_de_obra SET labor='".$nombre."', detalle='".$detalle."', descripcion_Y_Uso='".$des."',
		tiempo='".$tiempo."', fecha='".$fecha."', lote='".$lote."',
		producto_Usado='".$produ."', precio_Por_Hora='".$precio."'
		 WHERE id_MO='".$id_producto."'";
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