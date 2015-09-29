<?php
 class funciones_BD {
    private $db;
     // constructor
    function __construct() {
        require_once 'connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    // destructor
    function __destruct() {
    }

    public function addCurso($curso,$nombre,$cedula,$email,$celular,$direccion,$ciudad){
    $result = mysql_query("INSERT INTO inscritos(curso,nombre,cedula,email,celular,direccion,ciudad) VALUES('$curso','$nombre','$cedula','$email','$celular','$direccion','$ciudad')");
        // check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
     
     
     
     }
?>