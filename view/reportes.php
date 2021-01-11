<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 20/08/15
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
                        <strong>Felicitaciones!</strong> El servicio de reporte se ha iniciado.
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
                if(@$_GET['e']== 'addTask')
                {

                    ?>
                    <div class="alert alert-info fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Felicitaciones!</strong> La tarea se ha agregado correctamente al reporte.
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



    <?php
    if($_SESSION['tipo_usuario'] == 1){

    ?>
        <section class="wrapper">

             <div class="row">
                <div class="col-lg-10">
                    <h3 class="page-header"><i class="fa fa fa-bars"></i> Reportes Abiertos </h3>

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
                    <th><i class="icon_creditcard"></i> Fecha pedido</th>
                    <th><i class="icon_creditcard"></i> Nombre empresa</th>
                    <th><i class="icon_creditcard"></i> Persona solicita</th>
                    <th><i class="icon_creditcard"></i> Usuario </th>
                    <th><i class="icon_creditcard"></i> Area </th>
                    <th><i class="icon_creditcard"></i> Equipo </th>
                    <th><i class="icon_creditcard"></i> Ingeniero servicio </th>

                    <?php
                    if($_SESSION['tipo_usuario'] == 1){

                        ?>
                        <th><i class="icon_pencil"></i> Editar/borrar</th>
                    <?php
                    }
                    ?>
                </tr>
                <?php
                include '../libs/conexion.php';

                $tablaDeMysql = "reporte"; //Define el nombre de la tabla donde estan los datos


                //Checamos si se lleno el campo de usuario en el formulario

                if($_SESSION['tipo_usuario'] == 2){
                    $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE activo LIKE 1 AND tipo_status LIKE 1 AND encargado LIKE ".$_SESSION['id']."";

                }else{
                    $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE activo LIKE 1 AND tipo_status LIKE 1 ";
                }
                $resultado = $mysqli->query($consulta);

                // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


                while ($row=mysqli_fetch_row($resultado))
                {




                    $consulta2 = "SELECT empresa FROM empresa WHERE id_empresa LIKE ".$row[1]."";
                    $resultado2 = $mysqli->query($consulta2);

                    while ($row2=mysqli_fetch_row($resultado2))
                    {
                        $empresa = $row2[0];

                    }

                    $consulta3 = "SELECT nombre FROM usuario WHERE id_usuario LIKE ".$row[2]."";
                    $resultado3 = $mysqli->query($consulta3);

                    $asesor = 'No asignado aún';
                    while ($row3=@mysqli_fetch_row($resultado3))
                    {


                        if($row3[0] == ''){
                            $asesor = 'No asignado aún';
                        }else{
                            $asesor = $row3[0];
                        }
                    }



                    ?>
                    <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[21]; ?></td>

                        <td><?php echo $empresa; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[5]; ?></td>
                        <td><?php echo $row[7]; ?></td>
                        <td><?php echo $asesor; ?></td>
                        <?php
                        if($_SESSION['tipo_usuario'] == 1){

                            ?>

                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" onclick="location='../forms/formReporte.php?id=<?php echo $row[0]; ?>&emp=<?php echo $empresa; ?>'"><i class="icon_pencil-edit"></i></a>
                                    <a class="btn btn-danger" onclick="location='../controllers/updateReporte.php?a=delete&id=<?php echo $row[0] ?>'"><i class="icon_trash_alt"></i></a>

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
<?php }?>
        <section class="wrapper">

            <div class="row">
                <div class="col-lg-10">
                    <h3 class="page-header"><i class="fa fa fa-bars"></i> Reportes Pendientes </h3>

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
                    <th><i class="icon_creditcard"></i> Fecha pedido</th>
                    <th><i class="icon_creditcard"></i> Nombre empresa</th>
                    <th><i class="icon_creditcard"></i> Persona solicita</th>
                    <th><i class="icon_creditcard"></i> Usuario </th>
                    <th><i class="icon_creditcard"></i> Equipo </th>
                    <th><i class="icon_creditcard"></i> Area </th>
                    <th><i class="icon_creditcard"></i> Ingeniero servicio </th>
                    <?php
                    if($_SESSION['tipo_usuario'] == 1){

                    ?>
                    <th><i class="icon_pencil"></i> Editar/Borrar/Iniciar-Terminar/Imprimir/Tarea</th>

                    <?php
                    } else{
                        ?>

                    <th><i class="icon_pencil"></i> Editar/Iniciar-Terminar/Imprimir/Tarea</th>
                        <?php
                    } ?>
                </tr>
                <?php
                include '../libs/conexion.php';

                $tablaDeMysql = "reporte"; //Define el nombre de la tabla donde estan los datos


                //Checamos si se lleno el campo de usuario en el formulario

                if($_SESSION['tipo_usuario'] == 2){
                    $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE activo LIKE 1 AND tipo_status LIKE 2 AND encargado LIKE ".$_SESSION['id']."";

                }else{
                    $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE activo LIKE 1 AND tipo_status LIKE 2 ";
                }

                $resultado = $mysqli->query($consulta);

                // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


                while ($row=mysqli_fetch_row($resultado))
                {




                    $consulta2 = "SELECT empresa FROM empresa WHERE id_empresa LIKE ".$row[1]."";
                    $resultado2 = $mysqli->query($consulta2);

                    while ($row2=mysqli_fetch_row($resultado2))
                    {
                        $empresa = $row2[0];

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


                    ?>
                    <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[21]; ?></td>

                        <td><?php echo $empresa; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[5]; ?></td>
                        <td><?php echo $row[7]; ?></td>
                        <td><?php echo $asesor; ?></td>



                        <?php
                        if($_SESSION['tipo_usuario'] == 1){

                            ?>
                            <td>
                                <div class="btn-group">

                                    <a class="btn btn-primary" onclick="location='../forms/formReporte.php?id=<?php echo $row[0]; ?>&emp=<?php echo $empresa; ?>'"><i class="icon_pencil-edit"></i></a>
                                    <a class="btn btn-danger" onclick="location='../controllers/updateEmpresa.php?a=delete&id=<?php echo $row[0] ?>'"><i class="icon_trash_alt"></i></a>
                                    <?php
                                    if($row[19] == ''){

                                        ?>
                                        <a class="btn btn-danger" style="background-color: green; border-color: green;  " onclick="location='../controllers/updateReporte.php?a=iniciar&id=<?php echo $row[0] ?>'"><i class="icon_clock_alt" style="background-color: green; border-color: green;"> </i></a>


                                    <?php
                                    }else{
                                        ?>

                                        <a class="btn btn-danger" onclick="location='../controllers/updateReporte.php?a=detener&id=<?php echo $row[0] ?>'"><i class="icon_stop"></i></a>

                                    <?php
                                    }
                                    ?>

                                    <a class="btn btn-info" onclick="location='../controllers/impReporte.php?id=<?php echo $row[0] ?>'"><i class="icon_documents"></i></a>
                                    <a class="btn btn-primary" onclick="location='../forms/formTarea.php?id=<?php echo $row[0] ?>'"><i class="icon_calendar"></i></a>

                                </div>
                            </td>

                        <?php
                        } else{
                            ?>

                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" onclick="location='../forms/formReporte.php?id=<?php echo $row[0]; ?>&emp=<?php echo $empresa; ?>'"><i class="icon_pencil-edit"></i></a>
                                    <?php
                                    if($row[19] == ''){

                                        ?>
                                        <a class="btn btn-danger" style="background-color: green; border-color: green;" onclick="location='../controllers/updateReporte.php?a=iniciar&id=<?php echo $row[0] ?>'"><i class="icon_clock_alt" style="background-color: green; border-color: green;"> </i></a>


                                    <?php
                                    }else{
                                        ?>

                                        <a class="btn btn-danger" onclick="location='../controllers/updateReporte.php?a=detener&id=<?php echo $row[0] ?>'"><i class="icon_stop"></i></a>

                                    <?php
                                    }
                                    ?>
                                    <a class="btn btn-info" onclick="location='contratos.php?id=<?php echo $row[0] ?>'"><i class="icon_documents"></i></a>
                                    <a class="btn btn-primary" onclick="location='../forms/formTarea.php?id=<?php echo $row[0] ?>'"><i class="icon_calendar"></i></a>

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


        <section class="wrapper">

            <div class="row">
                <div class="col-lg-10">
                    <h3 class="page-header"><i class="fa fa fa-bars"></i> Reportes Cerrados</h3>

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
                    <th><i class="icon_creditcard"></i> Fecha pedido</th>
                    <th><i class="icon_creditcard"></i> Nombre empresa</th>
                    <th><i class="icon_creditcard"></i> Persona solicita</th>
                    <th><i class="icon_creditcard"></i> Usuario </th>
                    <th><i class="icon_creditcard"></i> Equipo </th>
                    <th><i class="icon_creditcard"></i> Area </th>
                    <th><i class="icon_creditcard"></i> Ingeniero servicio </th>

                    <?php
                    if($_SESSION['tipo_usuario'] == 1){

                        ?>
                        <th><i class="icon_pencil"></i> Editar/Borrar/Imprimir</th>

                    <?php
                    } else{
                        ?>

                        <th><i class="icon_pencil"></i> Imprimir</th>
                    <?php
                    } ?>
                </tr>
                <?php
                include '../libs/conexion.php';

                $tablaDeMysql = "reporte"; //Define el nombre de la tabla donde estan los datos


                //Checamos si se lleno el campo de usuario en el formulario
                if($_SESSION['tipo_usuario'] == 2){
                    $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE activo LIKE 1 AND tipo_status LIKE 3 AND encargado LIKE ".$_SESSION['id']."";

                }else{
                    $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE activo LIKE 1 AND tipo_status LIKE 3 ";
                }


                $resultado = $mysqli->query($consulta);

                // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


                while ($row=mysqli_fetch_row($resultado))
                {




                    $consulta2 = "SELECT empresa FROM empresa WHERE id_empresa LIKE ".$row[1]."";
                    $resultado2 = $mysqli->query($consulta2);

                    while ($row2=mysqli_fetch_row($resultado2))
                    {
                        $empresa = $row2[0];

                    }

                    $consulta3 = "SELECT nombre FROM usuario WHERE id_usuario LIKE ".$row[2]."";
                    $resultado3 = $mysqli->query($consulta3);
                    $asesor = 'No asignado aún';
                    while ($row3=@mysqli_fetch_row($resultado3))
                    {
                        if($row3[0] == ''){
                            $asesor = 'No asignado aún';
                        }else{
                            $asesor = $row3[0];
                        }

                    }





                    ?>
                    <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[21]; ?></td>

                        <td><?php echo $empresa; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[5]; ?></td>
                        <td><?php echo $row[7]; ?></td>
                        <td><?php echo $asesor; ?></td>

                        <?php
                        if($_SESSION['tipo_usuario'] == 1){

                            ?>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" onclick="location='../forms/formReporte.php?id=<?php echo $row[0]; ?>&emp=<?php echo $empresa; ?>'"><i class="icon_pencil-edit"></i></a>
                                    <a class="btn btn-danger" onclick="location='../controllers/updateEmpresa.php?a=delete&id=<?php echo $row[0] ?>'"><i class="icon_trash_alt"></i></a>
                                    <a class="btn btn-info" onclick="location='contratos.php?id=<?php echo $row[0] ?>'"><i class="icon_documents"></i></a>
                                </div>
                            </td>

                        <?php
                        } else{
                            ?>

                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-info" onclick="location='contratos.php?id=<?php echo $row[0] ?>'"><i class="icon_documents"></i></a>
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
