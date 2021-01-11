<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 10/07/15
 * Time: 03:33 PM
 */
SESSION_START();

include '../libs/conexion.php';

if($_GET['a'] == 'updateS'){

    $sql = 'UPDATE usuario SET nombre="'.$_POST['nombre'].'", contrasena="'.$_POST['password'].'" WHERE id_usuario="'.$_SESSION['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../usuario.php?e=update');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}
if($_GET['a'] == 'add'){

    $sql = "INSERT INTO usuario (nombre,contrasena,tipo_usuario,activo) VALUES ('".$_POST['nombre']."', '".$_POST['password']."', '".$_POST['tipo_usuario']."', '1')";

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/usuarios.php?e=add');
    } else {
        echo "Error add record: " . mysqli_error($mysqli);
    }


}

if($_GET['a'] == 'delete'){

    $sql = 'UPDATE usuario SET activo="0" WHERE id_usuario="'.$_GET['id'].'"';

    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/usuarios.php?e=deleted');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}

if($_GET['a'] == 'update'){

    if($_GET['tipo'] == 1){

        $sql = 'UPDATE usuario SET tipo_usuario="2" WHERE id_usuario="'.$_GET['id'].'"';
    }else{
        $sql = 'UPDATE usuario SET tipo_usuario="1" WHERE id_usuario="'.$_GET['id'].'"';
    }


    if (mysqli_query($mysqli, $sql)) {

        header('Location: ../view/usuarios.php?e=updated');
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

}



