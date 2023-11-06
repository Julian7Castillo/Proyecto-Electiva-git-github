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
        }else{
            $user->updateUser($_POST['id_usuario'], $_POST['nombre_usuario'], $_POST['apellido_usuario'], $_POST['direccion'], $_POST['celular'], $_POST['correo'], $_POST['clave'], $_POST['id_rol'], $_POST['documento']);
            $_SESSION['nombre_usuario']   = $_POST['nombre_usuario'];
            $_SESSION['apellido_usuario'] = $_POST['apellido_usuario'];
            $_SESSION['documento']        = $_POST['documento'];
            $_SESSION['direccion']        = $_POST['direccion'];
            $_SESSION['correo']           = $_POST['correo'];
            $_SESSION['rol_id']           = $_POST['id_rol'];
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
            if($row['id_rol'] == 1){
                $sub_array[] = '<span class="label label-pill label-success">Administrador</span>';
            }elseif($row['id_rol' == 2]){
                $sub_array[] = '<span class="label label-pill label-success">Recolector</span>';
            }else{
                $sub_array[] = '<span class="label label-pill label-success">Cliente</span>';
            }
            
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
    /*
     * Es para listar/obtener los usuarios que existen registrados en el sistema.
     * Pero debe mostrar el usuario por medio de su identificador unico
     */
    case 'listUserById':
        $datos = $user->getUserById($_POST['id_usuario']);
        
        if(is_array($datos) AND count($datos) > 0){
            foreach($datos as $row){
                $output['id_usuario']       = $row['id_usuario'];
                $output['nombre_usuario']   = $row['nombre_usuario'];
                $output['apellido_usuario'] = $row['apellido_usuario'];
                $output['correo']           = $row['correo'];
                $output['documento']        = $row['documento'];
                $output['celular']          = $row['celular'];
                $output['direccion']        = $row['direccion'];
                $output['clave']            = $row['clave'];
                $output['id_rol']           = $row['id_rol'];
            }
            echo json_encode($output);
        }
        break;
    /*
     * Eliminar un usuario por medio de su identificador unico
     */
    case 'deleteUserById':
        $user->deleteUserById($_POST['id_usuario']);
        break;
    /*
     * Actualizar clave de un usuario por medio de su identificador y clave
     */
    case 'updatePassword':
        $user->updateUserPassword($_POST['id_usuario'], $_POST['clave']);
        break;
}

?>