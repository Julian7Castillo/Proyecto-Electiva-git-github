<?php
require_once("config/connection.php");

if(isset($_POST['submit']) && $_POST['submit'] == "si"){
    require_once("model/User.php");
    $user = new User();
    $user->login();
}
?>

<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>MilkCollector::Acceso</title>

	<link href="public/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="public/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="public/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="public/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="public/img/favicon.png" rel="icon" type="image/png">
	<link href="public/img/favicon.ico" rel="shortcut icon">
	
	<link rel="stylesheet" href="public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>

    <div class="page-center" style="height: 100vh; display: flex; justify-content: center; align-items: center;">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" action="" method="post" id="login_form">
                	<input type="hidden" id="id_rol" name="id_rol" value="1">
                    <div class="sign-avatar">
                        <img src="public/img/avatar-1-128.png" alt="" id="imgtipo">
                    </div>
                    <header class="sign-title" id="lbltitulo">Acceso Usuario</header>
                    <?php 
                    if(isset($_GET['m'])){
                        switch ($_GET['m']){
                            case "1":
                            ?>
                            	<div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
        							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        								<span aria-hidden="true">×</span>
        							</button>
        							<i class="font-icon font-icon-warning"></i>
        							Usuario y/o contraseña incorrectos
        						</div>
                            <?php
                            break;
                            case "2":
                            ?>
                            	<div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
        							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        								<span aria-hidden="true">×</span>
        							</button>
        							<i class="font-icon font-icon-warning"></i>
        							Los campos estan vacíos
        						</div>
                            <?php
                            break;
                        }
                    }
                    ?>
                    
                    <div class="form-group">
                        <input type="text" id="id_usuario" name="id_usuario" class="form-control" placeholder="Documento de identidad"/>
                    </div>
                    <div class="form-group">
                        <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña"/>
                    </div>
                    <div class="form-group">
                        <div class="float-right reset">
                            <a href="reset-password.html">Cambiar contraseña</a>
                        </div>
                    </div>
                    <input type="hidden" name="submit" class="form-control" value="si">
                    <button type="submit" class="btn btn-rounded">Acceder</button>
                </form>
            </div>
        </div>
    </div><!--.page-center-->

	<script src="public/js/lib/jquery/jquery.min.js"></script>
	<script src="public/js/lib/tether/tether.min.js"></script>
	<script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="public/js/plugins.js"></script>
    <script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
	<script src="public/js/app.js"></script>
</body>
</html>