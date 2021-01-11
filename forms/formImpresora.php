<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 20/07/15
 * Time: 01:20 PM
 */


SESSION_START();
if (isset($_SESSION['nombre'])) {

    if ($_SESSION['tipo_usuario'] == 1) {


        include '../libs/conexion.php';


        $tablaDeMysql = "empresa"; //Define el nombre de la tabla donde estan los datos

        $consulta = "SELECT * FROM " . $tablaDeMysql . " WHERE id_empresa LIKE '" . $_GET['id'] . "'";

        $resultado = $mysqli->query($consulta);


//Checamos si se lleno el campo de usuario en el formulario


        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


        if ($total == 1) {

            while ($row = mysqli_fetch_row($resultado)) {

                $empresa = $row[1];

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
            Agregar impresora de <?php echo $empresa ?>
        </header>
        <div class="panel-body">
            <div class="form">
                <form class="form-validate form-horizontal " id="register_form" method="post"
                      action="../controllers/updateImpresora.php?a=add&id=<?php echo $_GET['id'] ?>">

                    <div class="form-group">
                        <label for="tipo" class="control-label col-lg-2">Contrato <span
                                class="required">*</span></label>

                        <div class="col-lg-10">
                            <select class="form-control m-bot15" id="tipo" name="contrato">
                                <option value="">Sin contrato</option>

                                <?php
                                include '../libs/conexion.php';

                                $tablaDeMysql = "contrato"; //Define el nombre de la tabla donde estan los datos


                                //Checamos si se lleno el campo de usuario en el formulario


                                $consulta = "SELECT * FROM " . $tablaDeMysql . " WHERE activo LIKE 1 AND id_empresa LIKE ".$_GET['id']."";
                                $resultado = $mysqli->query($consulta);

                                // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


                                while ($row = mysqli_fetch_row($resultado)) {
                                    ?>
                                    <option
                                        value="<?php echo $row[0] ?>"><?php echo $row[2] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipo" class="control-label col-lg-2">Tipo de dispositivo <span
                                class="required">*</span></label>

                        <div class="col-lg-10">
                            <select class="form-control m-bot15" id="tipo" name="tipo" required>


                                <?php
                                include '../libs/conexion.php';

                                $tablaDeMysql = "tipo_impresora"; //Define el nombre de la tabla donde estan los datos


                                //Checamos si se lleno el campo de usuario en el formulario


                                $consulta = "SELECT * FROM " . $tablaDeMysql . " WHERE activo LIKE 1";
                                $resultado = $mysqli->query($consulta);

                                // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


                                while ($row = mysqli_fetch_row($resultado)) {
                                    ?>
                                    <option
                                        value="<?php echo $row[1] ?>"><?php echo $row[1] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="fullname" class="control-label col-lg-2">Usuario<span
                                class="required">*</span></label>

                        <div class="col-lg-10">
                            <input class=" form-control" id="usuario" name="usuario" type="text"
                                   required/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="fullname" class="control-label col-lg-2">Area <span
                                class="required">*</span></label>

                        <div class="col-lg-10">
                            <input class=" form-control" id="fullname" name="area"
                                   type="text"/>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="fullname" class="control-label col-lg-2">Marca <span
                                class="required">*</span></label>

                        <div class="col-lg-10">
                            <input class=" form-control" id="fullname" name="marca"
                                   type="text"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="fullname" class="control-label col-lg-2">Modelo <span
                                class="required">*</span></label>

                        <div class="col-lg-10">
                            <input class=" form-control" id="fullname" name="modelo"
                                   type="text"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="fullname" class="control-label col-lg-2">Numero serie <span
                                class="required">*</span></label>

                        <div class="col-lg-10">
                            <input class=" form-control" id="fullname" name="numero_serie"
                                   type="text"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipo" class="control-label col-lg-2">Tipo de material <span
                                class="required">*</span></label>

                        <div class="col-lg-10">
                            <select class="form-control m-bot15" id="tipo" name="material" required>

                                    <option
                                        value="1">Tinta</option>
                                <option
                                    value="2">Toner</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="fullname" class="control-label col-lg-2">Numero tinta o toner <span
                                class="required">*</span></label>

                        <div class="col-lg-10">
                            <input class=" form-control" id="fullname" name="numero_material"
                                   type="text"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipo" class="control-label col-lg-2">Multifuncional <span
                                class="required">*</span></label>

                        <div class="col-lg-10">
                            <select class="form-control m-bot15" id="tipo" name="multifuncional" required>

                                <option
                                    value="1">Si</option>
                                <option
                                    value="2">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipo" class="control-label col-lg-2">Monocromatica <span
                                class="required">*</span></label>

                        <div class="col-lg-10">
                            <select class="form-control m-bot15" id="tipo" name="monocromatica" required>

                                <option
                                    value="1">Si</option>
                                <option
                                    value="2">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="fullname" class="control-label col-lg-2">Color <span
                                class="required">*</span></label>

                        <div class="col-lg-10">
                            <input class=" form-control" id="fullname" name="color_monocromatica"
                                   type="text"/>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="fullname" class="control-label col-lg-2">Observaciones <span
                                class="required">*</span></label>

                        <div class="col-lg-10">
                            <input class=" form-control" id="fullname" name="observaciones"
                                   type="text"/>
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
