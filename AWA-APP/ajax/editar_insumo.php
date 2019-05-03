<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
		}else if (empty($_POST['mod_nombre'])) {
           $errors[] = "nombre vacíos";
		} else if (empty($_POST['mod_unidad'])){
			$errors[] = "Unidad vacía";
		}  else if (empty($_POST['mod_lote'])){
			$errors[] = "Lote  vacío";
		} else if (empty($_POST['mod_fecha'])){
			$errors[] = "Fecha vacío";
		} else if (empty($_POST['mod_inventario'])){
			$errors[] = "inventario vacío";
		} else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_nombre']) &&
			!empty($_POST['mod_unidad']) &&
			!empty($_POST['mod_lote']) &&
			!empty($_POST['mod_fecha'])&&
			!empty($_POST['mod_inventario'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		//$id=intval($_POST['mod_id']);

		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre"],ENT_QUOTES)));
		$unidad=intval($_POST['mod_unidad']);
		$lote=intval($_POST['mod_lote']);
		$fecha=mysqli_real_escape_string($con,(strip_tags($_POST["mod_fecha"],ENT_QUOTES)));
		$insumo=intval($_POST['mod_insumo']);

		$id_producto=$_POST['mod_id'];
		$sql="UPDATE insumo SET nombre_Producto_Inventario='".$nombre."',
		cantidad='".$unidad."',  lote='".$lote."' ,  id_Inventario='".$inventario."'
		 WHERE id_Inventario='".$id_producto."'";

		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Insumo ha sido actualizado satisfactoriamente.";
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