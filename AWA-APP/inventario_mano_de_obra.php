<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_facturas="";
	$active_IMO="active";
	$active_MO="";
	$active_finca="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Mano de Obra | Café Misión";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>
	
    <div class="container" style="padding-right:0px;padding-left: 0px;margin-left: 140px;margin-right: 10px;">
	<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-info" style="background-color: #568435" data-toggle="modal" data-target="#nuevoIMO"><span class="glyphicon glyphicon-plus" ></span> Agregar mano de obra realizada </button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Mano de Obra</h4>
		</div>
		<div class="panel-body" style="margin-left: 1000px;">
		
			
			<?php
			include("modal/registro_IMO.php");
			include("modal/editar_IMO.php");
			?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Nombre</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Mano de Obra" onkeyup='load(1);'>
							</div>
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
				<div id="resultados" style="background-color: #568435"></div><!-- Carga los datos ajax -->
				<div class='outer_div' style="text-align: center;"></div><!-- Carga los datos ajax -->
			
		
	
			
			
			
  </div>
</div>
		 
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/IMO.js"></script>
  </body>
</html>
<script>

$( "#guardar_producto" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_IMO.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax_productos").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax_productos").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})


$( "#editar_producto" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
  var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_IMO.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

	function obtener_datos(id){

			var labores = $("#labores"+id).val();
			var fecha = $("#fecha"+id).val();
			var horas = $("#horas"+id).val();
			var lote = $("#lote"+id).val();
			var precio = $("#costo"+id).val();

			$("#mod_id").val(id);
			$("#mod_labores").val(labores);
			$("#mod_fecha").val(fecha);
			$("#mod_horas").val(horas);
			$("#mod_lote").val(lote);
			$("#mod_precio").val(precio);


		}
</script>
