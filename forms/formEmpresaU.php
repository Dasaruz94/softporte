<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 16/07/15
 * Time: 12:10 PM
 */



SESSION_START();
if (isset($_SESSION['nombre'])) {

    if ($_SESSION['tipo_usuario'] == 1) {

        include '../libs/conexion.php';


        $tablaDeMysql = "empresa"; //Define el nombre de la tabla donde estan los datos

        $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE id_empresa LIKE '".$_GET['id']."'";

        $resultado = $mysqli->query($consulta);



//Checamos si se lleno el campo de usuario en el formulario



        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado



        if($total == 1){

            while ($row=mysqli_fetch_row($resultado))
            {
                $empresa = $row[1];
                $rfc = $row[2];
                $contacto = $row[3];
                $telefono = $row[4];
                $email = $row[5];
                $asesor = $row[6];



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
                                    Modificar empresa <?php echo $empresa; ?>
                                </header>
                                <div class="panel-body">
                                    <div class="form">
                                        <form class="form-validate form-horizontal " id="register_form" method="post"
                                              action="../controllers/updateEmpresa.php?a=update&id=<?php echo $_GET['id'] ?>">
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Empresa <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="fullname" name="empresa"
                                                           type="text" required value="<?php echo $empresa; ?>" onfocus="if(this.value=='<?php echo $empresa; ?>')this.value=''" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">RFC <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="fullname" name="rfc" type="text"
                                                           required value="<?php echo $rfc; ?>" onfocus="if(this.value=='<?php echo $rfc; ?>')this.value=''" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Contacto <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="fullname" name="contacto"
                                                           type="text" value="<?php echo $contacto; ?>" onfocus="if(this.value=='<?php echo $contacto; ?>')this.value=''" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Telefono <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="fullname" name="telefono"
                                                           type="tel" value="<?php echo $telefono; ?>" onfocus="if(this.value=='<?php echo $telefono; ?>')this.value=''" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Email <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="fullname" name="email"
                                                           type="email" value="<?php echo $email; ?>" onfocus="if(this.value=='<?php echo $email; ?>')this.value=''" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="tipo" class="control-label col-lg-2">Asesor tecnico <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <select class="form-control m-bot15" id="tipo" name="asesor_tecnico"
                                                            required>

                                                        <?php
                                                        include '../libs/conexion.php';

                                                        $tablaDeMysql = "usuario"; //Define el nombre de la tabla donde estan los datos


                                                        //Checamos si se lleno el campo de usuario en el formulario


                                                        $consulta = "SELECT * FROM " . $tablaDeMysql . " WHERE activo LIKE 1 ";
                                                        $resultado = $mysqli->query($consulta);

                                                        $consulta2 = "SELECT * FROM " . $tablaDeMysql . ' WHERE id_usuario LIKE '.$asesor."";
                                                        $resultado2 = $mysqli->query($consulta2);

                                                        // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado
                                                        while ($row2 = mysqli_fetch_row($resultado2)) {

                                                           ?>
                                                            <option
                                                                value="<?php echo $row2[0] ?>"><?php echo $row2[1] ?></option>
                                                            <?php
                                                        }

                                                        while ($row = mysqli_fetch_row($resultado)) {
                                                            ?>
                                                            <option
                                                                value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>

                                                        <?php } ?>
                                                    </select>
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
