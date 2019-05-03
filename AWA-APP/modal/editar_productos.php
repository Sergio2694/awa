	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar producto</h4>
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
					<option value="Saco" selected>Saco</option>
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
				  <input type="number" class="form-control" id="mod_precio" name="mod_precio" placeholder="Precio de venta del producto" title="Ingresa sólo números." maxlength="8">
				</div>
			  </div>

			  <div class="form-group">
				<label for="uso_Tecnico" class="col-sm-3 control-label">Uso técnico</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_uso_tecnico" name="mod_uso_tecnico" placeholder="Uso técnico" required>
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