<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 17/07/15
 * Time: 01:21 PM
 */

date_default_timezone_set('America/Mexico_City');

SESSION_START();

include '../libs/conexion.php';


if($_GET['a'] == 'add'){

    $sql = "INSERT INTO tipo_dispositivo (tipo,persona_creacion,fecha_creacion,persona_modificacion,fecha_modificacion,activo) VALUES ('".$_POST['tipo']."','".$_SESSION['id']."','".date('Y-m-d h:i:s')."','".$_SESSION['id']."','".date('Y-m-d h:i:s')."','1')";

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/catalogo_equipo.php?e=add');
    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }


}

if($_GET['a'] == 'delete'){

    $sql = 'UPDATE tipo_dispositivo SET persona_modificacion="'.$_SESSION['id'].'", fecha_modificacion="'.date('Y-m-d h:i:s').'", activo = "0" WHERE id_tipo_dispositivo="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/catalogo_equipo.php?e=deleted');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}

if($_GET['a'] == 'update'){

    $sql = 'UPDATE tipo_dispositivo SET tipo="'.$_POST['tipo'].'", persona_modificacion="'.$_SESSION['id'].'", fecha_modificacion="'.date('Y-m-d h:i:s').'" WHERE id_tipo_dispositivo="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/catalogo_equipo.php?e=updated');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}



