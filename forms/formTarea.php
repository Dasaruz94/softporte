<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 19/09/15
 * Time: 10:35 AM
 */

SESSION_START();
if (isset($_SESSION['nombre'])) {

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php
    include '../view/header.php';
    ?>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

    <body>
    <!-- container section start -->
    <section id="container" class="">
    <!--header start-->

    <?php
    include '../view/menu.php';
    ?>

    <section id="main-content">
    <section class="wrapper">

    <!-- page start-->
    <div class="row">
    <div class="col-lg-12">
    <section class="panel">
    <div class="panel-body">
    <div class="form">
    <form class="form-validate form-horizontal " id="register_form" method="post"
          action="">

        <div class="form-group">
            <label for="tipo" class="control-label col-lg-2">Ingeniero asignado<span
                    class="required">*</span></label>

            <div class="col-lg-10">
                <select class="form-control m-bot15" id="tipo" name="id_usuario"
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



    <div class="form-group ">
        <label for="fullname" class="control-label col-lg-2">Descripción tarea<span
                class="required">*</span></label>

        <div class="col-lg-10">
            <textarea name="descripcion" rows="10" cols="40"></textarea>
        </div>
    </div>




            <div class="col-lg-offset-1 col-lg-4">
                <button class="btn btn-primary" type="button" onclick="this.form.action='../controllers/updateTarea.php?a=add&id=<?php echo $_GET['id'] ?>';this.form.submit();">Crear</button>
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

}else {
    header('Location: ../index.php?e=error');
    echo 'El usuario no es correcto';
}

?>
