<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="img/Logo.png">

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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/lte-ie7.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">
        <?php
       if(@$_GET['e']== 'error')
        {

        ?>
        <div class="alert alert-block alert-danger fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="icon-remove"></i>
            </button>
            <strong>Lo siento!</strong> El usuario no existe o no estan bien los datos
        </div>
        <?php
        }
        ?>
        <?php
        if(@$_GET['e']== 'error1')
        {

            ?>
            <div class="alert alert-block alert-danger fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Lo siento!</strong> El usuario no tiene permisos para esa pestaña, ingresar como usuario
            </div>
        <?php
        }
        ?>
        <?php


        if(@$_GET['e']== 'logout')
        {

        ?>
        <div class="alert alert-info fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="icon-remove"></i>
            </button>
            <strong>Gracias!</strong> Has cerrado sesión correctamente.
        </div>
        <?php
        }
        ?>


        <form class="login-form" action="inicio.php" method="post">
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name="usuario" placeholder="Username" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

        </div>
      </form>

    </div>


  </body>
</html>
