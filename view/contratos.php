<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 16/07/15
 * Time: 03:18 PM
 */


SESSION_START();
if(isset($_SESSION['nombre'])) {


include '../libs/conexion.php';

$tablaDeMysql = "empresa"; //Define el nombre de la tabla donde estan los datos


//Checamos si se lleno el campo de usuario en el formulario


$consulta = "SELECT * FROM ".$tablaDeMysql." WHERE id_empresa LIKE ".$_GET['id']."";
$resultado = $mysqli->query($consulta);

// $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


while ($row=mysqli_fetch_row($resultado))
{
    $idEmpresa = $row[0];
    $empresa = $row[1];
}

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
            <?php
            if(@$_GET['e']== 'add')
            {

                ?>
                <div class="alert alert-info fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Felicitaciones!</strong>El contrato se ha añadido correctamente.
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
                    <strong>Felicitaciones!</strong> El contrato se ha borrado correctamente.
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
                    <strong>Felicitaciones!</strong> El contrato se ha modificado correctamente.
                </div>
            <?php
            }
            ?>
            <div class="row">
                <div class="col-lg-10">
                    <h3 class="page-header"><i class="fa fa fa-bars"></i> Contratos de <?php echo $empresa;?></h3>
                    <?php
                    if($_SESSION['tipo_usuario'] == 1){

                        ?>
                        <td><a class="btn btn-primary" href="../forms/formContrato.php?id=<?php echo $_GET['id'] ?>"> <span class="icon_plus"></span> Agregar contrato</a></td>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <br>
            <!-- page start-->

            <?php include '../libs/conexion.php';

            $tablaDeMysql = "contrato"; //Define el nombre de la tabla donde estan los datos


            //Checamos si se lleno el campo de usuario en el formulario


            $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE activo LIKE 1 AND id_empresa LIKE ".$_GET['id']."";
            $resultado = $mysqli->query($consulta);
            ?>

            <form>

                Buscar <input id="searchTerm" type="text" onkeyup="doSearch()" />

            </form>

            <table id="datos" class="table table-striped table-advance table-hover">
                <tbody>
                <tr>
                    <th><i class="icon_profile"></i> Descripción</th>
                    <th><i class="icon_clock"></i> Tiempo restante</th>

                    <?php
                    if($_SESSION['tipo_usuario'] == 1){

                        ?>
                        <th><i class="icon_pencil"></i> Editar/borrar</th>
                    <?php
                    }
                    ?>
                </tr>
                <?php

                while ($row=mysqli_fetch_row($resultado))
                {
                    ?>
                    <tr>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php

                            $datetime1 = new DateTime($row[3]);
                            $datetime2 = new DateTime($row[4]);
                            $interval = date_diff($datetime1, $datetime2);
                            echo $interval->format('%R%a días');


                            ?></td>


                        <?php
                        if($_SESSION['tipo_usuario'] == 1){

                            ?>

                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" onclick="location='../forms/formContratoU.php?id=<?php echo $row[0] ?>'"><i class="icon_pencil-edit"></i></a>
                                    <a class="btn btn-danger" onclick="location='../controllers/updateContrato.php?a=delete&id=<?php echo $row[0] ?>&id2=<?php echo $idEmpresa; ?>'"><i class="icon_trash_alt"></i></a>

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
