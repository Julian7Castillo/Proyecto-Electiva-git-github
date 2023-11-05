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
            $documento  = $_POST['documento'];
            $clave      = $_POST['clave'];
            
            if(empty($documento) AND empty($clave)){
                header("Location:".connect::route()."index.php?m=2");
                exit;
            }else{
                $sql = "
                    SELECT * FROM
                        usuarios
                    WHERE
                        documento = ? AND clave = ?
                ";
                
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $documento);
                $stmt->bindValue(2, $clave);
                $stmt->execute();
                $result = $stmt->fetch();
                
                if(is_array($result) && count($result) > 0){
                    $_SESSION['id_usuario']       = $result['id_usuario'];
                    $_SESSION['nombre_usuario']   = $result['nombre_usuario'];
                    $_SESSION['apellido_usuario'] = $result['apellido_usuario'];
                    $_SESSION['documento']        = $result['documento'];
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
    /*
     * Funcion para insertar/registrar usuarios por medio de un formulario
     */
    public function insertUser($nombre_usuario, $apellido_usuario, $direccion, $celular, $correo, $clave, $id_rol, $documento)
    {
        $conectar = parent::connection();
        parent::set_names();
        
        $sql = '
            INSERT INTO
                usuarios (id_rol, nombre_usuario, apellido_usuario, direccion, documento, celular, correo, clave, creado)
            VALUES
                (?, ?, ?, ?, ?, ?, ?, ?, now())
        ';
        
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $id_rol);
        $stmt->bindValue(2, $nombre_usuario);
        $stmt->bindValue(3, $apellido_usuario);
        $stmt->bindValue(4, $direccion);
        $stmt->bindValue(5, $documento);
        $stmt->bindValue(6, $celular);
        $stmt->bindValue(7, $correo);
        $stmt->bindValue(8, $clave);
        $stmt->execute();
        
        return $result = $stmt->fetchAll();
    }
    /*
     * Funcion para actualizar registros de usuarios
     */
    public function updateUser($id_usuario, $nombre_usuario, $apellido_usuario, $direccion, $celular, $correo, $clave, $id_rol, $documento)
    {
        $conectar = parent::connection();
        parent::set_names();
        
        $sql = '
            UPDATE
                usuarios
            SET
                nombre_usuario   = ?,
                apellido_usuario = ?,
                direccion        = ?,
                celular          = ?,
                correo           = ?,
                clave            = ?,
                id_rol           = ?,
                documento        = ?
            WHERE
                id_usuario = ? AND activo = 1
        ';
        
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $nombre_usuario);
        $stmt->bindValue(2, $apellido_usuario);
        $stmt->bindValue(3, $direccion);
        $stmt->bindValue(4, $celular);
        $stmt->bindValue(5, $correo);
        $stmt->bindValue(6, $clave);
        $stmt->bindValue(7, $id_rol);
        $stmt->bindValue(8, $documento);
        $stmt->bindValue(9, $id_usuario);
        $stmt->execute();
        
        return $result = $stmt->fetchAll();
    }
    /*
     * Funcion para traer todos los ususarios registrados hasta el momento
     */
    public function getUser()
    {
        $conectar = parent::connection();
        parent::set_names();
        
        $sql = "
            SELECT
                *
            FROM
                usuarios
            WHERE
                activo = 1
        ";
        
        $stmt = $conectar->prepare($sql);
        $stmt->execute();
        
        return $result = $stmt->fetchAll();
    }
    /*
     * Funcion para traer los usuarios mediante el ID del usuario
     */
    public function getUserById($id_usuario)
    {
        $conectar = parent::connection();
        parent::set_names();
        
        $sql = "
            SELECT
                *
            FROM
                usuarios
            WHERE   
                id_usuario = ?
        ";
        
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $id_usuario);
        $stmt->execute();
        
        return $result = $stmt->fetchAll();
    }
    /*
     * Funcion para eliminar totalmente registros de usuarios existentes por medio de su ID
     */
    public function deleteUserById($id_usuario)
    {
        $conectar = parent::connection();
        parent::set_names();
        
        $sql = '
            UPDATE
                usuarios
            SET
                activo = 0
            WHERE
                id_usuario = ?
        ';
        
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $id_usuario);
        $stmt->execute();
        
        return $result = $stmt->fetchAll();
    }
}

?>