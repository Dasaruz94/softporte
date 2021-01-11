<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 10/07/15
 * Time: 02:34 PM
 */
?>

<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
    </div>

    <!--logo start-->
    <a href="../inicio.php" class="logo">Compu <span class="lite">Hardware</span></a>
    <!--logo end-->



    <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">


            <!-- inbox notificatoin end -->
            <!-- alert notification start-->

            <!-- alert notification end-->
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="../img/iconosmall.jpg">
                            </span>
                    <span class="username"><?php echo $_SESSION['nombre'] ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li class="eborder-top">
                        <a href="../usuario.php"><i class="icon_profile"></i> Mis datos </a>
                    </li>
                    <li>
                        <a href="../logout.php"><i class="icon_key_alt"></i> Cerrar Sesion</a>
                    </li>

                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
    </div>
</header>
<!--header end-->

<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">

            <li class="">
                <a class="" href="../view/empresas.php">
                    <i class="icon_book"></i>
                    <span>Empresas</span>
                </a>
            </li>
            <li class="">
                <a class="" href="../view/tarea.php">
                    <i class="icon_document"></i>
                    <span>Tareas</span>
                </a>
            </li>
            <li class="">
                <a class="" href="../view/reportes.php">
                    <i class="icon_document"></i>
                    <span>Reportes</span>
                </a>
            </li>


            <?php
            if($_SESSION['tipo_usuario'] == 1){


            ?>
            <li class="">
                <a class="" href="../view/usuarios.php">
                    <i class="icon_contacts"></i>
                    <span>Usuarios</span>
                </a>
            </li>

            <?php
            }
                ?>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Catalogos</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="../view/catalogo_equipo.php">Equipos</a></li>
                    <li><a class="" href="../view/catalogo_programa.php">Programas</a></li>
                </ul>
            </li>





        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>