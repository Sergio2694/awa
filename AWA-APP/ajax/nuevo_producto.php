<?php 
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre_Producto'])) {
           $errors[] = "nombre vacíos";
        }else if (empty($_POST['descripcion_Producto'])) {
           $errors[] = "Descripcion vacío";
        } else if (empty($_POST['casa_Comercial'])){
			$errors[] = "Casa comercial vacío";
		} else if ($_POST['IA']==""){
			$errors[] = "Ingrediente Activo del producto vacío";
		} else if (empty($_POST['presentacion'])){
			$errors[] = "Presentacion de venta vacío";
		} else if ($_POST['precio']==""){
			$errors[] = "Precio del producto vacío";
		} else if (empty($_POST['uso_Tecnico'])){
			$errors[] = "Uso tecnico vacío";
		} else if (
			!empty($_POST['nombre_Producto']) &&
			!empty($_POST['descripcion_Producto']) &&
			!empty($_POST['casa_Comercial']) &&
			$_POST['IA']!="" &&
			!empty($_POST['presentacion'])&&
			!empty($_POST['precio']) &&
			!empty($_POST['uso_Tecnico'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_Producto"],ENT_QUOTES)));
		$descripcion_Producto=mysqli_real_escape_string($con,(strip_tags($_POST["descripcion_Producto"],ENT_QUOTES)));
		$casa_comercial=mysqli_real_escape_string($con,(strip_tags($_POST["casa_Comercial"],ENT_QUOTES)));
		$IA=mysqli_real_escape_string($con,(strip_tags($_POST["IA"],ENT_QUOTES)));
		$presentacion=mysqli_real_escape_string($con,(strip_tags($_POST["presentacion"],ENT_QUOTES)));
		$precio=intval($_POST['precio']);
		$uso_tecnico=mysqli_real_escape_string($con,(strip_tags($_POST["uso_Tecnico"],ENT_QUOTES)));

		$sql="INSERT INTO producto (nombre_Producto, descripcion_Producto, casa_Comercial, IA, presentacion, precio, unidad, precio_Por_Unidad, uso_Tecnico) VALUES ('$nombre','$descripcion_Producto','$casa_comercial','$IA','$presentacion', '$precio', 0,0,'$uso_tecnico')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Producto ha sido ingresado satisfactoriamente.";
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