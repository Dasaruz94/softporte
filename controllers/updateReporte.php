<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 20/08/15
 * Time: 04:30 PM
 */

date_default_timezone_set('America/Mexico_City');

SESSION_START();

include '../libs/conexion.php';


if($_GET['a'] == 'add'){

    $consulta2 = "SELECT * FROM empresa WHERE rfc LIKE '".$_POST['rfc']."'";
    $resultado2 = $mysqli->query($consulta2);

    while ($row2=mysqli_fetch_row($resultado2))
    {

        $idEmp = $row2[0];
        $emailEmp = $row2[14];
        $nomEmp = $row2[1];


    }



    $sql = "INSERT INTO reporte (id_empresa,solicita,usuario,area,equipo,situacion_reporte,fecha_creacion,tipo_status,activo) VALUES ('".$idEmp."', '".$_POST['solicita']."', '".$_POST['usuario']."','".$_POST['area']."','".$_POST['equipo']."','".$_POST['situacion_reporte']."','".date('Y-m-d h:i:s')."','1','1')";

    if($emailEmp != ''){

        $destino = $emailEmp;
        $desde = 'soporte@compuhardware.com.mx';
        $asunto = 'Reporte';
        $mensaje = 'Hemos recibido tú reporte, muy pronto nos comunicaremos. Compu Hardware';

        @mail($destino,$asunto,$mensaje,$desde);

        $destino = 'soporte@compuhardware.com.mx';
        $desde = 'soporte@compuhardware.com.mx';
        $asunto = 'Reporte';
        $mensaje = 'La empresa '.$nomEmp.' ha enviado un reporte';

        @mail($destino,$asunto,$mensaje,$desde);



    }else{
        $destino = 'soporte@compuhardware.com.mx';
        $desde = 'soporte@compuhardware.com.mx';
        $asunto = 'Reporte';
        $mensaje = 'La empresa '.$nomEmp.' ha enviado un reporte';

        @mail($destino,$asunto,$mensaje,$desde);
    }


    if (mysqli_query($mysqli, $sql)) {
        header('Location: ../mensaje.php');
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

    $sql = 'UPDATE reporte SET hora_inicio="'.date('Y-m-d h:i:s').'",persona_modificacion="'.$_SESSION['id'].'", fecha_modificacion="'.date('Y-m-d h:i:s').'" WHERE id_reporte="'.$_GET['id'].'"';


    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/reportes.php?e=iniciar');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}

if($_GET['a'] == 'detener'){

    $sql = 'UPDATE reporte SET hora_fin="'.date('Y-m-d h:i:s').'",persona_modificacion="'.$_SESSION['id'].'", fecha_modificacion="'.date('Y-m-d h:i:s').'", tipo_status = "3" WHERE id_reporte="'.$_GET['id'].'"';


    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/reportes.php?e=terminar');
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