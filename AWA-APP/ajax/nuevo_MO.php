<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['labores'])) {
           $errors[] = "nombre vacíos";
        }else if (empty($_POST['detalles'])) {
           $errors[] = "Descripcion vacío";
        } else if (empty($_POST['des'])){
			$errors[] = "Casa comercial vacío";
		} else if (
			!empty($_POST['labores']) &&
			!empty($_POST['detalles']) &&
			!empty($_POST['des'])
		){
		
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["labores"],ENT_QUOTES)));
		$detalle=mysqli_real_escape_string($con,(strip_tags($_POST["detalles"],ENT_QUOTES)));
		$des=mysqli_real_escape_string($con,(strip_tags($_POST["des"],ENT_QUOTES)));
		$tiempo=1;
		$fecha="12/10/2019";
		$lote=1;
		$produ="FD";
		$precio=1200;
		$id_Finca = '3' ;
		
		$sql="INSERT INTO mano_de_obra (labor, detalle, descripcion_Y_Uso, tiempo, fecha, lote, producto_Usado, precio_Por_Hora,id_Finca) VALUES ('$nombre','$detalle','$des','$tiempo','$fecha', '$lote', '$produ', '$precio', $id_Finca )";

		$messages[] = "MO ha sido ingresado satisfactoriamente.". $sql;

		$query_new_insert = mysqli_query($con,$sql);

			if ($query_new_insert){
				$messages[] = "MO ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			} 
		}else {
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