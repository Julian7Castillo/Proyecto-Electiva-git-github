<?php 

class User extends Connect
{
    /*
     * Funcion para guardar los datos del usuario en variables de SESSION que servira
     * para mantener esa data mientras el usuario se encuentra logeado y nos ayude a realizar
     * funciones correspondientes a lo largo de su uso. Por medio de los metodos $_POST recibimos
     * la data que viene del formulario de login para guardarlos en variables y validar la consulta
     * para luego guardarlas en las variables de session.
     */
    public function login()
    {
        $conectar = parent::connection();
        parent::set_names();
        
        //Se valida si viene vacio o no, cuando se oprime el button de subimit (El boton de iniciar sesión)
        if(isset($_POST['submit'])){
            $documento  = $_POST['id_usuario'];
            $clave      = $_POST['clave'];
            $rol_id     = $_POST['id_rol'];
            
            if(empty($documento) AND empty($clave)){
                header("Location:".connect::route()."index.php?m=2");
                exit;
            }else{
                $sql = "
                    SELECT * FROM
                        usuarios
                    WHERE
                        id_usuario = ? AND clave = ? AND id_rol = ?
                ";
                
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $documento);
                $stmt->bindValue(2, $clave);
                $stmt->bindValue(3, $rol_id);
                $stmt->execute();
                $result = $stmt->fetch();
                
                if(is_array($result) && count($result) > 0){
                    $_SESSION['id_usuario']       = $result['id_usuario'];
                    $_SESSION['nombre_usuario']   = $result['nombre_usuario'];
                    $_SESSION['apellido_usuario'] = $result['apellido_usuario'];
                    $_SESSION['direccion']        = $result['direccion'];
                    $_SESSION['rol_id']           = $result['id_rol'];
                    header("Location:".connect::route()."view/home/");
                    exit;
                }else{
                    header("Location:".connect::route()."index.php?m=1");
                    exit;
                }
            }
        }
    }
}

?>