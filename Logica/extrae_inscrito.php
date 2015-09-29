<?php
$etnia = $_POST['etnia'];
require_once 'config.php';
require_once 'funciones_bd.php';
$db = new funciones_bd();
        if ($db->inf_indig_exist($etnia)) {
            //$resultado[]=array("logstatus"=>"0");
            $result = mysql_query("SELECT * FROM indigenas WHERE etnia = '$etnia'");
            $myarray = array();
            while($tabla = mysql_fetch_assoc($result)){
                $myarray[] = $tabla;
            }
        }else{
           $myarray[]=array("logstatus"=>"2");
        }
        //echo json_encode($resultado);
        echo json_encode($myarray);
?>