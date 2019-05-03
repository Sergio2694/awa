<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_facturas="";
	$active_mapas="active";
	$active_finca="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Mano de Obra | Café Misión";
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Mapas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body style="background-image: url('images/pic01.jpg');">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">
	

						<nav>
							<ul>
								<li><a href="#menu">Mapas</a></li>
							</ul>
						</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="../finca.php">Finca</a></li>
							<li><a href="../Productos.php">Productos</a></li>
							<li><a href="../finca.php">Inventario</a></li>
							<li><a href="../finca.php">Insumo</a></li>
							<li><a href="../mano_de_obra.php">Mano de obra</a></li>
							<li><a href="../inventario_mano_de_obra.php">Inventario de mano de obra</a></li>


						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<section class="tiles">
								<article class="style1">
									<span class="image">
										<img src="images/pic02.jpg" style="width: 353px;height: 326px;" alt="" />
									</span>
									<a href="../mapas/index-3.html">
										<h2>Mapa de Suelos</h2>
										<div class="content">
											<p>Mapa general de la finca Café Misión, Año 2018</p>
										</div>
									</a>
								</article>

								<article class="style1">
									<span class="image">
										<img src="images/pic02.jpg" style="width: 353px;height: 326px;" alt="" />
									</span>
									<a href="../mapas/index.html">
										<h2>Mapas de Areas Café Misión</h2>
										<div class="content">
											<p>Mapa general de la finca Café Misión, Año 2018</p>
										</div>
									</a>
								</article>

								<article class="style1">
									<span class="image">
										<img src="images/pic02.jpg" style="width: 353px;height: 326px;" alt="" />
									</span>
									<a href="">
										<h2>Mapas de Distribución de M.O</h2>
										<div class="content">
											<p>Mapa general de la finca Café Misión, Año 2018</p>
										</div>
									</a>
								</article>

								<article class="style1">
									<span class="image">
										<img src="images/pic02.jpg" style="width: 353px;height: 326px;" alt="" />
									</span>
									<a href="../mapas/index-2.html">
										<h2>Mapas de Enfermedades</h2>
										<div class="content">
											<p>Mapa general de la finca Café Misión, Año 2018</p>
										</div>
									</a>
								</article>

								<article class="style1">
									<span class="image">
										<img src="images/pic02.jpg" style="width: 353px;height: 326px;" alt="" />
									</span>
									<a href="">
										<h2>Mapas de Fertilidad</h2>
										<div class="content">
											<p>Mapa general de la finca Café Misión, Año 2018</p>
										</div>
									</a>
								</article>

								<article class="style1">
									<span class="image">
										<img src="images/pic02.jpg" style="width: 353px;height: 326px;" alt="" />
									</span>
									<a href="">
										<h2>Mapas de Producción</h2>
										<div class="content">
											<p>Mapa general de la finca Café Misión, Año 2018</p>
										</div>
									</a>
								</article>
							</section>
						</div>
					</div>

				
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>