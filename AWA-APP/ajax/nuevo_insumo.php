<?php 
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre'])) {
           $errors[] = "nombre vacíos";
		} else if (empty($_POST['unidad'])){
			$errors[] = "Unidad vacía";
		} else if (empty($_POST['fecha'])){
			$errors[] = "fecha vacío";
		} else if (empty($_POST['inventario'])){
			$errors[] = "inventario vacío";
		}  else if (
			!empty($_POST['nombre']) &&
			!empty($_POST['unidad']) &&
			!empty($_POST['fecha'])&&
			!empty($_POST['inventario'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$unidad=intval($_POST['unidad']);
		$fecha=mysqli_real_escape_string($con,(strip_tags($_POST["fecha"],ENT_QUOTES)));
		$inventario=intval($_POST['inventario']);

	


		$sql="INSERT INTO insumo (nombre_Producto_Inventario, cantidad, fecha_De_Ingreso, lote, id_Finca, id_Inventario) VALUES ('$nombre', '$unidad','$fecha' , 1 , 3, '$inventario')";
		$query_new_insert = mysqli_query($con,$sql);

		$new=mysqli_query($con, "SELECT unidad as Total FROM inventario where id_Inventario = '".$inventario."'");
		$rows=mysqli_fetch_array($new);//que te devuelve un array asociativo con el nombre del campo
		$TotalCantidad=$rows['Total']; //Este es el valor que acabas de calcular en la consulta

		$total = $TotalCantidad - $unidad;


		$sql="UPDATE inventario SET unidad='".$total."'
		 WHERE id_Inventario='".$inventario."'";
		$query_update = mysqli_query($con,$sql);

			if ($query_new_insert){
				$messages[] = "El insumo ha sido creado satisfactoriamente.";
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