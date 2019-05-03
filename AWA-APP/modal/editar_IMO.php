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
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Inventario de Mano de Obra</h4>
		  </div>
		  <div class="modal-body"> 
			<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
				<label for="labor" class="col-sm-3 control-label">Labor</label> 
				  	<input type="text" class="form-control" id="mod_labores" name="mod_labores" placeholder="Labor de Mano de Obra" required>
					<input type="hidden" name="mod_id" id="mod_id">

				</div>
			  </div>
			  
			  	<div class="form-group">
					<label for="tiempo" class="col-sm-3 control-label">Tiempo de ejecución</label>
					<div class="col-sm-8">
				  			<input type="number" class="form-control" id="mod_tiempo" name="mod_tiempo" placeholder="Tiempo de ejecución" title="Ingresa sólo números." maxlength="8">
					</div>
			  	</div>

			  
			  <div class="form-group">
				<label for="fecha" class="col-sm-3 control-label">Fecha de la ejecución</label>
				<div class="col-sm-8">
				  <input type="date" class="form-control" id="mod_fecha" name="mod_fecha" placeholder="Fecha de ejecución" required>
				</div>
			  </div>

			  
			 <div class="form-group">
				<label for="lotes" class="col-sm-3 control-label">Lotes</label>
				<div class="col-sm-8">
				 <select class="form-control" id="mod_lote" name="mod_lote" required>
					<option value="">-- Selecciona lote --</option>
					<option value="1" selected>1</option>
					<option value="2">2</option>
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