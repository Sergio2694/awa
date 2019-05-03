	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar producto nuevo</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_producto" name="guardar_producto">
			<div id="resultados_ajax_productos"></div>
			  
			  <div class="form-group">
				<label for="nombre_Producto" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombre_Producto" name="nombre_Producto" placeholder="Nombre del producto" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="descripcion_Producto" class="col-sm-3 control-label">Descripción</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="descripcion_Producto" name="descripcion_Producto" placeholder="Descripción del producto" required maxlength="255" ></textarea>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="casa_Comercial" class="col-sm-3 control-label">Casa comercial</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="casa_Comercial" name="casa_Comercial" placeholder="Casa comercial" required>
				</div>
			  </div>

			  <div class="form-group">
				<label for="IA" class="col-sm-3 control-label">Ingrediente activo</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="IA" name="IA" placeholder="Ingrediente activo del producto" required>
				</div>
			  </div>

			  <div class="form-group">
				<label for="presentacion" class="col-sm-3 control-label">Presentación</label>
				<div class="col-sm-8">
				 <select class="form-control" id="presentacion" name="presentacion" required>
					<option value="Saco 50Kg" selected>Saco 50Kg</option>
					<option value="Saco 45Kg" selected>Saco 45Kg</option>
					<option value="Litro">Litro</option>
					<option value="Kilo">Kilo</option>
					<option value="250ml">Presentación 250ml</option>
					<option value="Saco 25kg">Saco 25kg</option>
					<option value="OZ">OZ</option>
					<option value="10 OZ">10 OZ</option>
					<option value="50 OZ">50 OZ</option>
					<option value="100 OZ"> 100 OZ</option>
					<option value="1/2 Litro">1/2 Litro</option>
				  </select>
				</div>
			  </div>

			  <div class="form-group">
				<label for="precio" class="col-sm-3 control-label">Precio</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio de venta del producto" title="Ingresa sólo números." maxlength="8">
				</div>
			  </div>

			 <div class="form-group">
				<label for="uso_Tecnico" class="col-sm-3 control-label">Uso técnico</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="uso_Tecnico" name="uso_Tecnico" placeholder="Uso técnico" required>
				</div>
			  </div>
			</div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>