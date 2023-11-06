function init()
{
	
}

$(document).ready(function(){
	let id_usuario = $('#user_idx').val();
	$.post("../../controller/userController.php?op=listUserById", { id_usuario : id_usuario}, function(data) {
    	data = JSON.parse(data);
    	$('#id_usuario').val(data.id_usuario);
    	$('#nombre_usuario').val(data.nombre_usuario);
    	$('#apellido_usuario').val(data.apellido_usuario);
    	$('#correo').val(data.correo);
    	$('#documento').val(data.documento);
    	$('#celular').val(data.celular);
    	$('#direccion').val(data.direccion);
    	$('#id_rol').val(data.id_rol).trigger('change');
    });
});

$('#user_perfil').on("submit", function(e){
	e.preventDefault();
	var formData = new FormData($('#user_perfil')[0]);

    // Validar si alguno de los campos esta vacio
    var camposVacios = false;

    formData.forEach(function(value, key) {
        if (value === "") {
            camposVacios = true;
            return false; // Sale del bucle forEach si encuentra un campo vacio (excepto id_usuario)
        }
    });
    
	if (camposVacios) {
        swal("Error!", "Campos vacíos", "error");
    } else {
        var claveNueva = formData.get('claveNueva');
        var clave = formData.get('clave');
        if (claveNueva === clave) {
			formData.delete('claveNueva');
            $.ajax({
				url: "../../controller/userController.php?op=insertOrUpdate",
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				success: function(data){
		        	location.reload();
				}
			});
        } else {
            swal("Error!", "Las claves no coinciden", "error");
        }
    }
});

init();