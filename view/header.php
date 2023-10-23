<!DOCTYPE html>
<html lang="es">
<body>
    
    <!--barra de navegación-->
    <div class="contenedor-header">
        <div class="head-nombre">
            <h1>Milkcollector</h1>
        </div>

        <div class=heard-usuario>
            <img src="view/img/usuarios.png" alt="Usuarios">
        </div>
    </div>

    <input id="abrir-cerrar" name="abrir-cerrar" type="checkbox" value="" />
    <label for="abrir-cerrar">
        &#9776; <span class="abrir">Abrir Menu</span><span class="cerrar">Cerrar Menu</span>
    </label>

    <div id="sidebar" class="sidebar">
        <ul class="Menu">
            <li><h2><b>Menu</b></h2></li>
            <li><a href="index.php?pag=home">Inicio</a></li>
            <li><a href="index.php?pag=usuario">Usuarios</a></li>
            <li><a href="index.php?pag=recolector">Recolector</a></li>
            <li><a href="index.php?pag=rutas">Rutas</a></li>
            <li><a href="index.php?pag=login">Cerrar Sesión </a></li>
        </ul>
    </div>
</body>
</html>