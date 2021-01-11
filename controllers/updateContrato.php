<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 17/07/15
 * Time: 12:18 AM
 */

date_default_timezone_set('America/Mexico_City');

SESSION_START();

include '../libs/conexion.php';


if($_GET['a'] == 'add'){

    $sql = "INSERT INTO contrato (id_empresa,descripcion,fecha_inicio,fecha_fin,persona_creacion,fecha_creacion,persona_modificacion,fecha_modificacion,activo) VALUES ('".$_GET['id']."', '".$_POST['descripcion']."', '".$_POST['fecha_inicio']."', '".$_POST['fecha_fin']."','".$_SESSION['id']."','".date('Y-m-d h:i:s')."','".$_SESSION['id']."','".date('Y-m-d h:i:s')."','1')";


 if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/contratos.php?e=add&id='.$_GET['id'].'');
    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }


}

if($_GET['a'] == 'delete'){

    $sql = 'UPDATE contrato SET persona_modificacion="'.$_SESSION['id'].'", fecha_modificacion="'.date('Y-m-d h:i:s').'", activo = "0" WHERE id_contrato="'.$_GET['id'].'"';


    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/contratos.php?e=deleted&id='.$_GET['id2'].'');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}

if($_GET['a'] == 'update'){

    $sql = 'UPDATE contrato SET descripcion="'.$_POST['descripcion'].'",fecha_inicio="'.$_POST['fecha_inicio'].'",fecha_fin="'.$_POST['fecha_fin'].'", persona_modificacion="'.$_SESSION['id'].'", fecha_modificacion="'.date('Y-m-d h:i:s').'" WHERE id_contrato="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/contratos.php?e=updated&id='.$_GET['id2'].'');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}



