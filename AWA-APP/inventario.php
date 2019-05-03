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
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";	
	$active_inventario="active";		
	$title="Inventario | Café Misión";
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
	<div class="panel panel-info ">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-info" style="background-color: #568435" data-toggle="modal" data-target="#nuevoInvento"><span class="glyphicon glyphicon-plus" ></span> Crear Inventario </button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Inventarios</h4>
		</div>
		<div class="panel-body">
		
			
			
			<?php
			include("modal/registro_inventario.php");
			include("modal/editar_inventario.php");
			?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Nombre</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Insumo" onkeyup='load(1);'>
							</div>
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			
		
	
			
			
			
  </div>
</div>
		 
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/inventario.js"></script>
  </body>
</html>
<script>
$( "#guardar_producto" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_inventario.php",
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
			url: "ajax/editar_inventario.php",
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

			var nombre_producto = $("#nombre"+id).val();
			var descripcion = $("#des"+id).val();
			var casa_Comercial = $("#casa"+id).val();
			var IA = $("#ingrediente"+id).val();
			var presentacion = $("#pres"+id).val();
			var precio = $("#precios"+id).val();
			var unidad = $("#unidades"+id).val();
			var precio_Por_Unidad = $("#preciounidad"+id).val();
			var uso_Tecnico = $("#usotecnico"+id).val();
			var lote = $("#lote"+id).val();
			var fecha = $("#fecha"+id).val();

			$("#mod_id").val(id);
			$("#mod_nombre").val(nombre_producto);
			$("#mod_descripcion").val(descripcion);
			$("#mod_casa_comercial").val(casa_Comercial);
			$("#mod_IA").val(IA);
			$("#mod_presentacion").val(presentacion);
			$("#mod_precio").val(precio);
			$("#mod_unidad").val(unidad);
			$("#mod_precio_por_unidad").val(precio_Por_Unidad);
			$("#mod_uso_tecnico").val(uso_Tecnico);
			$("#mod_lote").val(lote);
			$("#mod_fecha").val(fecha);

		}
</script>