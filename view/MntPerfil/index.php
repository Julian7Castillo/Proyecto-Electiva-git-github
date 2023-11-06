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
    <title>MilkCollector::Perfil</title>
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
							<h3>Perfil</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../home">Inicio</a></li>
								<li class="active">Perfil de Usuario</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<div class="box-typical box-typical-padding">
    			<div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <section class="box-typical profile-side-user">
                            <button type="button" class="avatar-preview avatar-preview-128">
								<img src="../../public/img/avatar-1-128.png" alt="">
								<span class="update">
									<i class="font-icon font-icon-picture-double"></i>
									Actualizar foto
								</span>
								<input type="file">
							</button>
                            <div class="btn-group">
                            </div>
                        </section>
                        <section class="box-typical">
                            <header class="box-typical-header-sm bordered">Info</header>
                            <div class="box-typical-inner">
                                <p class="line-with-icon">
                                    <i class="font-icon font-icon-user"></i> <?php echo $_SESSION['nombre_usuario'] ?>
                                </p>
                                <p class="line-with-icon">
                                    <i class="font-icon font-icon-user"></i> <?php echo $_SESSION['apellido_usuario'] ?>
                                </p>
                                <p class="line-with-icon'">
                                    <i class="font-icon font-icon-user"></i> <?php echo $_SESSION['nombre_rol'] ?>
                                </p>
                                <p class="line-with-icon">
                                    <i class="font-icon font-icon-learn"></i> MilkCollector App
                                </p>
                                <p class="line-with-icon">
                                    <i class="font-icon font-icon-users-two"></i><?php echo $_SESSION['correo'] ?>
                                </p>
                                <p class="line-with-icon">
                                    <i class="font-icon font-icon-calend"></i> Registrado el <?php echo $_SESSION['creado'] ?>
                                </p>
                            </div>
                        </section>
                        <!--.profile-side-->
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <section class="tabs-section">
                            <div class="tabs-section-nav tabs-section-nav-left">
                                <ul class="nav" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tabs-2-tab-4" role="tab" data-toggle="tab">
                                            <span class="nav-link-in" id="settings">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!--.tabs-section-nav-->
                            <div class="tab-content no-styled profile-tabs">
                                <!--.tab-pane-->
                                <div role="tabpanel" class="tab-pane" id="tabs-2-tab-4">
                                    <section class="box-typical profile-settings">
                                    	<header class="box-typical-header-sm">Información Personal</header>
                                    	<form method="post" id="user_perfil">
                                            <section class="box-typical-section">
                                            	<input type="hidden" id="id_usuario" name="id_usuario" />
                                                <div class="form-group row">
                                                    <div class="col-xl-2">
                                                        <label class="form-label" for="documento">Nombre</label>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <input class="form-control" id="nombre_usuario" name="nombre_usuario" type="text" value="Nombre">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xl-2">
                                                        <label class="form-label" for="apellido_usuario">Apellido</label>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <input class="form-control" id="apellido_usuario" name="apellido_usuario" type="text" value="Apellido">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xl-2">
                                                        <label class="form-label" for="correo">Correo</label>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <input class="form-control" id="correo" name="correo" type="email" value="correo">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xl-2">
                                                        <label class="form-label" for="direccion">Direccion</label>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <input class="form-control" id="direccion" name="direccion" type="text" value="direccion">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xl-2">
                                                        <label class="form-label" for="celular">Celular</label>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <input class="form-control" id="celular" name="celular" type="text" value="celular">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xl-2">
                                                        <label class="form-label" for="documento">Documento</label>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <input class="form-control" id="documento" name="documento" type="text" value="documento" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                	<div class="col-xl-2">
                                                    	<label class="form-label" for="id_rol">Rol</label>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <input class="form-control" id="id_rol" name="id_rol" type="text" value="documento" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xl-12">
                                                        <label class="form-label semibold" for="claveNueva"><i class="font-icon font-icon-pin-2"></i>Nueva contraseña</label>
        												<input type="password" name="claveNueva" id="claveNueva" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xl-12">
                                                        <label class="form-label semibold" for="clave"><i class="font-icon font-icon-pin-2"></i>Confirmar contraseña</label>
        												<input type="password" name="clave" id="clave" class="form-control" />
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="box-typical-section profile-settings-btns">
                                                <button type="submit" id="#" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Actualizar</button>
                                            </section>
                                       	</form>
                                    </section>
                                </div>
                                <!--.tab-pane-->
                            </div>
                            <!--.tab-content-->
                        </section>
                        <!--.tabs-section-->
                    </div>
                </div>
           	</div>
		</div>
	</div>
	<!-- Contenido  -->

	<?php
    require_once ("../mainJs/js.php");
    ?>

<script src="mntperfil.js" type="text/javascript"></script>

</body>
</html>
<?php
} else {
    header("Location:" . Connect::route() . "index.php");
}
?>