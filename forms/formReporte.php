<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 20/08/15
 * Time: 05:21 PM
 */


SESSION_START();
if (isset($_SESSION['nombre'])) {



        include '../libs/conexion.php';


        $tablaDeMysql = "reporte"; //Define el nombre de la tabla donde estan los datos

        $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE id_reporte LIKE '".$_GET['id']."'";

        $resultado = $mysqli->query($consulta);



//Checamos si se lleno el campo de usuario en el formulario



        $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado



        if($total == 1){

            while ($row=mysqli_fetch_row($resultado))
            {
                $encargado = $row[2];
                $solicita = $row[3];
                $usuario = $row[4];
                $area = $row[5];
                $tipoEquipo = $row[6];
                $equipo = $row[7];
                $marca = $row[8];
                $modelo = $row[9];
                $no_serie = $row[10];
                $tipoReporte = $row[11];
                $situacionReporte = $row[12];
                $diagnostico = $row[13];
                $accionesRealizadas = $row[14];
                $tipoEstatus = $row[15];
                $NumFactura = $row[16];
                $statusEquipo = $row[17];
                $accionesARealizar = $row[18];
                $horaInicio = $row[19];
                $horaFin = $row[20];
                $horaAsignacion = $row[23];


            }

        }



        ?>
        <!DOCTYPE html>
        <html lang="en">
        <?php
        include '../view/header.php';
        ?>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

        <script type="text/javascript">
            function mostrar(id) {
                if (id == 3) {
                    $("#tipo_reporte").show();
                    $("#tipo_reporteLabel").show();
                    $("#tipo_reporteForm").show();

                }

                if (id == 1) {
                    $("#tipo_reporte").hide();
                    $("#tipo_reporteLabel").hide();
                    $("#tipo_reporteForm").hide();
                }

                if (id == 2) {
                    $("#tipo_reporte").hide();
                    $("#tipo_reporteLabel").hide();
                    $("#tipo_reporteForm").hide();
                }


            }

            function mostrar2(tipo_reporte) {
                if (tipo_reporte == 1) {
                    $("#num_facturaForm").show();
                    $("#num_facturaLabel").show();
                    $("#num_factura").show();

                }

                if (tipo_reporte == 2) {
                    $("#num_facturaForm").hide();
                    $("#num_facturaLabel").hide();
                    $("#num_factura").hide();
                }

                if (tipo_reporte == 3) {
                    $("#num_facturaForm").hide();
                    $("#num_facturaLabel").hide();
                    $("#num_factura").hide();
                }
                if (tipo_reporte == 4) {
                    $("#num_facturaForm").hide();
                    $("#num_facturaLabel").hide();
                    $("#num_factura").hide();
                }
                if (tipo_reporte == 5) {
                    $("#num_facturaForm").hide();
                    $("#num_facturaLabel").hide();
                    $("#num_factura").hide();
                }
                if (tipo_reporte == 6) {
                    $("#num_facturaForm").hide();
                    $("#num_facturaLabel").hide();
                    $("#num_factura").hide();
                }


            }
        </script>
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
                                    Modificar Reporte de la empresa: <?php echo $_GET['emp']; ?>  /Fecha Asignado: <?php echo $horaAsignacion; ?>  /Hora inicio: <?php echo $horaInicio; ?>  /Hora fin: <?php echo $horaFin; ?>
                                </header>
                                <div class="panel-body">
                                    <div class="form">
                                    <form class="form-validate form-horizontal " id="register_form" method="post"
                                          action="">
<?php
if ($_SESSION['tipo_usuario'] == 1) {
?>
                                        <div class="form-group">
                                            <label for="tipo" class="control-label col-lg-2">Status.<span
                                                    class="required">*</span></label>

                                            <div class="col-lg-10">


                                                <select class="form-control m-bot15" id="tipo" name="tipo_status" onChange="mostrar(this.value);" required="">

                                                    <?php  switch ($tipoEstatus) {

                                                      case 1:
                                                            ?>
                                                            <option
                                                                value="1">Abierto</option>
                                                            <option
                                                                value="2">Pendiente</option>
                                                            <option
                                                                value="3">Cerrado</option>


                                                            <?php
                                                            break;
                                                        case 2:
                                                            ?>

                                                            <option
                                                                value="2">Pendiente</option>
                                                            <option
                                                                value="1">Abierto</option>
                                                            <option
                                                                value="3">Cerrado</option>


                                                            <?php
                                                            break;
                                                        case 3:
                                                            ?>
                                                            <option
                                                                value="3">Cerrado</option>
                                                            <option
                                                                value="2">Pendiente</option>
                                                            <option
                                                                value="1">Abierto</option>

                                                            <?php
                                                            break; } ?>

                                                </select>
                                            </div>
                                        </div>




                                        <div class="form-group" id="tipo_reporteForm" style="display: none;">
                                            <label  id="tipo_reporteLabel" class="control-label col-lg-2" style="display: none;">Tipo de reporte.<span
                                                    class="required"  >*</span></label>


                                            <div class="col-lg-10">
                                                <select class="form-control m-bot15" id="tipo_reporte" name="tipo_reporte"
                                                        required=""  style="display: none;" onChange="mostrar2(this.value);">

                                                    <?php  switch ($tipoReporte) {

                                                        case 0:
                                                            ?>
                                                            <option
                                                                value="0">No asignado</option>
                                                            <option
                                                                value="1">Por facturar</option>
                                                            <option
                                                                value="2">Reproceso</option>
                                                            <option
                                                                value="3">Cortesia</option>
                                                            <option
                                                                value="4">Intercambio</option>
                                                            <option
                                                                value="5">Contrato</option>
                                                            <option
                                                                value="6">Facturado</option>
                                                            <?php
                                                            break;
                                                        case 1:
                                                            ?>
                                                            <option
                                                                value="1">Por facturar</option>
                                                            <option
                                                                value="2">Reproceso</option>
                                                            <option
                                                                value="3">Cortesia</option>
                                                            <option
                                                                value="4">Intercambio</option>
                                                            <option
                                                                value="5">Contrato</option>
                                                            <option
                                                                value="6">Facturado</option>
                                                            <?php
                                                            break;
                                                        case 2:
                                                            ?>
                                                            <option
                                                                value="2">Reproceso</option>
                                                            <option
                                                                value="1">Por facturar</option>
                                                            <option
                                                                value="3">Cortesia</option>
                                                            <option
                                                                value="4">Intercambio</option>
                                                            <option
                                                                value="5">Contrato</option>
                                                            <option
                                                                value="6">Facturado</option>
                                                            <?php
                                                            break;
                                                        case 3:
                                                            ?>
                                                            <option
                                                                value="3">Cortesia</option>
                                                            <option
                                                                value="1">Por facturar</option>
                                                            <option
                                                                value="2">Reproceso</option>
                                                            <option
                                                                value="4">Intercambio</option>
                                                            <option
                                                                value="5">Contrato</option>
                                                            <option
                                                                value="6">Facturado</option>
                                                            <?php
                                                            break;
                                                        case 4:
                                                            ?>
                                                            <option
                                                                value="4">Intercambio</option>

                                                            <option
                                                                value="1">Por facturar</option>
                                                            <option
                                                                value="2">Reproceso</option>
                                                            <option
                                                                value="3">Cortesia</option>
                                                            <option
                                                                value="5">Contrato</option>
                                                            <option
                                                                value="6">Facturado</option>
                                                            <?php
                                                            break;
                                                        case 5:
                                                            ?>
                                                            <option
                                                                value="5">Contrato</option>

                                                            <option
                                                                value="1">Por facturar</option>
                                                            <option
                                                                value="2">Reproceso</option>
                                                            <option
                                                                value="3">Cortesia</option>
                                                            <option
                                                                value="4">Intercambio</option>

                                                            <option
                                                                value="6">Facturado</option>
                                                            <?php
                                                            break;
                                                        case 6:
                                                            ?>

                                                            <option
                                                                value="6">Facturado</option>
                                                            <option
                                                                value="1">Por facturar</option>
                                                            <option
                                                                value="2">Reproceso</option>
                                                            <option
                                                                value="3">Cortesia</option>
                                                            <option
                                                                value="4">Intercambio</option>
                                                            <option
                                                                value="5">Contrato</option>


                                                            <?php

                                                            break;
                                                    }?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group" id="num_facturaForm" style="display: none;">
                                            <label class="control-label col-lg-2" id="num_facturaLabel" style="display: none;">Num factura <span
                                                    class="required">*</span></label>

                                            <div class="col-lg-10">
                                                <input class=" form-control" id="num_factura" style="display: none;" name="modelo" type="text"
                                                       required value="<?php echo $NumFactura; ?>" onfocus="if(this.value=='<?php echo $NumFactura; ?>')this.value=''" />
                                            </div>
                                        </div>


                                        <div class="form-group">
                                                <label for="tipo" class="control-label col-lg-2">Ingeniero asignado<span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <select class="form-control m-bot15" id="tipo" name="encargado"
                                                            required>

                                                        <?php
                                                        include '../libs/conexion.php';

                                                        $tablaDeMysql = "usuario"; //Define el nombre de la tabla donde estan los datos


                                                        //Checamos si se lleno el campo de usuario en el formulario


                                                        $consulta = "SELECT * FROM " . $tablaDeMysql . " WHERE activo LIKE 1 ";
                                                        $resultado = $mysqli->query($consulta);

                                                        $consulta2 = "SELECT * FROM " . $tablaDeMysql . ' WHERE id_usuario LIKE '.$encargado."";
                                                        $resultado2 = $mysqli->query($consulta2);

                                                        // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

                                                        if($encargado == 0){
                                                            echo '  <option
                                                                value="0">No asignado</option>';
                                                        }else{
                                                            while ($row2 = mysqli_fetch_row($resultado2)) {

                                                                ?>
                                                                <option
                                                                    value="<?php echo $row2[0] ?>"><?php echo $row2[1] ?></option>
                                                            <?php
                                                            }
                                                        }


                                                        while ($row = mysqli_fetch_row($resultado)) {
                                                            ?>
                                                            <option
                                                                value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

<?php } ?>
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Solicita: </span></label>

                                                <div class="col-lg-10">
                                                    <?php echo $solicita; ?>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Usuario: <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <?php echo $usuario; ?>
                                                </div>                                            </div>
                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Area<span class="required">*</span>
                                                </label>

                                                <div class="col-lg-10">
                                                    <?php echo $area; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tipo" class="control-label col-lg-2">Tipo de equipo.<span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <select class="form-control m-bot15" id="tipo" name="tipo_equipo"
                                                            required="">

                                                        <?php
                                                        include '../libs/conexion.php';




                                                        //Checamos si se lleno el campo de usuario en el formulario


                                                        $consulta = "SELECT * FROM tipo_dispositivo WHERE activo LIKE 1";
                                                        $resultado = $mysqli->query($consulta);

                                                        $consulta2 = "SELECT * FROM tipo_impresora WHERE activo LIKE 1";
                                                        $resultado2 = $mysqli->query($consulta2);

                                                        $consulta3 = "SELECT * FROM tipo_otro_dispositivo WHERE activo LIKE 1 ";
                                                        $resultado3 = $mysqli->query($consulta3);

                                                        // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

                                                        if($tipoEquipo == 0){
                                                            echo '  <option
                                                                value="0">No asignado</option>';
                                                        }else{
                                                            echo '<option
                                                                value="'.$tipoEquipo.'">'.$tipoEquipo.'</option>';
                                                        }

                                                            while ($row = mysqli_fetch_row($resultado)) {

                                                                ?>
                                                                <option
                                                                    value="<?php echo $row[1] ?>"><?php echo $row[1] ?></option>
                                                            <?php
                                                            }
                                                            while ($row1 = mysqli_fetch_row($resultado1)) {

                                                                ?>
                                                                <option
                                                                    value="<?php echo $row1[1] ?>"><?php echo $row1[1] ?></option>
                                                            <?php
                                                            }
                                                            while ($row2 = mysqli_fetch_row($resultado2)) {

                                                                ?>
                                                                <option
                                                                    value="<?php echo $row2[1] ?>"><?php echo $row2[1] ?></option>
                                                            <?php
                                                            }

                                                       ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Equipo <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                             <!-- <input class=" form-control" id="fullname" name="equipo" type="text"
                                                           required value="<?php //echo $equipo; ?>" onfocus="if(this.value=='<?php// echo $equipo; ?>')this.value=''" />-->

                                                    <p><?php echo $equipo; ?></p>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Marca <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="fullname" name="marca" type="text"
                                                           required value="<?php echo $marca; ?>" onfocus="if(this.value=='<?php echo $marca; ?>')this.value=''" />
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Modelo <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="fullname" name="modelo" type="text"
                                                           required value="<?php echo $modelo; ?>" onfocus="if(this.value=='<?php echo $modelo; ?>')this.value=''" />
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">No_serie <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="fullname" name="no_serie" type="text"
                                                           required value="<?php echo $no_serie; ?>" onfocus="if(this.value=='<?php echo $no_serie; ?>')this.value=''" />
                                                </div>
                                            </div>



                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Situación del reporte <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <p><?php echo $situacionReporte; ?></p>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Diagnostico <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <textarea name="diagnostico" rows="10" cols="40"><?php echo $diagnostico; ?></textarea>
                                                </div>
                                            </div>

                                        <div class="form-group">
                                            <label for="tipo" class="control-label col-lg-2">Status de equipo.<span
                                                    class="required">*</span></label>

                                            <div class="col-lg-10">
                                                <select class="form-control m-bot15" id="tipo" name="status_equipo"
                                                        required="">

                                                    <?php  switch ($statusEquipo) {

                                                        case 0:
                                                            ?>
                                                            <option
                                                                value="0">No asignado</option>
                                                            <option
                                                                value="1">Operando de manera optima</option>
                                                            <option
                                                                value="2">Operando de manera irregular</option>
                                                            <option
                                                                value="3">Se llevo al taller</option>


                                                            <?php
                                                            break;
                                                        case 1:
                                                            ?>
                                                            <option
                                                                value="1">Operando de manera optima</option>
                                                            <option
                                                                value="2">Operando de manera irregular</option>
                                                            <option
                                                                value="3">Se llevo al taller</option>


                                                            <?php
                                                            break;
                                                        case 2:
                                                            ?>

                                                            <option
                                                                value="2">Operando de manera irregular</option>
                                                            <option
                                                                value="1">Operando de manera optima</option>
                                                            <option
                                                                value="3">Se llevo al taller</option>


                                                            <?php
                                                            break;
                                                        case 3:
                                                            ?>
                                                            <option
                                                                value="3">Se llevo al taller</option>
                                                            <option
                                                                value="2">Operando de manera irregular</option>
                                                            <option
                                                                value="1">Operando de manera optima</option>

                                                            <?php
                                                            break; } ?>

                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Acciones a realizar <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <textarea name="acciones_realizar" rows="10" cols="40"><?php echo $accionesARealizar; ?></textarea>
                                                </div>
                                            </div>


                                            <div class="form-group ">
                                                <label for="fullname" class="control-label col-lg-2">Acciones realizadas <span
                                                        class="required">*</span></label>

                                                <div class="col-lg-10">
                                                    <textarea name="acciones_realizadas" rows="10" cols="40"><?php echo $accionesRealizadas; ?></textarea>
                                                </div>
                                            </div>


<?php if ($_SESSION['tipo_usuario'] == 1) {  ?>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-4">
        <button class="btn btn-primary" type="button" onclick="this.form.action='../controllers/updateReporte.php?a=update&id=<?php echo $_GET['id'] ?>';this.form.submit();">Modificar</button>

    </div>
<?php
}else { ?>
   <div class="col-lg-offset-1 col-lg-4">
        <button class="btn btn-primary" type="button" onclick="this.form.action='../controllers/updateReporte.php?a=update2&id=<?php echo $_GET['id'] ?>';this.form.submit();">Modificar</button>
    </div>
   <?php } ?>
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
