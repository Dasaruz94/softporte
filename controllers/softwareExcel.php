<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 31/07/15
 * Time: 09:19 AM
 */
ob_start();


date_default_timezone_set('UTC'); // PHP's date function uses this value!
include '../libs/conexion.php';

$qryempresa = "SELECT * FROM dispositivo WHERE id_empresa LIKE '" . $_GET['id2'] . "'AND activo LIKE 1";

$resultadoqrydispositivo = $mysqli->query($qryempresa);
while ($disp = mysqli_fetch_array($resultadoqrydispositivo)) {
    $tipo = $disp['tipo'];

    $user = $disp['usuario'];

    $area = $disp['area'];




}

$tablaDeMysql = "software_licencia"; //Define el nombre de la tabla donde estan los datos

$consulta = "SELECT * FROM " . $tablaDeMysql . " WHERE id_dispositivo LIKE '" . $_GET['id'] . "'AND activo LIKE 1 ORDER BY nombre,calificacion";

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

    $tituloReporte = "Software de dispositivo: ".$tipo." del usuario: ".$user." del area: ".$area;
    $titulosColumnas = array('Nombre','Calificación');
    //ancho de celdas automatico
    for($i = 'A'; $i <= 'B'; $i++){
        $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
    }



    ob_clean();
    /*Aqui se deben de elegir que campos se pueden mostrar para el usuario*/
    $objPHPExcel->getActiveSheet()->SetCellValue("A1", $tituloReporte);
    $objPHPExcel->getActiveSheet()->SetCellValue("A2", $titulosColumnas[0]);
    $objPHPExcel->getActiveSheet()->SetCellValue("B2", $titulosColumnas[1]);



    while ($fila = mysqli_fetch_array($resultado)) {


        $objPHPExcel->getActiveSheet()->SetCellValue("A" . $counter, $fila['nombre']);
        $objPHPExcel->getActiveSheet()->SetCellValue("B" . $counter, $fila['calificacion']);



        $counter ++;
    }
    // ob_start();

    $counter = $counter + 2;
    $tablaDeMysql = "software_libre"; //Define el nombre de la tabla donde estan los datos

    $consultaimp = "SELECT * FROM " . $tablaDeMysql . " WHERE id_dispositivo LIKE '" . $_GET['id'] . "'AND activo LIKE 1 ORDER BY nombre,calificacion";

    $resultadoimp = $mysqli->query($consultaimp);


    $objPHPExcel->getActiveSheet()->SetCellValue("A".$counter, 'Software libre');

    $counter ++;
    $counter ++;


    $objPHPExcel->getActiveSheet()->SetCellValue("A".$counter, 'Nombre');
    $objPHPExcel->getActiveSheet()->SetCellValue("B".$counter, 'Calificación');

    $counter ++;


    while ($fila2 = mysqli_fetch_array($resultadoimp)) {


        $objPHPExcel->getActiveSheet()->SetCellValue("A" . $counter, $fila2['nombre']);
        $objPHPExcel->getActiveSheet()->SetCellValue("B" . $counter, $fila2['calificacion']);

       $counter ++;
    }

//otros dispositivos



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

    $nombreArchivo = "Reporte_Software". date('d-m-Y');

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