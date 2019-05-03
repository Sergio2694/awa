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
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Fincas</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
				<label for="nombre_finca" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  	<input type="text" class="form-control" id="mod_nombre" name="mod_nombre" placeholder="Nombre de la finca" required>
					<input type="hidden" name="mod_id" id="mod_id">

				</div>
			  </div>
			  <div class="form-group">
					<label for="descripcion_finca" class="col-sm-3 control-label">Descripción</label>
					<div class="col-sm-8">
					<textarea class="form-control" id="mod_descripcion" name="mod_descripcion" placeholder="Descripción de la finca" required maxlength="255" ></textarea>
				</div>
			  </div>

			  
			  	<div class="form-group">
					<label for="lote" class="col-sm-3 control-label">Lotes</label>
					<div class="col-sm-8">
				  		<input type="text" class="form-control" id="mod_lote" name="mod_lote" placeholder="Cantidad de lotes" required>
					</div>
			  	</div>


			  <div class="form-group">
				<label for="neta" class="col-sm-3 control-label">Área Neta</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_neta" name="mod_neta" placeholder="Área neta" required>
				</div>
			  </div>


			  <div class="form-group">
				<label for="bruta" class="col-sm-3 control-label">Área bruta</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_bruta" name="mod_bruta" placeholder="Área bruta" title="Ingresa sólo números." maxlength="8">
				</div>
			  </div>

			 
			  <div class="form-group">
				<label for="telef" class="col-sm-3 control-label">Teléfono</label>
				<div class="col-sm-8">
				  <input type="tel" class="form-control" id="mod_tel" name="mod_tel" placeholder="Telefono" required>
				</div>
			  </div>

			  <div class="form-group">
				<label for="correo" class="col-sm-3 control-label">Correo</label>
				<div class="col-sm-8">
				  <input type="tel" class="form-control" id="mod_correo" name="mod_correo" placeholder="Correo" required>
				</div>
			  </div>

			   <div class="form-group">
				<label for="dueño" class="col-sm-3 control-label">Dueño</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_dueno" name="mod_dueno" placeholder="Dueño" required>
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