	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoInvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Crear inventario</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_producto" name="guardar_producto">
			<div id="resultados_ajax_productos"></div>
			  
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del inventario" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="Descripción" class="col-sm-3 control-label">Descripción</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripción del producto" required maxlength="255" ></textarea>
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
				<label for="unidad" class="col-sm-3 control-label">Unidad</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="unidad" name="unidad" placeholder="Unidad del producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
				</div>
			  </div>
			 
			  
			<div class="form-group">
				<label for="Lote" class="col-sm-3 control-label">Lote</label>
				<div class="col-sm-8">
				 <select class="form-control" id="lote" name="lote" required>
					<option value="1" selected>Lote 1</option>
					<option value="2">Lote 2</option>
				  </select>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="fecha" class="col-sm-3 control-label">Fecha de la compra</label>
				<div class="col-sm-8">
				  <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha de compra" required>
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