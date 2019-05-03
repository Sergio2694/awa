	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoMO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
					<label for="detalles" class="col-sm-3 control-label">Detalles</label>
					<div class="col-sm-8">
					<textarea class="form-control" id="detalles" name="detalles" placeholder="Detalles de la mano de obra" required maxlength="255" ></textarea>
				</div>
			  </div>

			  
			  	<div class="form-group">
					<label for="des" class="col-sm-3 control-label">Descripción y uso</label>
					<div class="col-sm-8">
				  		<input type="text" class="form-control" id="des" name="des" placeholder="Descripción y uso" required>
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