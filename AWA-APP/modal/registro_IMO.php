	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoIMO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar una mano de obra</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_producto" name="guardar_producto">
			<div id="resultados_ajax_productos"></div>
			  
			  <div class="form-group">
				<label for="labores" class="col-sm-3 control-label">Labor</label>
				<div class="col-sm-8">
				  	<input type="text" class="form-control" id="labores" name="labores" placeholder="Labor de Mano de Obra" required>
				</div>
			  </div>
			 
				<div class="form-group">
					<label for="tiempo" class="col-sm-3 control-label">Tiempo de ejecución</label>
					<div class="col-sm-8">
				  			<input type="number" class="form-control" id="tiempo" name="tiempo" placeholder="Tiempo de ejecución" title="Ingresa sólo números." maxlength="8">
					</div>
			  	</div>

			  <div class="form-group">
				<label for="fecha" class="col-sm-3 control-label">Fecha de la ejecución</label>
				<div class="col-sm-8">
				  <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha de ejecución" required>
				</div>
			  </div>

			 <div class="form-group">
				<label for="lote" class="col-sm-3 control-label">Lotes</label>
				<div class="col-sm-8">
				 <select class="form-control" id="lote" name="lote" required>
					<option value="">-- Selecciona lote --</option>
					<option value="1" selected>1</option>
					<option value="2">2</option>
				  </select>
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