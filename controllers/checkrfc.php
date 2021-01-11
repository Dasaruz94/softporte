<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 20/08/15
 * Time: 12:23 PM
 */


sleep(1);
include('../libs/conexion.php');
if($_REQUEST){

    $rfc = $_REQUEST['rfc'];


    $consulta = "select * from empresa where rfc = '".strtolower($rfc)."'";

    $resultado = $mysqli->query($consulta);

    if(mysqli_num_rows($resultado) > 0) // not available
    {
        echo '<div id="Success">La empresa esta registrada correctamente</div>';
    }
    else
    {
               echo '<div id="Error">El rfc es incorrecto o la empresa no esta registrada</div>';
    }


}

?>