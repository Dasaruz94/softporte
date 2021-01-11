<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 17/07/15
 * Time: 12:11 AM
 */


SESSION_START();
if (isset($_SESSION['nombre'])) {

    if ($_SESSION['tipo_usuario'] == 1) {

        include '../libs/conexion.php';


        $tablaDeMysql = "contrato"; //Define el nombre de la tabla donde estan los datos

        $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE id_contrato LIKE '".$_GET['id']."'";

        $resultado = $mysqli->query($consulta);



//Checamos si se lleno el campo de usuario en el formulario



        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado



        if($total == 1){

            while ($row=mysqli_fetch_row($resultado))
            {
                $id = $row[0];
                $id_empresa = $row[1];
                $descripcion = $row[2];
                $fecha_inicio = $row[3];
                $fecha_fin = $row[4];


            }

        }


        $tablaDeMysql = "empresa"; //Define el nombre de la tabla donde estan los datos

        $consulta2 = "SELECT * FROM ".$tablaDeMysql." WHERE id_empresa LIKE '".$id_empresa."'";

        $resultado2 = $mysqli->query($consulta2);

        while ($row2=mysqli_fetch_row($resultado2))
        {
            $empresa = $row2[1];

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
                                    Modificar contrato de  <?php echo $empresa; ?>
                                </header>
                                <div class="panel-body">
                                    <div class="form">
                                        <form class="form-validate form-horizontal " id="register_form" method="post"
                                              action="../controllers/updateContrato.php?a=update&id=<?php echo $_GET['id'] ?>&id2=<?php echo $id_empresa; ?>">
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Descripcion <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">

                                                    <textarea name="descripcion" rows="10" cols="40" required><?php echo $descripcion ?></textarea>

                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Fecha de inicio<span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <input type="date" class="form-control" name="fecha_inicio" required value="<?php echo $fecha_inicio; ?>" onfocus="if(this.value=='<?php echo $fecha_inicio; ?>')this.value=''">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Fecha de fin<span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">

                                                    <input type="date" class="form-control" name="fecha_fin"  required value="<?php echo $fecha_fin; ?>" onfocus="if(this.value=='<?php echo $fecha_fin; ?>')this.value=''">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-primary" type="submit">Modificar</button>

                                                </div>
                                            </div>
                                        </form>
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
