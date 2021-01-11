<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 02/09/15
 * Time: 03:48 PM
 */


SESSION_START();
if(isset($_SESSION['nombre'])) {



?>
<!DOCTYPE html>
<html lang="en">
<html lang="es">


<?php
include 'header.php';
?>
<script language="javascript">

    function doSearch()

    {

        var tableReg = document.getElementById('datos');

        var searchText = document.getElementById('searchTerm').value.toLowerCase();

        var cellsOfRow="";

        var found=false;

        var compareWith="";



        // Recorremos todas las filas con contenido de la tabla

        for (var i = 1; i < tableReg.rows.length; i++)

        {

            cellsOfRow = tableReg.rows[i].getElementsByTagName('td');

            found = false;

            // Recorremos todas las celdas

            for (var j = 0; j < cellsOfRow.length && !found; j++)

            {

                compareWith = cellsOfRow[j].innerHTML.toLowerCase();

                // Buscamos el texto en el contenido de la celda

                if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))

                {

                    found = true;

                }

            }

            if(found)

            {

                tableReg.rows[i].style.display = '';

            } else {

                // si no ha encontrado ninguna coincidencia, esconde la

                // fila de la tabla

                tableReg.rows[i].style.display = 'none';

            }

        }

    }

</script>




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
    <div class="row">
        <div class="col-lg-10">
            <?php
            if(@$_GET['e']== 'iniciar')
            {

                ?>
                <div class="alert alert-info fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Felicitaciones!</strong> La tarea se ha dado de alta.
                </div>
            <?php
            }
            ?>

            <?php
            if(@$_GET['e']== 'terminar')
            {

                ?>
                <div class="alert alert-info fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Felicitaciones!</strong> El servicio de reporte se ha detenido.
                </div>
            <?php
            }
            ?>

            <?php
            if(@$_GET['e']== 'deleted')
            {

                ?>
                <div class="alert alert-info fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Felicitaciones!</strong> La empresa se ha borrado correctamente.
                </div>
            <?php
            }
            ?>

            <?php
            if(@$_GET['e']== 'updated')
            {

                ?>

                <div class="alert alert-info fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Felicitaciones!</strong> El reporte se ha modificado correctamente.
                </div>
            <?php
            }

            ?>
        </div>
    </div>
</section>

<section class="wrapper">

    <div class="row">
        <div class="col-lg-10">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> Tareas Pendientes </h3>

        </div>
    </div>
    <br>
    <!-- page start-->

    <?php include '../libs/conexion.php';

    ?>

    <form>

        Buscar <input id="searchTerm" type="text" onkeyup="doSearch()" />

    </form>

    <table id="datos" class="table table-striped table-advance table-hover">
        <tbody>
        <tr>
            <th><i class="icon_profile"></i> No reporte</th>
            <th><i class="icon_creditcard"></i> Empresa</th>
            <th><i class="icon_creditcard"></i> Solicita</th>
            <th><i class="icon_creditcard"></i> Descripcion</th>
            <th><i class="icon_creditcard"></i> Fecha Peticion </th>
            <th><i class="icon_pencil"></i> Iniciar-Terminar</th>

        </tr>
        <?php
        include '../libs/conexion.php';

        $tablaDeMysql = "tarea"; //Define el nombre de la tabla donde estan los datos


        //Checamos si se lleno el campo de usuario en el formulario


            $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE activo LIKE 1 AND id_usuario LIKE ".$_SESSION['id']."";



        $resultado = $mysqli->query($consulta);

        // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


        while ($row=mysqli_fetch_row($resultado))
        {

            $consulta2 = "SELECT * FROM reporte WHERE id_reporte LIKE ".$row[1]."";
            $resultado2 = $mysqli->query($consulta2);

            while ($row2=mysqli_fetch_row($resultado2))
            {
                $idRep = $row2[0];
                $idEmp = $row2[1];


            }

            $consulta3 = "SELECT nombre FROM usuario WHERE id_usuario LIKE ".$row[2]."";
            $resultado3 = $mysqli->query($consulta3);

            while ($row3=@mysqli_fetch_row($resultado3))
            {


                if($row3[0] == ''){
                    $asesor = 'No asignado aún';
                }else{
                    $asesor = $row3[0];
                }
            }

            $consulta4 = "SELECT empresa FROM empresa WHERE id_empresa LIKE ".$idEmp."";
            $resultado4 = $mysqli->query($consulta4);
            while ($row4=mysqli_fetch_row($resultado4))
            {
                $emp = $row4[0];


            }


            ?>
            <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $emp; ?></td>
                <td><?php echo $asesor; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[7]; ?></td>





                <?php
                if($_SESSION['tipo_usuario'] == 1){

                    ?>
                    <td>
                        <div class="btn-group">

                            <a class="btn btn-primary" onclick="location='../forms/formReporte.php?id=<?php echo $row[0]; ?>"><i class="icon_pencil-edit"></i></a>
                            <a class="btn btn-danger" onclick="location='../controllers/updateEmpresa.php?a=delete&id=<?php echo $row[0] ?>'"><i class="icon_trash_alt"></i></a>


                            <a class="btn btn-info" onclick="location='../controllers/impReporte.php?id=<?php echo $row[0] ?>'"><i class="icon_documents"></i></a>
                        </div>
                    </td>

                <?php
                } else{
                    ?>

                    <td>
                        <div class="btn-group">
                            <?php
                            if($row[4] == ''){

                                ?>
                                <a class="btn btn-danger" style="background-color: green; border-color: green;" onclick="location='../controllers/updateTarea.php?a=iniciar&id=<?php echo $row[0] ?>'"><i class="icon_clock_alt" style="background-color: green; border-color: green;"> </i></a>


                            <?php
                            }else{
                            if($row[5] == ''){
                                ?>

                                <a class="btn btn-danger" onclick="location='../controllers/updateTarea.php?a=detener&id=<?php echo $row[0] ?>'"><i class="icon_stop"></i></a>

                            <?php
                            }else{
                                echo 'terminado';
                            }
                            }
                            ?>

                        </div>
                    </td>

                <?php
                } ?>


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
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
<script src="../js/scripts.js"></script>

</body>
</html>

<?php

}else{

    header('Location: ../index.php?e=error');
    echo 'El usuario no es correcto';
}
?>
