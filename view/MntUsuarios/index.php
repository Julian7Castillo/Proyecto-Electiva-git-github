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
    <title>MilkCollector::Gestion Usuario</title>
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
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Gestion Usuario</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../home">Inicio</a></li>
								<li class="active">Gestion Usuario</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			
			<div class="box-typical box-typical-padding">
				<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>
				<table id="user_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 5%;">Nombre</th> 
							<th style="width: 15%;">Apellido</th> 
							<th class="d-none d-sm-table-cell" style="width: 40%;">Documento Identidad</th>
							<th class="d-none d-sm-table-cell" style="width: 5%;">Contraseña</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Rol</th>
							<th class="text-center" style="width: 5%"></th>
							<th class="text-center" style="width: 5%"></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				 </table>
			</div>
		</div>
	</div>
    
    <?php 
    require_once ("modalMntUsuario.php");
    ?>
    
    <?php
    require_once ("../mainJs/js.php");
    ?>
    
<script src="mntusuarios.js" type="text/javascript"></script>
</body>
</html>
<?php
} else {
    header("Location:" . Connect::route() . "index.php");
}
?>