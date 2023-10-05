<?php 
session_start();

class Connect
{
    protected $dbh;
    
    protected function connection()
    {
        try{
            $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=lecheriadb", "root", "");
            return $conectar;
        }catch(Exception $e){
            print "¡Error BD!: ". $e->getMessage(). "<br>";
            die();
        }
    }
    
    public function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
    
    public function route()
    {
        return "http://localhost/ProyectosUniversidad/Proyecto-Electiva-git-github/";
    }
}
?>