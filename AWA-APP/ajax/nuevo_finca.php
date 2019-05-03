<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre_finca'])) {
           $errors[] = "nombre vacíos";
        }else if (empty($_POST['descripcion_Finca'])) {
           $errors[] = "Descripcion vacío";
        } else if (empty($_POST['lotes'])){
			$errors[] = "Casa comercial vacío";
		} else if ($_POST['neta']==""){
			$errors[] = "Ingrediente Activo del producto vacío";
		} else if (empty($_POST['bruta'])){
			$errors[] = "Presentacion de venta vacío";
		} else if ($_POST['telef']==""){
			$errors[] = "Precio del producto vacío";
		} else if (empty($_POST['correo'])){
			$errors[] = "Unidad vacía";
		} else if ($_POST['dueno']==""){
			$errors[] = "Precio por unidad del producto vacío";
		}  else if (
			!empty($_POST['nombre_finca']) &&
			!empty($_POST['descripcion_Finca']) &&
			!empty($_POST['lotes']) &&
			$_POST['neta']!="" &&
			!empty($_POST['bruta'])&&
			!empty($_POST['telef']) &&
			!empty($_POST['correo']) &&
			$_POST['dueno']!=""

		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_finca"],ENT_QUOTES)));
		$descripcion=mysqli_real_escape_string($con,(strip_tags($_POST["descripcion_Finca"],ENT_QUOTES)));
		$lote=intval($_POST['lotes']);
		$neta=intval($_POST['neta']);
		$bruta=intval($_POST['bruta']);
		$telef=mysqli_real_escape_string($con,(strip_tags($_POST["telef"],ENT_QUOTES)));
		$correo=mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
		$dueno=mysqli_real_escape_string($con,(strip_tags($_POST["dueno"],ENT_QUOTES)));
		
		$sql="INSERT INTO finca (nombre_Finca, descripcion_Finca, cantidad_Lotes, area_Neta, area_Bruta, telefono, mail, dueno) VALUES ('$nombre','$descripcion','$lote','$neta','$bruta', '$telef', '$correo', '$dueno')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Finca ha sido ingresado satisfactoriamente.";
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