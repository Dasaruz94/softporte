<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 22/07/15
 * Time: 02:59 PM
 */



SESSION_START();
if(isset($_SESSION['nombre'])) {


include '../libs/conexion.php';



?>
<!DOCTYPE html>
<html lang="en">
<html lang="es">


<?php
include 'header.php';
?>
<script type="text/javascript" src="search.js"></script>


<body>

<!-- container section start -->
<section id="container" class="">
<!--header start-->

<?php
include 'menu.php';
?>
<!--sidebar end-->

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
        <strong>Felicitaciones!</strong>El programa se ha añadido correctamente.
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
        <strong>Felicitaciones!</strong> El programa se ha borrado correctamente.
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
        <strong>Felicitaciones!</strong> El programa se ha modificado correctamente.
    </div>
<?php
}
?>
<div class="row">
    <div class="col-lg-10">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Con licencia</h3>
        <?php
        if ($_SESSION['tipo_usuario'] == 1) {

            ?>

            <a href="empresas.php?id=<?php echo $_GET['id2']; ?>">Empresa</a>/<a href="equipos.php?id=<?php echo $_GET['id2']; ?>">Equipos</a>/ <br>


            <td><a class="btn btn-primary" href="../forms/formSoftwareLicencia.php?id=<?php echo $_GET['id']; ?>&id2=<?php echo $_GET['id2']; ?>"> <span
                        class="icon_plus"></span> Agregar Programa</a></td>
            <td><a class="btn btn-primary" href="../controllers/softwareExcel.php?id=<?php echo $_GET['id'] ?>&id2=<?php echo $_GET['id2'] ?>"> <span class="icon_document"></span> Reporte Excel</a></td>


        <?php
        }
        ?>
    </div>
</div>
<br>
<!-- page start-->

<?php include '../libs/conexion.php';

$tablaDeMysql = "software_licencia"; //Define el nombre de la tabla donde estan los datos


//Checamos si se lleno el campo de usuario en el formulario


$consulta = "SELECT * FROM ".$tablaDeMysql." WHERE id_dispositivo LIKE ".$_GET['id']." AND activo LIKE 1";


// $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


$resultado = $mysqli->query($consulta);
?>

<form>

    Buscar <input id="searchTerm" type="text" onkeyup="doSearch()"/>

</form>

<table id="datos" class="table table-striped table-advance table-hover">
    <tbody>
    <tr>
        <th><i class="icon_profile"></i>Programa</th>
        <th><i class="icon_profile"></i>Calificación</th>

        <?php
        if ($_SESSION['tipo_usuario'] == 1) {

            ?>
            <th><i class="icon_pencil"></i> Borrar</th>
        <?php
        }
        ?>
    </tr>
    <?php


    // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


    while ($row = mysqli_fetch_row($resultado)) {


        ?>
        <tr>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>

            <?php
            if ($_SESSION['tipo_usuario'] == 1) {

                ?>

                <td>
                    <div class="btn-group">

                        <a class="btn btn-danger"
                           onclick="location='../controllers/updateSoftwareLicencia.php?a=delete&id=<?php echo $row[0] ?>&id2=<?php echo $_GET['id2'];?>&id3=<?php echo $_GET['id']; ?>'"><i
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
        <h3 class="page-header"><i class="fa fa fa-bars"></i>Sin licencia</h3>
        <?php
        if ($_SESSION['tipo_usuario'] == 1) {

            ?>
            <td><a class="btn btn-primary" href="../forms/formSoftwareNLicencia.php?id=<?php echo $_GET['id']; ?>&id2=<?php echo $_GET['id2']; ?>"> <span
                        class="icon_plus"></span> Agregar Programa</a></td>


        <?php
        }
        ?>
    </div>
</div>
<br>
<!-- page start-->

<?php include '../libs/conexion.php';

$tablaDeMysql = "software_libre"; //Define el nombre de la tabla donde estan los datos


//Checamos si se lleno el campo de usuario en el formulario


$consulta = "SELECT * FROM ".$tablaDeMysql." WHERE id_dispositivo LIKE ".$_GET['id']." AND activo LIKE 1";
$resultado = $mysqli->query($consulta);
?>

<form>

    Buscar <input id="searchTerm" type="text" onkeyup="doSearch1()"/>

</form>

<table id="datos1" class="table table-striped table-advance table-hover">
    <tbody>
    <tr>
        <th><i class="icon_profile"></i>Programa</th>
        <th><i class="icon_profile"></i>Calificacion</th>

        <?php
        if ($_SESSION['tipo_usuario'] == 1) {

            ?>
            <th><i class="icon_pencil"></i> Borrar</th>
        <?php
        }
        ?>
    </tr>
    <?php


    // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


    while ($row = mysqli_fetch_row($resultado)) {


        ?>
        <tr>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>

            <?php
            if ($_SESSION['tipo_usuario'] == 1) {

                ?>

                <td>
                    <div class="btn-group">
                        <a class="btn btn-danger"
                           onclick="location='../controllers/updateSoftwareNLicencia.php?a=delete&id=<?php echo $row[0] ?>&id2=<?php echo $_GET['id2'];?>&id3=<?php echo $_GET['id']; ?>'"><i
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

}else{

    header('Location: ../index.php?e=error');
    echo 'El usuario no es correcto';
}
?>
