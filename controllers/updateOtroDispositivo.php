<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 20/07/15
 * Time: 02:48 PM
 */

date_default_timezone_set('America/Mexico_City');
SESSION_START();

include '../libs/conexion.php';


if($_GET['a'] == 'add'){

    if($_POST['contrato'] == ''){
        $contrato = 3;
    }
    else{
        $contrato = $_POST['contrato'];
    }

    $sql = "INSERT INTO otro_equipo (id_empresa,id_contrato,tipo,usuario,area,marca,modelo,numero_serie,capacidad,cal_capacidad,observaciones,persona_creacion,fecha_creacion,persona_modificacion,fecha_modificacion,activo) VALUES ('".$_GET['id']."', '".$contrato."', '".$_POST['tipo']."', '".$_POST['usuario']."','".$_POST['area']."','".$_POST['marca']."','".$_POST['modelo']."','".$_POST['numero_serie']."','".$_POST['capacidad']."','".$_POST['cal_capacidad']."','".$_POST['observaciones']."','".$_SESSION['id']."','".date('Y-m-d h:i:s')."','".$_SESSION['id']."','".date('Y-m-d h:i:s')."','1')";

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/equipos.php?e=add&id='.$_GET['id'].'');
    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }


}

if($_GET['a'] == 'delete'){

    $sql = 'UPDATE otro_equipo SET persona_modificacion="'.$_SESSION['id'].'", fecha_modificacion="'.date('Y-m-d h:i:s').'", activo = "0" WHERE id_otro_equipo="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/equipos.php?e=deleted&id='.$_GET['id2'].'');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}

if($_GET['a'] == 'update'){


    if($_POST['contrato'] == ''){
        $contrato = 3;
    }
    else{
        $contrato = $_POST['contrato'];
        //'".$_POST['multifuncional']."','".$_POST['monocromatica']."','".$_POST['color_monocromatica']."',
    }

    $sql = 'UPDATE otro_equipo SET  id_contrato="'.$contrato.'" , tipo="'.$_POST['tipo'].'", usuario="'.$_POST['usuario'].'", area="'.$_POST['area'].'", marca="'.$_POST['marca'].'", modelo="'.$_POST['modelo'].'", numero_serie="'.$_POST['numero_serie'].'", capacidad="'.$_POST['capacidad'].'", cal_capacidad="'.$_POST['cal_capacidad'].'", observaciones="'.$_POST['observaciones'].'" , persona_modificacion="'.$_SESSION['id'].'", fecha_modificacion="'.date('Y-m-d h:i:s').'" WHERE id_otro_equipo="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/equipos.php?e=updated&id='.$_GET['id2'].'');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}



