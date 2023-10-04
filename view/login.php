<!DOCTYPE html>
<html>

<head lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Aula Virtual::Acceso</title>

    <link href="../public/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="../public/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="../public/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="../public/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="../public/img/favicon.png" rel="icon" type="image/png">
    <link href="../public/img/favicon.ico" rel="shortcut icon">

    <link rel="stylesheet" href="../public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="../public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/main.css">
</head>

<body>
    <div class="page-center" style="height: 100vh; display: flex; justify-content: center; align-items: center; background-image: url('../public/img/fondoLogin.png'); background-size: cover; background-repeat: no-repeat;">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" action="" method="post" id="login_form">
                    <input type="hidden" id="rol_id" name="rol_id" value="1">
                    <div class="sign-avatar">
                        <img src="../public/img/avatar-1-128.png" alt="" id="imgtipo">
                    </div>
                    <header class="sign-title" id="lbltitulo">Acceso Usuario</header>
                    <div class="form-group">
                        <input type="text" id="document" name="document" class="form-control" placeholder="Documento de identidad" />
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Clave de seguridad" />
                    </div>
                    <div class="form-group">
                        <div class="float-right reset">
                            <a href="reset-password.html">Cambiar contraseña</a>
                        </div>
                        <div class="float-left reset">
                            <a href="#" id="btnsoporte">Acceso</a>
                        </div>
                    </div>
                    <input type="hidden" name="submit" class="form-control" value="si">
                    <button type="submit" class="btn btn-rounded">Acceder</button>
                </form>
            </div>
        </div>
    </div>
    <!--.page-center-->

    <script src="../public/js/lib/jquery/jquery.min.js"></script>
    <script src="../public/js/lib/tether/tether.min.js"></script>
    <script src="../public/js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="../public/js/plugins.js"></script>
    <script type="text/javascript" src="../public/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script src="../public/js/app.js"></script>
</body>

</html>