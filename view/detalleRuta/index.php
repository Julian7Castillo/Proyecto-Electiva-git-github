<?php
require_once ("../../config/connection.php");

if (isset($_SESSION['id_usuario'])) {
    ?>

<!DOCTYPE html>
<html>
<head lang="es">
	<?php
    require_once ("../mainHead/head.php");
    ?>
    <title>Mesa de Ayuda::Detalle Ticket</title>
</head>
<body class="with-side-menu">
	
	<?php
    require_once ("../mainHeader/header.php");
    ?>
	<!--.site-header-->

	<div class="mobile-menu-left-overlay"></div>
	
	<?php
    require_once ("../mainNav/nav.php");
    ?>
	
	<!-- Contenido  -->
	<div class="page-content">
		<div class="container-fluid">
		
			<header>
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3 id="lblnomidruta">Detalle Ruta - 1</h3>
							<div id="lblstatus"></div>
							<span class="label label-pill label-primary" id="lblusername"></span>
							<span class="label label-pill label-default" id="lbldatecreated"></span>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../home/">Home</a></li>
								<li class="active">Detalle Ruta</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<div class="box-typical box-typical-padding">
				<div class="row">
					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label semibold" for="sector_ruta">Sector</label>
							<input type="text" class="form-control" id="sector_ruta" name="sector_ruta" readonly>
						</fieldset>
					</div>
					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label semibold" for="descripcion_ruta">Descripcion</label>
							<input type="text" class="form-control" id="descripcion_ruta" name="descripcion_ruta" readonly>
						</fieldset>
					</div>
					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label semibold" for="latitud_ruta">Latitud</label>
							<input type="text" class="form-control" id="latitud_ruta" name="latitud_ruta" readonly>
						</fieldset>
					</div>
					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label semibold" for="longitud_ruta">Longitud</label>
							<input type="text" class="form-control" id="longitud_ruta" name="longitud_ruta" readonly>
						</fieldset>
					</div>
				</div>
			</div>
			
			<!-- Map container -->
  			<div id="map" style="height: 400px;"></div>
			
		</div>
	</div>
	<!-- Contenido  -->

	<?php
    require_once ("../mainJs/js.php");
    ?>

<script src="detalleruta.js" type="text/javascript"></script>

</body>
</html>
<?php
} else {
    header("Location:" . Connect::route() . "index.php");
}
?>