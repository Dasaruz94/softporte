<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 17/07/15
 * Time: 01:31 PM
 */


SESSION_START();

if(isset($_SESSION['nombre'])) {
    include '../libs/conexion.php';


    $tablaDeMysql = "tipo_otro_dispositivo"; //Define el nombre de la tabla donde estan los datos

    $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE id_tipo_otro_dispositivo LIKE '".$_GET['id']."'";

    $resultado = $mysqli->query($consulta);



//Checamos si se lleno el campo de usuario en el formulario



    $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado



    if($total == 1){

        while ($row=mysqli_fetch_row($resultado))
        {
            $tipo = $row[1];



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
                                Actualizar datos
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="form-validate form-horizontal " id="register_form" method="post" action="../controllers/updateOtroTipoDispositivo.php?a=update&id=<?php echo $_GET['id'] ?>">
                                        <div class="form-group ">
                                            <label for="fullname" class="control-label col-lg-2">tipo <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input class=" form-control" id="fullname" name="tipo" type="text" value="<?php echo $tipo; ?>" onfocus="if(this.value=='<?php echo $tipo; ?>')this.value=''" />
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-primary" type="submit">Cambiar</button>

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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>


    </body>
    </html>

<?php
}else{
    header('Location: index.php?e=error');
    echo 'El usuario no es correcto';
}

?>


