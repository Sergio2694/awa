<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['labores'])) {
           $errors[] = "nombre vacíos";
        
		} else if ($_POST['tiempo']==""){
			$errors[] = "Ingrediente Activo del producto vacío";
		} else if (empty($_POST['fecha'])){
			$errors[] = "Presentacion de venta vacío";
		} else if ($_POST['lote']==""){
			$errors[] = "Precio del producto vacío";
		}  else if (
			!empty($_POST['labores']) &&
			$_POST['tiempo']!="" &&
			!empty($_POST['fecha'])&&
			!empty($_POST['lote'])
			

		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["labores"],ENT_QUOTES)));
	
		$tiempo=intval($_POST['tiempo']);
		$fecha=mysqli_real_escape_string($con,(strip_tags($_POST["fecha"],ENT_QUOTES)));
		$lote=intval($_POST['lote']);
		$costo=$tiempo * 1200;
		$id_Finca = '3' ;
		
		$sql="INSERT INTO inventario_mo (labor, fecha, cantidad_Horas,lote, costo_MO,id_Finca) VALUES ('$nombre','$fecha', '$tiempo' ,'$lote','$costo','$id_Finca' )";
		
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "MO ha sido ingresado satisfactoriamente.";
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