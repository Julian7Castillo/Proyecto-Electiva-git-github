<div id="modalMntRuta" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labellebdy="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="model-close" data-dismiss="modal" aria-label="Close">
					<i class="font-icon-close-2"></i>
				</button>
				<h4 class="modal-title" id="mdltitulo"></h4>
			</div>
			<form method="post" id="ruta_form">
    			<div class="modal-body">
    				<input type="hidden" id="id_ruta" name="id_ruta" />
    				<div class="form-group">
    					<label class="form-label" for="sector">Sector</label>
    					<input type="text" class="form-control" id="sector" name="sector" placeholder="Ingrese un sector" required />
    				</div>
    				<div class="form-group">
    					<label class="form-label" for="descripcion">Descripcion</label>
    					<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripcion" required />
    				</div>
    				<div class="form-group">
    					<label class="form-label" for="latitud">Latitud</label>
    					<input type="text" class="form-control" id="latitud" name="latitud" placeholder="0.00000" required />
    				</div>
    				<div class="form-group">
    					<label class="form-label" for="longitud">Longitud</label>
    					<input type="text" class="form-control" id="longitud" name="longitud" placeholder="0.00000" required />
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