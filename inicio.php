<?php
SESSION_START();
if(isset($_SESSION['nombre'])) {

    $total=2;


}else{

    include 'libs/conexion.php';


    $tablaDeMysql = "usuario"; //Define el nombre de la tabla donde estan los datos


//Checamos si se lleno el campo de usuario en el formulario


    $consulta = "SELECT * FROM ".$tablaDeMysql." WHERE nombre LIKE '".$_POST['usuario']."' AND contrasena LIKE '".$_POST['password']."' AND activo LIKE 1 ";
    $resultado = $mysqli->query($consulta);

    $total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado


}



if($total == 1){




$_SESSION['nombre']=$_POST['usuario'];




while ($row=mysqli_fetch_row($resultado))
{
    $_SESSION['tipo_usuario']=$row[3];
    $_SESSION['id'] = $row[0];
    $_SESSION['password'] = $_POST['password'];
}


    $total=2;
}

if($total==2){

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
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>

				</div>
			</div>
              <!-- page start-->
              Bienvenido al sistema de compuhardware
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>


  </body>
</html>

<?php
}else{

    header('Location: index.php?e=error');
    echo 'El usuario no es correcto';
}
?>
