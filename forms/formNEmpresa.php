<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 20/08/15
 * Time: 12:49 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<?php
include '../view/header.php';
?>
<body>
<!-- container section start -->
<section id="container" class="">

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                          Agrega tu empresa
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal " id="register_form" method="post"
                                      action="../controllers/updateEmpresa.php?a=add2">
                                    <div class="form-group ">
                                        <label for="fullname" class="control-label col-lg-2">Empresa <span
                                                class="required">*</span></label>

                                        <div class="col-lg-10">
                                            <input class=" form-control" id="fullname" name="empresa"
                                                   type="text" required=""/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="fullname" class="control-label col-lg-2">RFC <span
                                                class="required">*</span></label>

                                        <div class="col-lg-10">
                                            <input class=" form-control" id="fullname" name="rfc" type="text"
                                                   required=""/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="fullname" class="control-label col-lg-2">Contacto <span
                                                class="required">*</span></label>

                                        <div class="col-lg-10">
                                            <input class=" form-control" id="fullname" name="contacto"
                                                   type="text" required=""/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="fullname" class="control-label col-lg-2">Telefono <span
                                                class="required">*</span></label>

                                        <div class="col-lg-4">
                                            <input class=" form-control" id="fullname" name="telefono"
                                                   type="tel" required=""/>
                                        </div>
                                        <label for="fullname" class="control-label col-lg-2">Telefono 2 <span
                                                class="required"></span></label>
                                        <div class="col-lg-4">
                                            <input class=" form-control" id="fullname" name="telefono2"
                                                   type="tel" >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="fullname" class="control-label col-lg-2">Pais <span
                                                class="required">*</span></label>

                                        <div class="col-lg-4">
                                            <input class=" form-control" id="fullname" name="pais"
                                                   type="text" required=""/>
                                        </div>
                                        <label for="fullname" class="control-label col-lg-2">Estado <span
                                                class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <input class=" form-control" id="fullname" name="estado"
                                                   type="text" required=""/>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="fullname" class="control-label col-lg-2">Ciudad <span
                                                class="required">*</span></label>

                                        <div class="col-lg-4">
                                            <input class=" form-control" id="fullname" name="ciudad"
                                                   type="text" required=""/>
                                        </div>
                                        <label for="fullname" class="control-label col-lg-2">Colonia <span
                                                class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <input class=" form-control" id="fullname" name="colonia"
                                                   type="text" required=""/>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="fullname" class="control-label col-lg-2">Calle<span
                                                class="required">*</span></label>

                                        <div class="col-lg-10">
                                            <input class=" form-control" id="fullname" name="calle" type="text"
                                                   required=""/>
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
                                                class="required"></span></label>
                                        <div class="col-lg-3">
                                            <input class=" form-control" id="fullname" name="no_int"
                                                   type="text"/>
                                        </div>
                                        <label for="fullname" class="control-label col-lg-1">CP <span
                                                class="required">*</span></label>
                                        <div class="col-lg-2">
                                            <input class=" form-control" id="fullname" name="cp"
                                                   type="text" required=""/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="fullname" class="control-label col-lg-2">Email <span
                                                class="required">*</span></label>

                                        <div class="col-lg-10">
                                            <input class=" form-control" id="fullname" name="email"
                                                   type="email" required=""/>
                                        </div>
                                    </div>
                                    </div>

                            <br>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Agregar</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
            <!-- page end-->

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