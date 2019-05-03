	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoFinca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar finca nuevo</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="<guardar_pro></guardar_pro>ducto" name="guardar_producto">
			<div id="resultados_ajax_productos"></div>
			  
			  <div class="form-group">
				<label for="nombre_finca" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombre_finca" name="nombre_finca" placeholder="Nombre de la finca" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="descripcion_Finca" class="col-sm-3 control-label">Descripción</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="descripcion_Finca" name="descripcion_Finca" placeholder="Descripción de la finca" required maxlength="255" ></textarea>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="lotes" class="col-sm-3 control-label">Cantidad de lotes</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="lotes" name="lotes" placeholder="Cantidad de lotes" required>
				</div>
			  </div>

			  <div class="form-group">
				<label for="neta" class="col-sm-3 control-label">Área neta</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="neta" name="neta" placeholder="Área neta" required>
				</div>
			  </div>

			  <div class="form-group">
				<label for="bruta" class="col-sm-3 control-label">Área bruta</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="bruta" name="bruta" placeholder="Área bruta" required>
				</div>
			  </div>
			  

			  <div class="form-group">
				<label for="telef" class="col-sm-3 control-label">Teléfono</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="telef" name="telef" placeholder="Teléfono" required>
				</div>
			  </div>

			  <div class="form-group">
				<label for="correo" class="col-sm-3 control-label">Correo</label>
				<div class="col-sm-8">
				  <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
				</div>
			  </div>


			  <div class="form-group">
				<label for="dueno" class="col-sm-3 control-label">Dueño</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="dueno" name="dueno" placeholder="Dueño" required>
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