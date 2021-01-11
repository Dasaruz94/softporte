<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 20/08/15
 * Time: 12:06 PM
 */
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="img/favicon.jpg">

    <title>CompuHardware</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <script type="text/javascript" src="js/jquery.js"></script>


    <!--    JQUERY    -->
    <!--    FORMATO DE TABLAS    -->
    <link type="text/css" href="css/demo_table.css" rel="stylesheet" />


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script> -->





    <!--[endif]-->
</head>

<body class="login-img3-body">

<script type="text/javascript">
    $(document).ready(function() {
        $('#rfc').blur(function(){

            $('#Info').html('<img src="img/loader.gif" alt="" />').fadeOut(1000);

            var rfc = $(this).val();
            var dataString = 'rfc='+rfc;

            $.ajax({
                type: "POST",
                url: "controllers/checkrfc.php",
                data: dataString,
                success: function(data) {
                    $('#Info').fadeIn(1000).html(data);
                    //alert(data);
                }
            });
        });
    });
</script>
<div class="container">
    <?php
    if(@$_GET['e']== 'add')
    {

        ?>
        <div class="alert alert-info fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="icon-remove"></i>
            </button>
            <strong>Felicidades!</strong> Has agregado tu empresa correctamente, ya puedes hacer tu reporte.
        </div>
    <?php
    }
    ?>


    <form class="login-form" action="controllers/updateReporte.php?a=add" method="post">
        <div class="login-wrap">
         <h1>Bienvenido, ingresa tu reporte</h1>
            <a href="forms/formNEmpresa.php">Registrate si no lo has hecho...</a>
            <br>
            <br>
            <div class="input-group">
               <p style="text-align: left">RFC</p>
                    <input size="35" class=" form-control" name="rfc" id="rfc"
                           type="text" required/>
                <div id="Info"></div>
            </div>
            <div class="input-group">
                <div id="Info"></div>
            </div>
            <div class="input-group">
                <p style="text-align: left">Nombre de solicitante</p>
                <input size="35" class=" form-control" name="solicita"
                       type="text" required/>
            </div>
            <div class="input-group">
                <p style="text-align: left">Persona que utiliza maquina</p>
                <input size="35" class=" form-control" name="usuario"
                       type="text" required/>
            </div>
            <div class="input-group">
                <p style="text-align: left">Equipo</p>
                <input size="35" class=" form-control" name="equipo"
                       type="text" required/>
            </div>
            <div class="input-group">
                <p style="text-align: left">Area</p>
                <input size="35" class=" form-control" name="area"
                       type="text" required/>
            </div>

            <div class="input-group">
                <p style="text-align: left">Describir fallo</p>
                <textarea  class=" form-control" name="situacion_reporte"/> </textarea>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar reporte</button>


        </div>
    </form>

</div>


</body>
</html>
