<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 22/07/15
 * Time: 01:04 PM
 */


date_default_timezone_set('America/Mexico_City');

SESSION_START();

include '../libs/conexion.php';


if($_GET['a'] == 'add'){

    $sql = "INSERT INTO catalogo_sin_licencia (nombre,persona_creacion,fecha_creacion,persona_modificacion,fecha_modificacion,activo) VALUES ('".$_POST['nombre']."','".$_SESSION['id']."','".date('Y-m-d h:i:s')."','".$_SESSION['id']."','".date('Y-m-d h:i:s')."','1')";

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/catalogo_programa.php?e=add');
    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }


}

if($_GET['a'] == 'delete'){

    $sql = 'UPDATE catalogo_sin_licencia SET persona_modificacion="'.$_SESSION['id'].'", fecha_modificacion="'.date('Y-m-d h:i:s').'", activo = "0" WHERE id_catalogo_sin_licencia="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/catalogo_programa.php?e=deleted');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}

if($_GET['a'] == 'update'){

    $sql = 'UPDATE catalogo_sin_licencia SET nombre="'.$_POST['nombre'].'", persona_modificacion="'.$_SESSION['id'].'", fecha_modificacion="'.date('Y-m-d h:i:s').'" WHERE id_catalogo_sin_licencia="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/catalogo_programa.php?e=updated');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}



