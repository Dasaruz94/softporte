<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 16/07/15
 * Time: 11:25 AM
 */


SESSION_START();
if (isset($_SESSION['nombre'])) {

    if ($_SESSION['tipo_usuario'] == 1) {


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
                                    Agregar empresa
                                </header>
                                <div class="panel-body">
                                    <div class="form">
                                        <form class="form-validate form-horizontal " id="register_form" method="post"
                                              action="../controllers/updateEmpresa.php?a=add">
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Empresa <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="fullname" name="empresa"
                                                           type="text" required/>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">RFC <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="fullname" name="rfc" type="text"
                                                           required/>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Contacto <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="fullname" name="contacto"
                                                           type="text"/>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Telefono <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-4">
                                                    <input class=" form-control" id="fullname" name="telefono"
                                                           type="tel"/>
                                                </div>
                                                <label for="fullname" class="control-label col-lg-2">Telefono 2 <span
                                                        class="required">*</span></label>
                                                <div class="col-lg-4">
                                                    <input class=" form-control" id="fullname" name="telefono2"
                                                           type="tel"/>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Pais <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-4">
                                                    <input class=" form-control" id="fullname" name="pais"
                                                           type="text"/>
                                                </div>
                                                <label for="fullname" class="control-label col-lg-2">Estado <span
                                                        class="required">*</span></label>
                                                <div class="col-lg-4">
                                                    <input class=" form-control" id="fullname" name="estado"
                                                           type="text"/>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Ciudad <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-4">
                                                    <input class=" form-control" id="fullname" name="ciudad"
                                                           type="text"/>
                                                </div>
                                                <label for="fullname" class="control-label col-lg-2">Colonia <span
                                                        class="required">*</span></label>
                                                <div class="col-lg-4">
                                                    <input class=" form-control" id="fullname" name="colonia"
                                                           type="text"/>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">no exterior <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-3">
                                                    <input class=" form-control" id="fullname" name="no_ext"
                                                           type="text" required=""/>
                                                </div>
                                                <label for="fullname" class="control-label col-lg-1">No interior <span
                                                        class="required">*</span></label>
                                                <div class="col-lg-3">
                                                    <input class=" form-control" id="fullname" name="no_int"
                                                           type="text"/>
                                                </div>
                                                <label for="fullname" class="control-label col-lg-1">CP <span
                                                        class="required">*</span></label>
                                                <div class="col-lg-2">
                                                    <input class=" form-control" id="fullname" name="cp"
                                                           type="text"/>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Calle <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="fullname" name="calle" type="text"
                                                           required=""/>
                                                </div>
                                            </div>



                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Email <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="fullname" name="email"
                                                           type="email"/>
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

                                                        // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


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
