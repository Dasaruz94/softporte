<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 21/07/15
 * Time: 01:37 PM
 */

ob_start();
date_default_timezone_set('America/Mexico_City');
include '../libs/conexion.php';

$qryempresa = "SELECT * FROM empresa WHERE id_empresa LIKE '" . $_GET['id'] . "'AND activo LIKE 1";

$resultadoqryempresa = $mysqli->query($qryempresa);
while ($emp = mysqli_fetch_array($resultadoqryempresa)) {
    $empresa = $emp['empresa'];

    echo $emp['empresa'];


}

$tablaDeMysql = "dispositivo"; //Define el nombre de la tabla donde estan los datos

$consulta = "SELECT * FROM " . $tablaDeMysql . " WHERE id_empresa LIKE '" . $_GET['id'] . "'AND activo LIKE 1";

$resultado = $mysqli->query($consulta);


//Checamos si se lleno el campo de usuario en el formulario


$total = mysqli_num_rows($resultado); //Contamos la cantidad de filas que nos arrojo el resultado

if ($resultado->num_rows > 0) {



    require_once '../libs/PHPExcel.php';

    $objPHPExcel = new PHPExcel();

    $objPHPExcel->getProperties()->setCreator("CompuHardware") // Nombre del autor
        ->setLastModifiedBy("CompuHardware") //Ultimo usuario que lo modificó
        ->setTitle("Reporte de equipos") // Titulo
        ->setSubject("Reporte de equipos") //Asunto
        ->setDescription("Reporte de equipos") //Descripción
        ->setKeywords("Reporte de equipos") //Etiquetas
        ->setCategory("Reporte de equipos"); //Categorias

    $tituloReporte = "Equipos de ".$empresa;
    $titulosColumnas = array('No Inventario', 'Tipo', 'Serie', 'Area','Usuario','Monitor','Procesador','Calif Procesador','Disco duro','Cal Disco duro','Ram','Cal Ram','Observaciones');
// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
    $objPHPExcel->setActiveSheetIndex(0)
        ->mergeCells('A1:D1');

    ob_clean();

// Se agregan los titulos del reporte
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1',$tituloReporte) // Titulo del reporte
        ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas
        ->setCellValue('B3',  $titulosColumnas[1])
        ->setCellValue('C3',  $titulosColumnas[2])
        ->setCellValue('D3',  $titulosColumnas[3])
        ->setCellValue('E3',  $titulosColumnas[4])
        ->setCellValue('F3',  $titulosColumnas[5])
        ->setCellValue('G3',  $titulosColumnas[6])
        ->setCellValue('H3',  $titulosColumnas[7])
        ->setCellValue('I3',  $titulosColumnas[8])
        ->setCellValue('J3',  $titulosColumnas[9])
        ->setCellValue('K3',  $titulosColumnas[10])
        ->setCellValue('L3',  $titulosColumnas[11])
        ->setCellValue('M3',  $titulosColumnas[12]);


//Se agregan los datos

    $i = 4; //Numero de fila donde se va a comenzar a rellenar
    $i2 = 1;
    while ($fila = mysqli_fetch_array($resultado)) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $i2)
            ->setCellValue('B'.$i, $fila['tipo'])
            ->setCellValue('C'.$i, $fila['numero_serie'])
            ->setCellValue('D'.$i, $fila['area'])
            ->setCellValue('E'.$i, $fila['usuario'])
            ->setCellValue('F'.$i, $fila['monitor'])
            ->setCellValue('G'.$i, $fila['procesador'])
            ->setCellValue('H'.$i, $fila['cal_procesador'])
            ->setCellValue('I'.$i, $fila['disco_duro'])
            ->setCellValue('J'.$i, $fila['cal_disco_duro'])
            ->setCellValue('K'.$i, $fila['ram'])
            ->setCellValue('L'.$i, $fila['cal_ram'])
            ->setCellValue('M'.$i, $fila['observaciones']);


        $i++;
        $i2++;
    }

    ob_start();
    //ahora se le da estilo

    $estiloTituloReporte = array(
        'font' => array(
            'name'      => 'Verdana',
            'bold'      => true,
            'italic'    => false,
            'strike'    => false,
            'size' =>16,
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

    $estiloTituloColumnas = array(
        'font' => array(
            'name'  => 'Arial',
            'bold'  => true,
            'color' => array(
                'rgb' => 'FFFFFF'
            )
        ),
        'fill' => array(
            'type'	     => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
            'rotation'   => 90,
            'startcolor' => array(
                'rgb' => 'c47cf2'
            ),
            'endcolor' => array(
                'argb' => 'FF431a5d'
            )
        ),
        'borders' => array(
            'top' => array(
                'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                'color' => array(
                    'rgb' => '143860'
                )
            ),
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                'color' => array(
                    'rgb' => '143860'
                )
            )
        ),
        'alignment' =>  array(
            'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'wrap'      => TRUE
        )
    );

    $estiloInformacion = new PHPExcel_Style();
    $estiloInformacion->applyFromArray( array(
        'font' => array(
            'name'  => 'Arial',
            'color' => array(
                'rgb' => '000000'
            )
        ),
        'fill' => array(
            'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
            'color'	=> array(
                'argb' => 'FFd9b7f4')
        ),
        'borders' => array(
            'left' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN ,
                'color' => array(
                    'rgb' => '3a2a47'
                )
            )
        )
    ));

//forma sencilla de dar estilos
    $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray($estiloTituloReporte);
    $objPHPExcel->getActiveSheet()->getStyle('A3:D3')->applyFromArray($estiloTituloColumnas);
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:D".($i-1));


    //ancho de celdas automatico
    for($i = 'A'; $i <= 'D'; $i++){
        $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
    }

    // Se asigna el nombre a la hoja
    $objPHPExcel->getActiveSheet()->setTitle('Alumnos');

// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
    $objPHPExcel->setActiveSheetIndex(0);

// Inmovilizar paneles
//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
    $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

    // Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
   /* header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="ReporteEquipos.xls"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="pruebaexcel5.xls"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    */

    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");;
    header("Content-Disposition: attachment;filename=archivo.xls");
    header("Content-Transfer-Encoding: binary ");

    $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
    $objWriter->save('php://output');


}
else{
    print_r('No hay resultados para mostrar');
}
ob_clean();