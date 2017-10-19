<?php
error_reporting(E_ALL);
set_time_limit(0);
/** PHPExcel_IOFactory */
include 'Classes/PHPExcel/IOFactory.php';
?>
<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css" >
	</head>
	<body>
	<h1> Vamos allá </h1>

	<?php

		$inputFileName = 'excel/example.xls';


		echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);


		echo '<hr />';

		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		//var_dump($sheetData);
		var_dump($sheetData[1]);
	?>
	
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>