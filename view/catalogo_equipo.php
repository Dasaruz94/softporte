<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 17/07/15
 * Time: 12:58 PM
 */


SESSION_START();
if (isset($_SESSION['nombre'])) {



?>
<!DOCTYPE html>
<html lang="en">
<html lang="es">


<?php
include 'header.php';

?>



<body>

<!-- container section start -->
<section id="container" class="">
<!--header start-->

<?php
include 'menu.php';
?>
<!--sidebar end-->
<script type="text/javascript" src="search.js"></script>
<!--main content start-->
<section id="main-content">

<section class="wrapper">
<?php
if (@$_GET['e'] == 'add') {

    ?>
    <div class="alert alert-info fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
        </button>
        <strong>Felicitaciones!</strong>El equipo se ha añadido correctamente.
    </div>
<?php
}
?>

<?php
if (@$_GET['e'] == 'deleted') {

    ?>
    <div class="alert alert-info fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
        </button>
        <strong>Felicitaciones!</strong> El equipo se ha borrado correctamente.
    </div>
<?php
}
?>

<?php
if (@$_GET['e'] == 'updated') {

    ?>
    <div class="alert alert-info fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
        </button>
        <strong>Felicitaciones!</strong> El eqipo se ha modificado correctamente.
    </div>
<?php
}
?>
<div class="row">
    <div class="col-lg-10">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Dispositivos</h3>
        <?php
        if ($_SESSION['tipo_usuario'] == 1) {

            ?>
            <td><a class="btn btn-primary" href="../forms/formTipoDispositivo.php"> <span
                        class="icon_plus"></span> Agregar Dispositivo</a></td>

        <?php
        }
        ?>
    </div>
</div>
<br>
<!-- page start-->

<?php include '../libs/conexion.php';

$tablaDeMysql = "tipo_dispositivo"; //Define el nombre de la tabla donde estan los datos


//Checamos si se lleno el campo de usuario en el formulario


$consulta = "SELECT * FROM " . $tablaDeMysql . " WHERE activo LIKE 1";
$resultado = $mysqli->query($consulta);
?>

<form>

    Buscar <input id="searchTerm" type="text" onkeyup="doSearch()"/>

</form>

<table id="datos" class="table table-striped table-advance table-hover">
    <tbody>
    <tr>
        <th><i class="icon_profile"></i>Dispositivo</th>

        <?php
        if ($_SESSION['tipo_usuario'] == 1) {

            ?>
            <th><i class="icon_pencil"></i> Editar/borrar</th>
        <?php
        }
        ?>
    </tr>
    <?php


    // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


    while ($row = mysqli_fetch_row($resultado)) {


        ?>
        <tr>
            <td><?php echo $row[1]; ?></td>

            <?php
            if ($_SESSION['tipo_usuario'] == 1) {

                ?>

                <td>
                    <div class="btn-group">
                        <a class="btn btn-primary"
                           onclick="location='../forms/formTipoDispositivoU.php?id=<?php echo $row[0] ?>'"><i
                                class="icon_pencil-edit"></i></a>
                        <a class="btn btn-danger"
                           onclick="location='../controllers/updateTipoDispositivo.php?a=delete&id=<?php echo $row[0] ?>'"><i
                                class="icon_trash_alt"></i></a>


                    </div>
                </td>

            <?php


            }
            ?>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>

<div class="row">
    <div class="col-lg-10">
        <h3 class="page-header"><i class="fa fa fa-bars"></i>Impresoras</h3>
        <?php
        if ($_SESSION['tipo_usuario'] == 1) {

            ?>
            <td><a class="btn btn-primary" href="../forms/formTipoImpresora.php"> <span
                        class="icon_plus"></span> Agregar Impresora</a></td>

        <?php
        }
        ?>
    </div>
</div>
<br>
<!-- page start-->

<?php include '../libs/conexion.php';

$tablaDeMysql = "tipo_impresora"; //Define el nombre de la tabla donde estan los datos


//Checamos si se lleno el campo de usuario en el formulario


$consulta = "SELECT * FROM " . $tablaDeMysql . " WHERE activo LIKE 1";
$resultado = $mysqli->query($consulta);
?>

<form>

    Buscar <input id="searchTerm" type="text" onkeyup="doSearch1()"/>

</form>

<table id="datos1" class="table table-striped table-advance table-hover">
    <tbody>
    <tr>
        <th><i class="icon_profile"></i>Impresora</th>

        <?php
        if ($_SESSION['tipo_usuario'] == 1) {

            ?>
            <th><i class="icon_pencil"></i> Editar/borrar</th>
        <?php
        }
        ?>
    </tr>
    <?php


    // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


    while ($row = mysqli_fetch_row($resultado)) {


        ?>
        <tr>
            <td><?php echo $row[1]; ?></td>

            <?php
            if ($_SESSION['tipo_usuario'] == 1) {

                ?>

                <td>
                    <div class="btn-group">
                        <a class="btn btn-primary"
                           onclick="location='../forms/formTipoImpresoraU.php?id=<?php echo $row[0] ?>'"><i
                                class="icon_pencil-edit"></i></a>
                        <a class="btn btn-danger"
                           onclick="location='../controllers/updateTipoImpresora.php?a=delete&id=<?php echo $row[0] ?>'"><i
                                class="icon_trash_alt"></i></a>


                    </div>
                </td>

            <?php


            }
            ?>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>

<div class="row">
    <div class="col-lg-10">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Otros Dispositivos</h3>
        <?php
        if ($_SESSION['tipo_usuario'] == 1) {

            ?>
            <td><a class="btn btn-primary" href="../forms/formTipoOtroDispositivo.php"> <span
                        class="icon_plus"></span> Agregar Otro Dispositivo</a></td>

        <?php
        }
        ?>
    </div>
</div>
<br>
<!-- page start-->

<?php include '../libs/conexion.php';

$tablaDeMysql = "tipo_otro_dispositivo"; //Define el nombre de la tabla donde estan los datos


//Checamos si se lleno el campo de usuario en el formulario


$consulta = "SELECT * FROM " . $tablaDeMysql . " WHERE activo LIKE 1";
$resultado = $mysqli->query($consulta);
?>

<form>

    Buscar <input id="searchTerm" type="text" onkeyup="doSearch2()"/>

</form>

<table id="datos2" class="table table-striped table-advance table-hover">
    <tbody>
    <tr>
        <th><i class="icon_profile"></i>Otro Dispositivo</th>

        <?php
        if ($_SESSION['tipo_usuario'] == 1) {

            ?>
            <th><i class="icon_pencil"></i> Editar/borrar</th>
        <?php
        }
        ?>
    </tr>
    <?php


    // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


    while ($row = mysqli_fetch_row($resultado)) {


        ?>
        <tr>
            <td><?php echo $row[1]; ?></td>

            <?php
            if ($_SESSION['tipo_usuario'] == 1) {

                ?>

                <td>
                    <div class="btn-group">
                        <a class="btn btn-primary"
                           onclick="location='../forms/formTipoOtroDispositivoU.php?id=<?php echo $row[0] ?>'"><i
                                class="icon_pencil-edit"></i></a>
                        <a class="btn btn-danger"
                           onclick="location='../controllers/updateOtroTipoDispositivo.php?a=delete&id=<?php echo $row[0] ?>'"><i
                                class="icon_trash_alt"></i></a>


                    </div>
                </td>

            <?php


            }
            ?>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
<!-- page end-->
</section>
</section>
<!--main content end-->
</section>
<!-- container section end -->
<!-- javascripts -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
<!--custome script for all page-->
<script src="../js/scripts.js"></script>


</body>
</html>

<?php

} else {

    header('Location: ../index.php?e=error');
    echo 'El usuario no es correcto';
}
?>
