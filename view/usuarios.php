<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 14/07/15
 * Time: 09:04 PM
 */

SESSION_START();
if(isset($_SESSION['nombre'])) {

if($_SESSION['tipo_usuario']== 1){


?>
<!DOCTYPE html>
<html lang="en">
<html lang="en">
<?php
include 'header.php';
?>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->

    <?php
    include 'menu.php';
    ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">

        <section class="wrapper">
            <?php
            if(@$_GET['e']== 'add')
            {

                ?>
                <div class="alert alert-info fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Felicitaciones!</strong> El usuario se ha añadido correctamente.
                </div>
            <?php
            }
            ?>

            <?php
            if(@$_GET['e']== 'deleted')
            {

                ?>
                <div class="alert alert-info fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Felicitaciones!</strong> El usuario se ha borrado correctamente.
                </div>
            <?php
            }
            ?>

            <?php
            if(@$_GET['e']== 'updated')
            {

                ?>
                <div class="alert alert-info fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Felicitaciones!</strong> El usuario se ha modificado correctamente.
                </div>
            <?php
            }
            ?>
            <div class="row">
                <div class="col-lg-10">
                    <h3 class="page-header"><i class="fa fa fa-bars"></i> Usuarios </h3>
                    <td><a class="btn btn-primary" href="../forms/formUser.php"><span class="icon_plus"></span> Agregar usuario</a></td>

                </div>
            </div>
            <br>
            <!-- page start-->

            <table class="table table-striped table-advance table-hover">
                <tbody>
                <tr>
                    <th><i class="icon_profile"></i> Nombre</th>
                    <th><i class="icon_creditcard"></i> Tipo de usuario</th>
                    <th><i class="icon_pencil"></i> Tipo de usuario/borrar</th>
                </tr>
                <?php
                include '../libs/conexion.php';

                $tablaDeMysql = "usuario"; //Define el nombre de la tabla donde estan los datos


                //Checamos si se lleno el campo de usuario en el formulario


                $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE activo LIKE 1 ";
                $resultado = $mysqli->query($consulta);

               // $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


                while ($row=mysqli_fetch_row($resultado))
                {

                     if($row[3] == 1){

                         $tipousuario = 'administrador';
                     }
                    else{
                        $tipousuario = 'trabajador';
                    }


                ?>
                <tr>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $tipousuario; ?></td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-primary" onclick="location='../controllers/updateUser.php?a=update&id=<?php echo $row[0] ?>&tipo=<?php echo $row[3] ?>'"><i class="icon_pencil-edit"></i></a>
                            <a class="btn btn-danger" onclick="location='../controllers/updateUser.php?a=delete&id=<?php echo $row[0] ?>'"><i class="icon_trash_alt"></i></a>

                        </div>
                    </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
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
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
<script src="../js/scripts.js"></script>


</body>
</html>

<?php
}else{

    SESSION_UNSET();

    SESSION_DESTROY();
    header('Location: ../index.php?e=error1');
    echo 'El usuario no es correcto';
}
}else{

    header('Location: ../index.php?e=error');
    echo 'El usuario no es correcto';
}
?>
