<?php 
if($_SESSION['rol_id'] == 1){
?>
    <nav class="side-menu">
        <ul class="side-menu-list">
        	<li class="blue-dirty">
        		<a href="..\home\">
    				<span class="glyphicon glyphicon-th"></span>
    				<span class="lbl">Inicio</span>
    			</a>
    		</li>
    		<li class="blue-dirty">
    			<a href="..\MntUsuarios\">
    				<span class="glyphicon glyphicon-th"></span>
    				<span class="lbl">Gestion Usuarios</span>
    			</a>
    		</li>
    		<li class="blue-dirty">
    			<a href="..\MntRutas\">
    				<span class="glyphicon glyphicon-th"></span>
    				<span class="lbl">Gestion Rutas</span>
    			</a>
    		</li>
    		<li class="blue-dirty">
    			<a href="#">
    				<span class="glyphicon glyphicon-th"></span>
    				<span class="lbl">Gestion Recolecciones</span>
    			</a>
    		</li>
    	</ul>
    </nav>
<?php 
}elseif($_SESSION['id_usuario']){
?>
	<nav class="side-menu">
        <ul class="side-menu-list">
        	<li class="blue-dirty">
        		<a href="..\home\">
    				<span class="glyphicon glyphicon-th"></span>
    				<span class="lbl">Inicio</span>
    			</a>
    		</li>
    		<li class="blue-dirty">
    			<a href="#">
    				<span class="glyphicon glyphicon-th"></span>
    				<span class="lbl">Gestion Rutas</span>
    			</a>
    		</li>
    		<li class="blue-dirty">
    			<a href="#">
    				<span class="glyphicon glyphicon-th"></span>
    				<span class="lbl">Gestion Recolecciones</span>
    			</a>
    		</li>
    	</ul>
    </nav>
<?php 
}else{
?>
	<nav class="side-menu">
        <ul class="side-menu-list">
        	<li class="blue-dirty">
        		<a href="..\home\">
    				<span class="glyphicon glyphicon-th"></span>
    				<span class="lbl">Inicio</span>
    			</a>
    		</li>
    		<li class="blue-dirty">
    			<a href="#">
    				<span class="glyphicon glyphicon-th"></span>
    				<span class="lbl">Gestion Ruta</span>
    			</a>
    		</li>
    	</ul>
    </nav>
<?php
}
?>