<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 21/07/15
 * Time: 03:29 PM
 */
ob_start();


date_default_timezone_set('UTC'); // PHP's date function uses this value!
include '../libs/conexion.php';

$qryempresa = "SELECT * FROM empresa WHERE id_empresa LIKE '" . $_GET['id'] . "'AND activo LIKE 1";

$resultadoqryempresa = $mysqli->query($qryempresa);
while ($emp = mysqli_fetch_array($resultadoqryempresa)) {
    $empresa = $emp['empresa'];




}

$tablaDeMysql = "dispositivo"; //Define el nombre de la tabla donde estan los datos

$consulta = "SELECT * FROM " . $tablaDeMysql . " WHERE id_empresa LIKE '" . $_GET['id'] . "'AND activo LIKE 1 ORDER BY area,usuario,tipo";

$resultado = $mysqli->query($consulta);


//Checamos si se lleno el campo de usuario en el formulario


$total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

if ($resultado->num_rows > 0) {

    require_once '../libs/PHPExcel.php';

$objPHPExcel = new PHPExcel();
// Set properties
$objPHPExcel->getProperties()->setCreator("Compu Hardware");
$objPHPExcel->getProperties()->setLastModifiedBy("Compu Hardware");
$objPHPExcel->getProperties()->setTitle("Reporte");
$objPHPExcel->getProperties()->setSubject("Reporte");
$objPHPExcel->getProperties()->setDescription("Reporte");



$arrayLabels = array();
//Nos va servir para obtener los labels de cada campo

$counter = 3;

$rango = range("A","Z");

    $tituloReporte = "Equipos de ".$empresa;
    $titulosColumnas = array('No.Inventario', 'Tipo', 'Serie', 'Area','Usuario','Monitor','Procesador','Cal Procesador','Disco duro','Cal Disco duro','Ram','Cal Ram','Observaciones');
    //ancho de celdas automatico
    for($i = 'A'; $i <= 'M'; $i++){
        $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
    }



    ob_clean();
    /*Aqui se deben de elegir que campos se pueden mostrar para el usuario*/
$objPHPExcel->getActiveSheet()->SetCellValue("A1", $tituloReporte);
    $objPHPExcel->getActiveSheet()->SetCellValue("A2", $titulosColumnas[0]);
    $objPHPExcel->getActiveSheet()->SetCellValue("B2", $titulosColumnas[1]);
    $objPHPExcel->getActiveSheet()->SetCellValue("C2", $titulosColumnas[2]);
    $objPHPExcel->getActiveSheet()->SetCellValue("D2", $titulosColumnas[3]);
    $objPHPExcel->getActiveSheet()->SetCellValue("E2", $titulosColumnas[4]);
    $objPHPExcel->getActiveSheet()->SetCellValue("F2", $titulosColumnas[5]);
    $objPHPExcel->getActiveSheet()->SetCellValue("G2", $titulosColumnas[6]);
    $objPHPExcel->getActiveSheet()->SetCellValue("H2", $titulosColumnas[7]);
    $objPHPExcel->getActiveSheet()->SetCellValue("I2", $titulosColumnas[8]);
    $objPHPExcel->getActiveSheet()->SetCellValue("J2", $titulosColumnas[9]);
    $objPHPExcel->getActiveSheet()->SetCellValue("K2", $titulosColumnas[10]);
    $objPHPExcel->getActiveSheet()->SetCellValue("L2", $titulosColumnas[11]);
    $objPHPExcel->getActiveSheet()->SetCellValue("M2", $titulosColumnas[12]);



$i = 1;

    while ($fila = mysqli_fetch_array($resultado)) {


    $objPHPExcel->getActiveSheet()->SetCellValue("A" . $counter, $i);
    $objPHPExcel->getActiveSheet()->SetCellValue("B" . $counter, $fila['tipo']);
    $objPHPExcel->getActiveSheet()->SetCellValue("C" . $counter, $fila['numero_serie']);
    $objPHPExcel->getActiveSheet()->SetCellValue("D" . $counter, $fila['area']);
    $objPHPExcel->getActiveSheet()->SetCellValue("E" . $counter, $fila['usuario']);
    $objPHPExcel->getActiveSheet()->SetCellValue("F" . $counter, $fila['monitor']);
    $objPHPExcel->getActiveSheet()->SetCellValue("G" . $counter, $fila['procesador']);
    $objPHPExcel->getActiveSheet()->SetCellValue("H" . $counter, $fila['cal_procesador']);
    $objPHPExcel->getActiveSheet()->SetCellValue("I" . $counter, $fila['disco_duro']);
    $objPHPExcel->getActiveSheet()->SetCellValue("J" . $counter, $fila['cal_disco_duro']);
    $objPHPExcel->getActiveSheet()->SetCellValue("K" . $counter, $fila['ram']);
    $objPHPExcel->getActiveSheet()->SetCellValue("L" . $counter, $fila['cal_ram']);
    $objPHPExcel->getActiveSheet()->SetCellValue("M" . $counter, $fila['observaciones']);


    $counter++;
        $i++;
}
   // ob_start();

$counter = $counter + 2;
    $tablaDeMysql = "impresora"; //Define el nombre de la tabla donde estan los datos

    $consultaimp = "SELECT * FROM " . $tablaDeMysql . " WHERE id_empresa LIKE '" . $_GET['id'] . "'AND activo LIKE 1 ORDER BY area,usuario,tipo";

    $resultadoimp = $mysqli->query($consultaimp);


    $objPHPExcel->getActiveSheet()->SetCellValue("A".$counter, 'IMPRESORAS');

    $counter ++;
    $counter ++;


    $objPHPExcel->getActiveSheet()->SetCellValue("A".$counter, 'No.Inventario');
    $objPHPExcel->getActiveSheet()->SetCellValue("B".$counter, 'Tipo');
    $objPHPExcel->getActiveSheet()->SetCellValue("C".$counter, 'Serie');
    $objPHPExcel->getActiveSheet()->SetCellValue("D".$counter, 'Area');
    $objPHPExcel->getActiveSheet()->SetCellValue("E".$counter, 'Usuario');


    $objPHPExcel->getActiveSheet()->SetCellValue("F".$counter, 'Tipo');
    $objPHPExcel->getActiveSheet()->SetCellValue("G".$counter, 'Multifuncional');
    $objPHPExcel->getActiveSheet()->SetCellValue("H".$counter, 'Monocromatica');
    $objPHPExcel->getActiveSheet()->SetCellValue("I".$counter, 'Observaciones');
    $counter ++;

$i = 1;
    while ($fila2 = mysqli_fetch_array($resultadoimp)) {


        $objPHPExcel->getActiveSheet()->SetCellValue("A" . $counter, $i);
        $objPHPExcel->getActiveSheet()->SetCellValue("B" . $counter, $fila2['tipo']);
        $objPHPExcel->getActiveSheet()->SetCellValue("C" . $counter, $fila2['numero_serie']);
        $objPHPExcel->getActiveSheet()->SetCellValue("D" . $counter, $fila2['area']);
        $objPHPExcel->getActiveSheet()->SetCellValue("E" . $counter, $fila2['usuario']);
        if($fila2['tipo_material'] == 1){
            $objPHPExcel->getActiveSheet()->SetCellValue("F" . $counter, 'tinta');
        }
        if($fila2['tipo_material'] == 2){
            $objPHPExcel->getActiveSheet()->SetCellValue("F" . $counter, 'toner');
        }
        if($fila2['multifuncional'] == 1){
            $objPHPExcel->getActiveSheet()->SetCellValue("G" . $counter, 'si');
        }
        if($fila2['multifuncional'] == 2){
            $objPHPExcel->getActiveSheet()->SetCellValue("G" . $counter, 'no');
        }
        if($fila2['monocromatica'] == 1){
            $objPHPExcel->getActiveSheet()->SetCellValue("H" . $counter, 'si');
        }
        if($fila2['monocromatica'] == 2){
            $objPHPExcel->getActiveSheet()->SetCellValue("H" . $counter, 'no');
        }

        $objPHPExcel->getActiveSheet()->SetCellValue("I" . $counter, $fila2['observaciones']);


        $counter++;
        $i++;
    }

//otros dispositivos

    $counter = $counter + 2;
    $tablaDeMysql = "otro_equipo"; //Define el nombre de la tabla donde estan los datos

    $consultaimp = "SELECT * FROM " . $tablaDeMysql . " WHERE id_empresa LIKE '" . $_GET['id'] . "'AND activo LIKE 1 ORDER BY area,usuario,tipo";

    $resultadoimp = $mysqli->query($consultaimp);


    $objPHPExcel->getActiveSheet()->SetCellValue("A".$counter, 'Otros equipos');

    $counter ++;
    $counter ++;


    $objPHPExcel->getActiveSheet()->SetCellValue("A".$counter, 'No.Inventario');
    $objPHPExcel->getActiveSheet()->SetCellValue("B".$counter, 'Tipo');
    $objPHPExcel->getActiveSheet()->SetCellValue("C".$counter, 'Serie');
    $objPHPExcel->getActiveSheet()->SetCellValue("D".$counter, 'Area');
    $objPHPExcel->getActiveSheet()->SetCellValue("E".$counter, 'Usuario');
    $objPHPExcel->getActiveSheet()->SetCellValue("F".$counter, 'Capacidad');
    $objPHPExcel->getActiveSheet()->SetCellValue("G".$counter, 'Observaciones');

    $counter ++;

    $i = 1;
    while ($fila2 = mysqli_fetch_array($resultadoimp)) {


        $objPHPExcel->getActiveSheet()->SetCellValue("A" . $counter, $i);
        $objPHPExcel->getActiveSheet()->SetCellValue("B" . $counter, $fila2['tipo']);
        $objPHPExcel->getActiveSheet()->SetCellValue("C" . $counter, $fila2['numero_serie']);
        $objPHPExcel->getActiveSheet()->SetCellValue("D" . $counter, $fila2['area']);
        $objPHPExcel->getActiveSheet()->SetCellValue("E" . $counter, $fila2['usuario']);
        $objPHPExcel->getActiveSheet()->SetCellValue("F" . $counter, $fila2['capacidad']);
        $objPHPExcel->getActiveSheet()->SetCellValue("G" . $counter, $fila2['observaciones']);


        $counter++;
        $i++;
    }



    $estiloTituloReporte = array(
        'font' => array(
            'name'      => 'Georgia',
            'bold'      => true,
            'italic'    => false,
            'strike'    => false,
            'size' =>13,
            'color'     => array(
                'rgb' => 'FFFFFF'
            )
        ),
        'fill' => array(
            'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
            'color'	=> array(
                'argb' => 'FF220835')
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_NONE
            )
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'rotation' => 0,
            'wrap' => TRUE
        )
    );




//forma sencilla de dar estilos
    $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray($estiloTituloReporte);
   // $objPHPExcel->getActiveSheet()->getStyle('A3:M3')->applyFromArray($estiloTituloColumnas);
    //$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A3:M".($counter-1));

$nombreArchivo = "Reporte_equipos". date('d-m-Y');

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=$nombreArchivo.xls");
header("Content-Transfer-Encoding: binary ");

$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
$objWriter->save('php://output');

}


?>