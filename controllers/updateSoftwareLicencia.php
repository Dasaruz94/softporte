<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 23/07/15
 * Time: 12:18 PM
 */


date_default_timezone_set('America/Mexico_City');

SESSION_START();

include '../libs/conexion.php';


if($_POST['programa'] != ""){
    if($_POST['cal'] != ""){
        if(is_array($_POST['programa'])){
            if(is_array($_POST['cal'])){

                if($_GET['a'] == 'add'){

                    for ($i = 0; $i <= count($_POST['cal']); $i++) {

                        if(@$_POST['programa'][$i] != ""){


                            $sql = "INSERT INTO software_licencia (id_dispositivo,nombre,calificacion,persona_creacion,fecha_creacion,persona_modificacion,fecha_modificacion,activo) VALUES ('".$_GET['id']."','".$_POST['programa'][$i]."','".$_POST['cal'][$i]."','".$_SESSION['id']."','".date('Y-m-d h:i:s')."','".$_SESSION['id']."','".date('Y-m-d h:i:s')."','1')";



                            mysqli_query($mysqli, $sql);
                        }


                    }
                    header('Location: ../view/software.php?e=add&id='.$_GET['id'].'&id2='.$_GET['id2']);

                }
            }

        }
    }
}


if($_GET['a'] == 'delete'){

    $sql = 'UPDATE software_licencia SET persona_modificacion="'.$_SESSION['id'].'", fecha_modificacion="'.date('Y-m-d h:i:s').'", activo = "0" WHERE id_software_licencia="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/software.php?e=deleted&id='.$_GET['id3'].'&id2='.$_GET['id2']);
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);



}




