	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModaInve" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
					<label for="descripcion_Producto" class="col-sm-3 control-label">Descripción</label>
					<div class="col-sm-8">
					<textarea class="form-control" id="mod_descripcion" name="mod_descripcion" placeholder="Descripción del producto" required maxlength="255" ></textarea>
				</div>
			  </div>
			  
			  	<div class="form-group">
					<label for="casa_Comercial" class="col-sm-3 control-label">Casa comercial</label>
					<div class="col-sm-8">
				  		<input type="text" class="form-control" id="mod_casa_comercial" name="mod_casa_comercial" placeholder="Casa comercial" required>
					</div>
			  	</div>

			  <div class="form-group">
				<label for="IA" class="col-sm-3 control-label">Ingrediente activo</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_IA" name="mod_IA" placeholder="Ingrediente activo del producto" required>
				</div>
			  </div>

			  <div class="form-group">
				<label for="presentacion" class="col-sm-3 control-label">Presentación</label>
				<div class="col-sm-8">
				 <select class="form-control" id="mod_presentacion" name="mod_presentacion" required>
					<option value="">-- Selecciona estado --</option>
					<option value="Saco" selected>Saco</option>
					<option value="Litro">Litro</option>
				  </select>
				</div>
			  </div>

			  <div class="form-group">
				<label for="precio" class="col-sm-3 control-label">Precio</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="mod_precio" name="mod_precio" placeholder="Precio de venta del producto" title="Ingresa sólo números." maxlength="8">
				</div>
			  </div>

			 <div class="form-group">
				<label for="unidad" class="col-sm-3 control-label">Unidad</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_unidad" name="mod_unidad" placeholder="Unidad del producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
				</div>
			  </div>
			 

			  <div class="form-group">
				<label for="uso_Tecnico" class="col-sm-3 control-label">Uso técnico</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_uso_tecnico" name="mod_uso_tecnico" placeholder="Uso técnico" required>
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
				<label for="fecha" class="col-sm-3 control-label">Fecha de la compra</label>
				<div class="col-sm-8">
				  <input type="date" class="form-control" id="mod_fecha" name="mod_fecha" placeholder="Fecha de compra" required>
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