<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 22/07/15
 * Time: 03:06 PM
 */

SESSION_START();
if (isset($_SESSION['nombre'])) {

    if ($_SESSION['tipo_usuario'] == 1) {


        include '../libs/conexion.php';


        $tablaDeMysql = "dispositivo"; //Define el nombre de la tabla donde estan los datos

        $consulta = "SELECT * FROM " . $tablaDeMysql . " WHERE id_dispositivo LIKE '" . $_GET['id'] . "'";

        $resultado = $mysqli->query($consulta);


//Checamos si se lleno el campo de usuario en el formulario


        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


        if ($total == 1) {

            while ($row = mysqli_fetch_row($resultado)) {
                $usuario = $row[4];

            }

        }



        ?>
        <!DOCTYPE html>
        <html lang="en">
        <?php
        include '../view/header.php';
        ?>

        <body>
        <!-- container section start -->
        <section id="container" class="">
        <!--header start-->

        <?php
        include '../view/menu.php';
        ?>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
        <section class="wrapper">

        <!-- page start-->
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
            Agregar software con licencia para equipo de: <?php echo $usuario ?>
        </header>
        <div class="panel-body">
            <div class="form">
                <form class="form-validate form-horizontal " id="register_form" method="post"
                      action="../controllers/updateSoftwareLicencia.php?a=add&id=<?php echo $_GET['id'] ?>&id2=<?php echo $_GET['id2'] ?>">

                    <?php
                    include '../libs/conexion.php';

                    $tablaDeMysql = "catalogo_licencia"; //Define el nombre de la tabla donde estan los datos


                    //Checamos si se lleno el campo de usuario en el formulario


                    $consulta = "SELECT * FROM " . $tablaDeMysql . " WHERE activo LIKE 1";
                    $resultado = $mysqli->query($consulta);

                    // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado
                    $i = 0;

                    while ($row = mysqli_fetch_row($resultado)) {


                    ?>
                    <div class="form-group">

                        <div class="col-lg-2">
                                        <p style="text-align: right">
                                        <input type="checkbox"  name="programa[<?php echo $i; ?>]" value="<?php echo $row[1]; ?>" /> <?php echo $row[1]; ?>
                                        </p>


                        </div>

                        <div class="col-lg-2">
                            <p style="text-align: left">
                            <input class=" form-control" id="cal" name="cal[<?php echo $i; ?>]"
                                   type="text"/>
                            </p>
                        </div>

                    </div>

                        <?php $i++; } ?>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary" type="submit">Agregar</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        </section>
        </div>
        </div>
        </section>
        </div>
        </div>
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

        SESSION_UNSET();

        SESSION_DESTROY();
        header('Location: ../index.php?e=error1');
        echo 'El usuario no es correcto';
    }
} else {

    header('Location: ../index.php?e=error');
    echo 'El usuario no es correcto';
}

?>
