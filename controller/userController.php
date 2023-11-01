<?php 

require_once("../config/connection.php");
require_once("../model/User.php");

$user = new User();

switch($_GET['op'])
{
    /*
     * Insertar o actualizar el registro de un usuario. Dependiendo si existe o no el usuario
     * se tomara un flujo
     */
    case 'insertOrUpdate':
        if(empty($_POST['id_usuario'])){
            $user->insertUser($_POST['nombre_usuario'], $_POST['apellido_usuario'], $_POST['direccion'], $_POST['celular'], $_POST['correo'], $_POST['clave'], $_POST['id_rol'], $_POST['documento']);
        }
    break;
}

?>