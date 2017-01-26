<?php
			$file = fopen("ReporteDatos.txt", "r");
			while(!feof($file)) {
				$datos = fgets($file);
			}
			fclose($file);
			
			$file = fopen("ReporteColumna.txt", "r");
			while(!feof($file)) {
				$columna = fgets($file);
			}
			fclose($file);
			
			if (PHP_SAPI == 'cli')
				die('Este archivo solo se puede ver desde un navegador web');
	
			require_once 'lib/PHPExcel/PHPExcel.php';
	
			// Se crea el objeto PHPExcel
			$objPHPExcel = new PHPExcel();
			
			//$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
			$objDrawing = new PHPExcel_Worksheet_Drawing();
			$objDrawing->setName('Logo Imet');
			$objDrawing->setDescription('Logo Imet');
			$logo = 'img/logo_imet.png'; // Provide path to your logo file
			$objDrawing->setPath($logo);
			$objDrawing->setHeight(120);
			$objDrawing->setWidth(270);
			$objDrawing->setCoordinates('A1');
			$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	
			
			// Se asignan las propiedades del libro
			$objPHPExcel->getProperties()->setCreator("Codedrinks") //Autor
								 ->setLastModifiedBy("Codedrinks") //Ultimo usuario que lo modificó
								 ->setTitle("Reporte Excel con PHP y MySQL")
								 ->setSubject("Reporte Excel con PHP y MySQL")
								 ->setDescription("Reporte de atencion")
								 ->setKeywords("reporte DAIMC")
								 ->setCategory("Reporte excel");
	
			$tituloReporte = "\n \n \n 		DATA DAIMC";
			$titulosColumnas = explode(",", $columna);
			//$titulosColumnas = array('CEDULA', 'NOMBRE', 'SEXO', 'FECHA DE NACIMIENTO');
			$area = "Área de Sistemas";
			
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B1:O1');
	
			$n = sizeof(explode(",", $columna));
	
			if($n == 4) {
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B1',  $tituloReporte)
						->setCellValue('E2',  $area)
						->setCellValue('B3',  $titulosColumnas[0])
						->setCellValue('C3',  $titulosColumnas[1])
						->setCellValue('D3',  $titulosColumnas[2])
						->setCellValue('E3',  $titulosColumnas[3]);
				}
				elseif($n == 9) {
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B1',  $tituloReporte)
						->setCellValue('E2',  $area)
						->setCellValue('B3',  $titulosColumnas[0])
						->setCellValue('C3',  $titulosColumnas[1])
						->setCellValue('D3',  $titulosColumnas[2])
						->setCellValue('E3',  $titulosColumnas[3])
						->setCellValue('F3',  $titulosColumnas[4])
						->setCellValue('G3',  $titulosColumnas[5])
						->setCellValue('H3',  $titulosColumnas[6])
						->setCellValue('I3',  $titulosColumnas[7])
						->setCellValue('J3',  $titulosColumnas[8]);
				}
				elseif($n == 11) {
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B1',  $tituloReporte)
						->setCellValue('E2',  $area)
						->setCellValue('B3',  $titulosColumnas[0])
						->setCellValue('C3',  $titulosColumnas[1])
						->setCellValue('D3',  $titulosColumnas[2])
						->setCellValue('E3',  $titulosColumnas[3])
						->setCellValue('F3',  $titulosColumnas[4])
						->setCellValue('G3',  $titulosColumnas[5])
						->setCellValue('H3',  $titulosColumnas[6])
						->setCellValue('I3',  $titulosColumnas[7])
						->setCellValue('J3',  $titulosColumnas[8])
						->setCellValue('K3',  $titulosColumnas[9])
						->setCellValue('L3',  $titulosColumnas[10]);
				}
				elseif($n == 12) {
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B1',  $tituloReporte)
						->setCellValue('E2',  $area)
						->setCellValue('B3',  $titulosColumnas[0])
						->setCellValue('C3',  $titulosColumnas[1])
						->setCellValue('D3',  $titulosColumnas[2])
						->setCellValue('E3',  $titulosColumnas[3])
						->setCellValue('F3',  $titulosColumnas[4])
						->setCellValue('G3',  $titulosColumnas[5])
						->setCellValue('H3',  $titulosColumnas[6])
						->setCellValue('I3',  $titulosColumnas[7])
						->setCellValue('J3',  $titulosColumnas[8])
						->setCellValue('K3',  $titulosColumnas[9])
						->setCellValue('L3',  $titulosColumnas[10])
						->setCellValue('M3',  $titulosColumnas[11]);
				}
				elseif($n == 13) {
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B1',  $tituloReporte)
						->setCellValue('E2',  $area)
						->setCellValue('B3',  $titulosColumnas[0])
						->setCellValue('C3',  $titulosColumnas[1])
						->setCellValue('D3',  $titulosColumnas[2])
						->setCellValue('E3',  $titulosColumnas[3])
						->setCellValue('F3',  $titulosColumnas[4])
						->setCellValue('G3',  $titulosColumnas[5])
						->setCellValue('H3',  $titulosColumnas[6])
						->setCellValue('I3',  $titulosColumnas[7])
						->setCellValue('J3',  $titulosColumnas[8])
						->setCellValue('K3',  $titulosColumnas[9])
						->setCellValue('L3',  $titulosColumnas[10])
						->setCellValue('M3',  $titulosColumnas[11])
						->setCellValue('N3',  $titulosColumnas[12]);
				}
				else {
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B1',  $tituloReporte)
						->setCellValue('E2',  $area)
						->setCellValue('B3',  $titulosColumnas[0])
						->setCellValue('C3',  $titulosColumnas[1])
						->setCellValue('D3',  $titulosColumnas[2])
						->setCellValue('E3',  $titulosColumnas[3])
						->setCellValue('F3',  $titulosColumnas[4])
						->setCellValue('G3',  $titulosColumnas[5])
						->setCellValue('H3',  $titulosColumnas[6])
						->setCellValue('I3',  $titulosColumnas[7])
						->setCellValue('J3',  $titulosColumnas[8])
						->setCellValue('K3',  $titulosColumnas[9])
						->setCellValue('L3',  $titulosColumnas[10])
						->setCellValue('M3',  $titulosColumnas[11])
						->setCellValue('N3',  $titulosColumnas[12])
						->setCellValue('O3',  $titulosColumnas[13]);
				}
	
			/*
			// Se agregan los titulos del reporte
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B1',  $tituloReporte)
						->setCellValue('E2',  $area)
						->setCellValue('B3',  $titulosColumnas[0])
						->setCellValue('C3',  $titulosColumnas[1])
						->setCellValue('D3',  $titulosColumnas[2])
						->setCellValue('E3',  $titulosColumnas[3]);
			*/
			
			//Se agregan los datos de los alumnos
			$i = 4;
			$j = json_decode($datos,true);
			foreach ($j as $k=>$v) {
				if($n == 4) {
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B'.$i, $v[0])
						->setCellValue('C'.$i, $v[1])
						->setCellValue('D'.$i, $v[2])
						->setCellValue('E'.$i, $v[3]);
				}
				elseif($n == 9) {
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B'.$i, $v[0])
						->setCellValue('C'.$i, $v[1])
						->setCellValue('D'.$i, $v[2])
						->setCellValue('E'.$i, $v[3])
						->setCellValue('F'.$i, $v[4])
						->setCellValue('G'.$i, $v[5])
						->setCellValue('H'.$i, $v[6])
						->setCellValue('I'.$i, $v[7])
						->setCellValue('J'.$i, $v[8]);
				}
				elseif($n == 11) {
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B'.$i, $v[0])
						->setCellValue('C'.$i, $v[1])
						->setCellValue('D'.$i, $v[2])
						->setCellValue('E'.$i, $v[3])
						->setCellValue('F'.$i, $v[4])
						->setCellValue('G'.$i, $v[5])
						->setCellValue('H'.$i, $v[6])
						->setCellValue('I'.$i, $v[7])
						->setCellValue('J'.$i, $v[8])
						->setCellValue('K'.$i, $v[9])
						->setCellValue('L'.$i, $v[10]);
				}
				elseif($n == 12) {
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B'.$i, $v[0])
						->setCellValue('C'.$i, $v[1])
						->setCellValue('D'.$i, $v[2])
						->setCellValue('E'.$i, $v[3])
						->setCellValue('F'.$i, $v[4])
						->setCellValue('G'.$i, $v[5])
						->setCellValue('H'.$i, $v[6])
						->setCellValue('I'.$i, $v[7])
						->setCellValue('J'.$i, $v[8])
						->setCellValue('K'.$i, $v[9])
						->setCellValue('L'.$i, $v[10])
						->setCellValue('M'.$i, $v[11]);
				}
				elseif($n == 13) {
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B'.$i, $v[0])
						->setCellValue('C'.$i, $v[1])
						->setCellValue('D'.$i, $v[2])
						->setCellValue('E'.$i, $v[3])
						->setCellValue('F'.$i, $v[4])
						->setCellValue('G'.$i, $v[5])
						->setCellValue('H'.$i, $v[6])
						->setCellValue('I'.$i, $v[7])
						->setCellValue('J'.$i, $v[8])
						->setCellValue('K'.$i, str_replace('<br />',' ',$v[9]))
						->setCellValue('L'.$i, $v[10])
						->setCellValue('M'.$i, $v[11])
						->setCellValue('N'.$i, $v[12]);
				}
				else {
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B'.$i, $v[0])
						->setCellValue('C'.$i, $v[1])
						->setCellValue('D'.$i, $v[2])
						->setCellValue('E'.$i, $v[3])
						->setCellValue('F'.$i, $v[4])
						->setCellValue('G'.$i, $v[5])
						->setCellValue('H'.$i, $v[6])
						->setCellValue('I'.$i, $v[7])
						->setCellValue('J'.$i, $v[8])
						->setCellValue('K'.$i, str_replace('<br />',' ',$v[9]))
						->setCellValue('L'.$i, $v[10])
						->setCellValue('M'.$i, $v[11])
						->setCellValue('N'.$i, $v[12])
						->setCellValue('O'.$i, $v[13]);
				}
				$i++;
			}
			
			/*
			while ($fila = mysql_fetch_array($result)) {
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B'.$i,  $fila[0])
						->setCellValue('C'.$i,  $fila[1])
						->setCellValue('D'.$i,  $fila[2])
						->setCellValue('E'.$i, $fila[3]);
						$i++;
			}
			*/
			
			$estiloTituloReporte = array(
				'font' => array(
					'name'      => 'Verdana',
					'bold'      => true,
					'italic'    => false,
					'strike'    => false,
					'size' => 16,
					'color'     => array(
							'rgb' => '000000'
						)
				),
				'fill' => array(
					'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
					'color'	=> array('argb' => 'FFFFFFFF')
				),
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_NONE                    
					)
				), 
				'alignment' =>  array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'   => 0,
						'wrap'          => TRUE
				)
			);
	
			$estiloTituloColumnas = array(
				'font' => array(
					'name'      => 'Arial',
					'bold'      => true,                          
					'color'     => array(
						'rgb' => '000000'
					)
				),
				'fill' 	=> array(
					'type'		=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
					'rotation'   => 90,
					'startcolor' => array(
						'rgb' => 'FFFFFF'
					),
					'endcolor'   => array(
						'argb' => 'FFFFFFFF'
					)
				),
				'borders' => array(
					'top'     => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN ,
						'color' => array(
							'rgb' => '000000'
						)
					),
					'left'     => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN ,
						'color' => array(
							'rgb' => '000000'
						)
					),
					'right'     => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN ,
						'color' => array(
							'rgb' => '000000'
						)
					),
					'bottom'     => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN ,
						'color' => array(
							'rgb' => '000000'
						)
					)
				),
				'alignment' =>  array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'wrap'          => TRUE
				));
				
			$estiloInformacion = new PHPExcel_Style();
			$estiloInformacion->applyFromArray(
				array(
					'font' => array(
					'name'      => 'Arial',               
					'color'     => array(
						'rgb' => '000000'
					)
				),
				'fill' 	=> array(
					'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
					'color'		=> array('argb' => 'FFFFFFFF')
				),
				'borders' => array(
					'left'     => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN ,
						'color' => array(
							'rgb' => '000000'
						)
					),
					'bottom'     => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN ,
						'color' => array(
							'rgb' => '000000'
						)
					),
					'right'     => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN ,
						'color' => array(
							'rgb' => '000000'
						)
					),
				),
				'alignment' =>  array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'   => 0,
						'wrap'          => TRUE
				)
			));
			 
			$objPHPExcel->getActiveSheet()->getStyle('B1:O1')->applyFromArray($estiloTituloReporte);
			$objPHPExcel->getActiveSheet()->getStyle('B3:O3')->applyFromArray($estiloTituloColumnas);		
			$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "B4:O".($i-1));
			$objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(120);
			
			for($i = 'B'; $i <= 'O'; $i++){
				$objPHPExcel->setActiveSheetIndex(0)			
					->getColumnDimension($i)->setAutoSize(TRUE);
			}
			
			// Se asigna el nombre a la hoja
			$objPHPExcel->getActiveSheet()->setTitle('DAIMC');
	
			// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
			$objPHPExcel->setActiveSheetIndex(0);
			// Inmovilizar paneles 
			//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
			$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);
	
			// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Reportedealumnos.xlsx"');
			header('Cache-Control: max-age=0');
	
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit;
			
?>