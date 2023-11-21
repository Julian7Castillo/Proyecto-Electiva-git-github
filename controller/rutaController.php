<?php 

require_once("../config/connection.php");
require_once("../model/Ruta.php");

$ruta = new Ruta();

switch($_GET['op'])
{
    /*
     * Insertar o actualizar el registro de una ruta. Dependiendo si existe o no el usuario
     * se tomara un flujo
     */
    case 'insertOrUpdate':
        if(empty($_POST['id_ruta'])){
            $ruta->insertRuta($_POST['sector'], $_POST['descripcion'], $_POST['latitud'], $_POST['longitud']);
        }else{
            $ruta->updateRuta($_POST['id_ruta'], $_POST['sector'], $_POST['descripcion'], $_POST['latitud'], $_POST['longitud']);
        }
        break;
    /*
     * Es para listar/obtener las rutas que existen registrados en el sistema sin tener condiciones.
     * La unica condicion es que deben estar activos. Ademas, de dibujar una tabla para mostrar los registros
     */
    case 'listRuta':
        $datos = $ruta->getRuta();
        $data  = [];
        
        foreach($datos as $row){
            $sub_array    = [];
            $sub_array[]  = $row['sector'];
            $sub_array[]  = $row['descripcion'];
            $sub_array[]  = $row['latitud'];
            $sub_array[]  = $row['longitud'];
            
            $sub_array[] = '<button type="button" onClick="editar('.$row["id_ruta"].')"; id="'.$row['id_ruta'].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_ruta"].')"; id="'.$row['id_ruta'].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
            $sub_array[] = '<button type="button" onClick="ver('.$row["id_ruta"].')"; id="'.$row['id_ruta'].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
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
    case 'listRutaById':
        $datos = $ruta->getRutaById($_POST['id_ruta']);
        
        if(is_array($datos) AND count($datos) > 0){
            foreach($datos as $row){
                $output['id_ruta']      = $row['id_ruta'];
                $output['sector']       = $row['sector'];
                $output['descripcion']  = $row['descripcion'];
                $output['latitud']      = $row['latitud'];
                $output['longitud']     = $row['longitud'];
            }
            echo json_encode($output);
        }
        break;
    /*
     * Eliminar un usuario por medio de su identificador unico
     */
    case 'deleteRutaById':
        $ruta->deleteRutaById($_POST['id_ruta']);
        break;
    /*
     * El caso que sirve para mostrar la información de la cabecera del Detalle Ruta
     */
    case "mostrar":
        $datos = $ruta->listRutaById($_POST['id_ruta']);
        
        if(is_array($datos) == true AND count($datos) <> 0){
            foreach($datos as $row){
                $output["id_ruta"]          = $row['id_ruta'];
                $output["sector"]           = $row['sector'];
                $output["descripcion"]      = $row['descripcion'];
                $output["latitud"]          = $row['latitud'];
                $output["longitud"]         = $row['longitud'];
            }
            echo json_encode($output);
        }
        break;
}

?>