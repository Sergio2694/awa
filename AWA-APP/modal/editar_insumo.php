	<?php
		if (isset($con))
		{
			$query = "SELECT id_Inventario, nombre_Producto_Inventario FROM inventario";
			$resultado=$con->query($query);
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModalInsumo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar el inventario</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
				<label for="nombre_Producto" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  	<input type="text" class="form-control" id="mod_nombre" name="mod_nombre" placeholder="Nombre del producto" required>
					<input type="hidden" name="mod_id" id="mod_id">

				</div>
			  </div>
			 <div class="form-group">
				<label for="unidad" class="col-sm-3 control-label">Cantidad</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_unidad" name="mod_unidad" placeholder="Unidad del producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
				</div>
			  </div>
			
			  <div class="form-group">
				<label for="fecha" class="col-sm-3 control-label">Fecha de ingreso</label>
				<div class="col-sm-8">
				  <input type="date" class="form-control" id="mod_fecha" name="mod_fecha" placeholder="Fecha de ingreso" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="Lote" class="col-sm-3 control-label">Lote</label>
				<div class="col-sm-8">
				 <select class="form-control" id="mod_lote" name="mod_lote" required>
					<option value="1" selected>Lote 1</option>
					<option value="2">Lote</option>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label for="inventario" class="col-sm-3 control-label">Nombre del producto en inventario</label>
				<div class="col-sm-8">
				 <select class="form-control" id="inventario" name="inventario" required>
					<?php while($row = $resultado->fetch_assoc()) { ?>
						<option value="<?php echo $row['id_Inventario']; ?>"><?php echo $row['nombre_Producto_Inventario']; ?></option>
					<?php } ?>

				  </select>
				</div>
			  </div>
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>