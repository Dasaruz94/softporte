<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 11/09/15
 * Time: 10:54 AM
 */

date_default_timezone_set('America/Mexico_City');

SESSION_START();

include '../libs/conexion.php';


if($_GET['a'] == 'add'){

    $sql = "INSERT INTO tarea (id_reporte,id_usuario,descripcion,asigna,fecha_creacion,fecha_modificacion,activo) VALUES ('".$_GET['id']."', '".$_POST['id_usuario']."', '".$_POST['descripcion']."','".$_SESSION['nombre']."','".date('Y-m-d h:i:s')."','".date('Y-m-d h:i:s')."','1')";

    if (mysqli_query($mysqli, $sql)) {
        header('Location: ../view/reportes.php?e=addTask');
    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }
}


if($_GET['a'] == 'delete'){

    $sql = 'UPDATE reporte SET persona_modificacion="'.$_SESSION['id'].'", fecha_modificacion="'.date('Y-m-d h:i:s').'", activo = "0" WHERE id_reporte="'.$_GET['id'].'"';


    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/empresas.php?e=deleted');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
}

if($_GET['a'] == 'iniciar'){

    $sql = 'UPDATE tarea SET fecha_inicio="'.date('Y-m-d h:i:s').'", fecha_modificacion="'.date('Y-m-d h:i:s').'" WHERE id_tarea="'.$_GET['id'].'"';


    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/tarea.php?e=iniciar');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}

if($_GET['a'] == 'detener'){

    $sql = 'UPDATE tarea SET fecha_fin="'.date('Y-m-d h:i:s').'", fecha_modificacion="'.date('Y-m-d h:i:s').'" WHERE id_tarea="'.$_GET['id'].'"';


    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/tarea.php?e=terminar');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}



if($_GET['a'] == 'update2'){

    $sql = 'UPDATE reporte SET tipo_equipo="'.$_POST['tipo_equipo'].'",  marca="'.$_POST['marca'].'", modelo="'.$_POST['modelo'].'",no_serie="'.$_POST['no_serie'].'",diagnostico="'.$_POST['diagnostico'].'",status_equipo="'.$_POST['status_equipo'].'",acciones_realizar="'.$_POST['acciones_realizar'].'",acciones_realizadas="'.$_POST['acciones_realizadas'].'", persona_modificacion="'.$_SESSION['id'].'" WHERE id_reporte="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/reportes.php?e=updated');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}

if($_GET['a'] == 'update'){

    $sql = 'UPDATE reporte SET tipo_status="'.$_POST['tipo_status'].'",tipo_reporte="'.$_POST['tipo_reporte'].'",num_factura="'.$_POST['num_factura'].'",encargado="'.$_POST['encargado'].'", tipo_equipo="'.$_POST['tipo_equipo'].'", marca="'.$_POST['marca'].'", modelo="'.$_POST['modelo'].'",no_serie="'.$_POST['no_serie'].'",diagnostico="'.$_POST['diagnostico'].'",status_equipo="'.$_POST['status_equipo'].'",acciones_realizar="'.$_POST['acciones_realizar'].'",acciones_realizadas="'.$_POST['acciones_realizadas'].'", persona_modificacion="'.$_SESSION['id'].'", fecha_modificacion="'.date('Y-m-d h:i:s').'" WHERE id_reporte="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/reportes.php?e=updated');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}
?>