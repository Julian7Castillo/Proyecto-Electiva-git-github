<?php 

class Ruta extends Connect
{
    /*
     * Funcion para insertar/registrar rutas por medio de un formulario
     */
    public function insertRuta($sector, $descripcion, $latitud, $longitud)
    {
        $conectar = parent::connection();
        parent::set_names();
        
        $sql = '
            INSERT INTO
                rutas (sector, descripcion, latitud, longitud, creado)
            VALUES
                (?, ?, ?, ?,now())
        ';
        
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $sector);
        $stmt->bindValue(2, $descripcion);
        $stmt->bindValue(3, $latitud);
        $stmt->bindValue(4, $longitud);
        $stmt->execute();
        
        return $result = $stmt->fetchAll();
    }
    /*
     * Funcion para traer todas las rutas registradas hasta el momento
     */
    public function getRuta()
    {
        $conectar = parent::connection();
        parent::set_names();
        
        $sql = "
            SELECT
                *
            FROM
                rutas
            WHERE
                activo = 1
        ";
        
        $stmt = $conectar->prepare($sql);
        $stmt->execute();
        
        return $result = $stmt->fetchAll();
    }
    /*
     * Funcion para traer las rutas mediante el ID de la ruta
     */
    public function getRutaById($id_ruta)
    {
        $conectar = parent::connection();
        parent::set_names();
        
        $sql = "
            SELECT
                *
            FROM
                rutas
            WHERE
                id_ruta = ?
        ";
        
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $id_ruta);
        $stmt->execute();
        
        return $result = $stmt->fetchAll();
    }
    /*
     * Función para traer los registros de tickets, categorias y usuarios
     * @params user_id
     */
    public function listRutaById($id_ruta)
    {
        $conectar = parent::connection();
        parent::set_names();
        
        $sql = "
            SELECT
                id_ruta,
                sector,
                descripcion,
                latitud,
                longitud
            FROM
                rutas
            WHERE
                activo = 1 AND id_ruta = ?
        ";
        
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_ruta);
        $sql->execute();
        
        return $result = $sql->fetchAll();
    }
    /*
     * Funcion para eliminar totalmente registros de usuarios existentes por medio de su ID
     */
    public function deleteRutaById($id_ruta)
    {
        $conectar = parent::connection();
        parent::set_names();
        
        $sql = '
            UPDATE
                rutas
            SET
                activo = 0
            WHERE
                id_ruta = ?
        ';
        
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $id_ruta);
        $stmt->execute();
        
        return $result = $stmt->fetchAll();
    }
}

?>