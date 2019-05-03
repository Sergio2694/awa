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
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Mano de Obra</h4>
		  </div>
		  <div class="modal-body"> 
			<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
				<label for="labor" class="col-sm-3 control-label">Labor</label>
				<div class="col-sm-8">
				  	<input type="text" class="form-control" id="mod_labores" name="mod_labores" placeholder="Labor de Mano de Obra" required>
					<input type="hidden" name="mod_id" id="mod_id">

				</div>
			  </div>
			  <div class="form-group">
					<label for="detalles" class="col-sm-3 control-label">Detalles</label>
					<div class="col-sm-8">
					<textarea class="form-control" id="mod_detalles" name="mod_detalles" placeholder="Detalles de la mano de obra" required maxlength="255" ></textarea>
				</div>
			  </div>

			  
			  	<div class="form-group">
					<label for="descripcion" class="col-sm-3 control-label">Descripción y uso</label>
					<div class="col-sm-8">
				  		<input type="text" class="form-control" id="mod_des" name="mod_des" placeholder="Descripción y uso" required>
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