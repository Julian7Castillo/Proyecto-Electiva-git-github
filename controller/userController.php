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
    /*
     * Es para listar/obtener los usuarios que existen registrados en el sistema sin tener condiciones.
     * La unica condicion es que deben estar activos. Ademas, de dibujar una tabla para mostrar los registros
     */
    case 'listUser':
        $datos = $user->getUser();
        $data  = [];
        
        foreach($datos as $row){
            $sub_array   = [];
            $sub_array[] = $row['nombre_usuario'];
            $sub_array[] = $row['apellido_usuario'];
            $sub_array[] = $row['documento'];
            $sub_array[] = $row['clave'];
            $sub_array[] = $row['id_rol'];
            $sub_array[] = ($row['id_rol'] == 1) ? '<span class="label label-pill label-success">Usuario</span>' : '<span class="label label-pill label-success">Administrador</span>';
            
            $sub_array[] = '<button type="button" onClick="editar('.$row["id_usuario"].')"; id="'.$row['id_usuario'].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_usuario"].')"; id="'.$row['id_usuario'].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
            $data[] = $sub_array;
        }
        
        $results = [
            "sEcho"                 => 1,
            "iTotalRecords"         => count($data),
            "iTotalDisplayRecords"  => count($data),
            "aaData"                => $data
        ];
        echo json_encode($results);
        break;
}

?>