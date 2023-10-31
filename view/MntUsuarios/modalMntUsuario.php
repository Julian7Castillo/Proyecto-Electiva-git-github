<div id="modalMntUsuario" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labellebdy="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="model-close" data-dismiss="modal" aria-label="Close">
					<i class="font-icon-close-2"></i>
				</button>
				<h4 class="modal-title" id="mdltitulo"></h4>
			</div>
			<form method="post" id="user_form">
    			<div class="modal-body">
    				<input type="hidden" id="id_usuario" name="id_usuario" />
    				<div class="form-group">
    					<label class="form-label" for="nombre_usuario">Nombre</label>
    					<input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Ingrese un nombre" required />
    				</div>
    				<div class="form-group">
    					<label class="form-label" for="apellido_usuario">Apellido</label>
    					<input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" placeholder="Ingrese un apellido" required />
    				</div>
    				<div class="form-group">
    					<label class="form-label" for="email">Correo electronico</label>
    					<input type="email" class="form-control" id="correo" name="correo" placeholder="example@gmail.com" required />
    				</div>
    				<div class="form-group">
    					<label class="form-label" for="id_usuario">Documento de Identidad</label>
    					<input type="email" class="form-control" id="id_usuario" name="id_usuario" placeholder="0000000000" required />
    				</div>
    				<div class="form-group">
    					<label class="form-label" for="password">Contraseña</label>
    					<input type="text" class="form-control" id="password" name="password" placeholder="**********" required />
    				</div>
    				<div class="form-group">
                        <label class="form-label" for="id_rol">Rol</label>
                        <select class="select2" id="id_rol" name="id_rol">
                            <option value="1">Usuario</option>
                            <option value="2">Administrador</option>
                            <option value="3">Recolector</option>
                        </select>
                    </div>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
    				<button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
    			</div>
			</form>
		</div>
	</div>
</div>