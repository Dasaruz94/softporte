<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 22/07/15
 * Time: 01:03 PM
 */


SESSION_START();
if(isset($_SESSION['nombre'])) {

    if($_SESSION['tipo_usuario']== 1){


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
                                    Agregar Programa sin licencia
                                </header>
                                <div class="panel-body">
                                    <div class="form">
                                        <form class="form-validate form-horizontal " id="register_form" method="post" action="../controllers/updateNLicencia.php?a=add">
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Programa <span class="required">*</span></label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="nombre" name="nombre" type="text"/><br>
                                                    <div id="Info"></div>
                                                </div>
                                            </div>

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

        SESSION_UNSET();

        SESSION_DESTROY();
        header('Location: ../index.php?e=error1');
        echo 'El usuario no es correcto';
    }
}else{

    header('Location: ../index.php?e=error');
    echo 'El usuario no es correcto';
}

?>
