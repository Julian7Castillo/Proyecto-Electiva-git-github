<?php
	//Logica para contorl de la visualizacoion de elementos
    session_start();

	//Resive variables en el caso de que no se inicializan en 0
	extract ($_REQUEST);
	if (!isset($_REQUEST['msj'])){
		$msj=0;
	}
	if (!isset($_REQUEST['pag'])){
    	$pag='login';
	}
	else
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Milkcollector </title>
</head>

<body>
    <!--encabezado-->
    <header>
        <?php
            include "view/header.php"
        ?>
        <h1>Milkcollector</h1>

        <!--barra de navegación-->
        <nav>

        </nav>

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
            include "view/footer.php"
        ?>
    </footer>
</body>

</html>