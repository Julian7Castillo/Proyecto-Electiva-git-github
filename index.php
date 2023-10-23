<?php
    //session_start();
	//Resive variables en el caso de que no se inicializan en 0
	extract ($_REQUEST);
	if (!isset($_REQUEST['msj'])){
		$msj=0;
	}
	if (!isset($_REQUEST['pag'])){
    	$pag='login';
	}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--link de la hoja de estilos en cascada css-->
	<link rel="stylesheet" href="view/css/styles.css">

    <!--llamado a estilos del framwork bootstrap-->
    <link rel="stylesheet" href="view/css/bootstrap.min.css">

    <title> Milkcollector::<?php echo $pag; ?> </title>
</head>

<body class="fondo">
    <!--encabezado-->
    <header>
        <?php
            if($pag != "login"){
                include "view/header.php";
            }
        ?>

    </header>

    <!--Area de trabajo-->
    <div class="container">
        <div id="divContenido"> 
            <?php include "view/".$pag.".php";?> 
        </div>
    </div>

    <!--pie de pagina-->
    <footer>
        <?php
            if($pag != 'login'){
                include "view/footer.php";
            }
        ?>
    </footer>
</body>

</html>