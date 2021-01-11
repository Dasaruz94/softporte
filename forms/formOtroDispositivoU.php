<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 20/07/15
 * Time: 02:54 PM
 */


SESSION_START();
if (isset($_SESSION['nombre'])) {

    if ($_SESSION['tipo_usuario'] == 1) {


        include '../libs/conexion.php';


        $tablaDeMysql = "otro_equipo"; //Define el nombre de la tabla donde estan los datos

        $consulta = "SELECT * FROM " . $tablaDeMysql . " WHERE id_otro_equipo LIKE '" . $_GET['id'] . "'";

        $resultado = $mysqli->query($consulta);


//Checamos si se lleno el campo de usuario en el formulario


        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


        if ($total == 1) {

            while ($row = mysqli_fetch_row($resultado)) {
                $idempresa = $row[1];
                $contrato = $row[2];
                $tipo = $row[3];
                $usuario = $row[4];
                $area = $row[5];
                $marca = $row[6];
                $modelo = $row[7];
                $numeroserie = $row[8];
                $capacidad = $row[9];
                $calCapacidad = $row[10];
                $observaciones = $row[11];


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
            Modificar impresora
        </header>
        <div class="panel-body">
        <div class="form">
        <form class="form-validate form-horizontal " id="register_form" method="post"
              action="../controllers/updateOtroDispositivo.php?a=update&id=<?php echo $_GET['id'] ?>&id2=<?php echo $_GET['id2'] ?>">

        <div class="form-group">
            <label for="tipo" class="control-label col-lg-2">Contrato <span
                    class="required">*</span></label>

            <div class="col-lg-10">

                <select class="form-control m-bot15" id="tipo" name="contrato">
                    <?php
                    if($contrato == 3){
                        ?>
                        <option value="">Sin contrato</option>
                    <?php }else{
                        include '../libs/conexion.php';

                        $tablaDeMysql = "contrato"; //Define el nombre de la tabla donde estan los datos


                        //Checamos si se lleno el campo de usuario en el formulario


                        $consulta2 = "SELECT * FROM " . $tablaDeMysql . " WHERE activo LIKE 1 AND id_contrato LIKE ".$contrato."";
                        $resultado2 = $mysqli->query($consulta2);

                        while ($row2 = mysqli_fetch_row($resultado2)) {
                            ?>
                            <option
                                value="<?php echo $row2[0] ?>"><?php echo $row2[2] ?></option>

                        <?php }}  ?>



                    <?php


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

                    <option
                        value="<?php echo $tipo ?>"><?php echo $tipo ?></option>
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
                       required value="<?php echo $usuario; ?>" onfocus="if(this.value=='<?php echo $usuario; ?>')this.value=''"/>
            </div>
        </div>
        <div class="form-group ">
            <label for="fullname" class="control-label col-lg-2">Area <span
                    class="required">*</span></label>

            <div class="col-lg-10">
                <input class=" form-control" id="fullname" name="area"
                       type="text" value="<?php echo $area; ?>" onfocus="if(this.value=='<?php echo $area; ?>')this.value=''"/>
            </div>
        </div>

        <div class="form-group ">
            <label for="fullname" class="control-label col-lg-2">Marca <span
                    class="required">*</span></label>

            <div class="col-lg-10">
                <input class=" form-control" id="fullname" name="marca"
                       type="text" value="<?php echo $marca; ?>" onfocus="if(this.value=='<?php echo $marca; ?>')this.value=''"/>
            </div>
        </div>
        <div class="form-group ">
            <label for="fullname" class="control-label col-lg-2">Modelo <span
                    class="required">*</span></label>

            <div class="col-lg-10">
                <input class=" form-control" id="fullname" name="modelo"
                       type="text" value="<?php echo $modelo; ?>" onfocus="if(this.value=='<?php echo $modelo; ?>')this.value=''"/>
            </div>
        </div>
        <div class="form-group ">
            <label for="fullname" class="control-label col-lg-2">Numero serie <span
                    class="required">*</span></label>

            <div class="col-lg-10">
                <input class=" form-control" id="fullname" name="numero_serie"
                       type="text" value="<?php echo $numeroserie; ?>" onfocus="if(this.value=='<?php echo $numeroserie; ?>')this.value=''"/>
            </div>
        </div>
        <div class="form-group">
            <label for="tipo" class="control-label col-lg-2">Capacidad <span
                    class="required">*</span></label>

            <div class="col-lg-10">
                <input class=" form-control" id="fullname" name="capacidad"
                       type="text" value="<?php echo $capacidad; ?>" onfocus="if(this.value=='<?php echo $capacidad; ?>')this.value=''"/>
            </div>
        </div>
        <div class="form-group ">
            <label for="fullname" class="control-label col-lg-2">Calificacion capacidad <span
                    class="required">*</span></label>

            <div class="col-lg-10">
                <input class=" form-control" id="fullname" name="cal_capacidad"
                       type="text" value="<?php echo $calCapacidad; ?>" onfocus="if(this.value=='<?php echo $calCapacidad; ?>')this.value=''"/>
            </div
        </div>

        <div class="form-group ">
            <label for="fullname" class="control-label col-lg-2">Observaciones <span
                    class="required">*</span></label>

            <div class="col-lg-10">
                <input class=" form-control" id="fullname" name="observaciones"
                       type="text" value="<?php echo $observaciones; ?>" onfocus="if(this.value=='<?php echo $observaciones; ?>')this.value=''"/>
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
