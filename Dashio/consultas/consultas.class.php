<?php
//header('Content-Type: application/json');
require_once "config_db.php";
class DbModelo{
    public $_db;
    public function __construct(){
        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ( $this->_db->connect_errno ){
            echo "Fallo al conectar a MySQL: ". $this->_db->connect_error;
            return;
        }
        $this->_db->set_charset("utf8");
    }
    public function get_tabla($q){
        $r = $this->_db->query($q); // HACER LA CONSULTA
        //$datos = $r->fetch_assoc();
        return $r;
    }
}
?>