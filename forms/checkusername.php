<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 17/07/15
 * Time: 11:09 AM
 */

sleep(1);
include('../libs/conexion.php');
if($_REQUEST){

    $username 	= $_REQUEST['nombre'];
    $tablaDeMysql = "empresa"; //Define el nombre de la tabla donde estan los datos

    $consulta = "select * from usuario where nombre = '".strtolower($username)."'";

    $resultado = $mysqli->query($consulta);

    if(mysqli_num_rows($resultado) > 0) // not available
    {
        echo '<div id="Error">Usuario ya existente</div>';
    }
    else
    {
        echo '<div id="Success">Disponible</div>';
    }


}