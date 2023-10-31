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
    			<a href="#">
    				<span class="glyphicon glyphicon-th"></span>
    				<span class="lbl">Rutas</span>
    			</a>
    		</li>
    	</ul>
    </nav>
<?php 
}
?>