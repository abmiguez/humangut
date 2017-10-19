<?php



// function upload 

function upload ($file)
{
	$target_dir = "uploads/";
	$target_file = $target_dir . basename( $file );

	$uploadInfo['okUpload'] = false;

	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$uploadInfo['okUpload'] = true;
		$uploadInfo['fileName'] = $target_file;

	} else {
        $uploadInfo['okUpload'] = false;
    }

    return $uploadInfo;


}

//function check URL
function statusUrl($nameTool)
{
	
	$regex = '/(http:\/\/[^\s]+)/';
	$regex2 = '/(https:\/\/[^\s]+)/';
	$urlInfo = array("url" => "", "status" => 0);
	if ( preg_match($regex,$nameTool,$url) ) {
		$urlInfo["url"] = str_replace(")", "", $url[0]);
		
	}else{
		if ( preg_match($regex2,$nameTool,$url) )
		{
			$urlInfo["url"] = str_replace(")", "", $url[0]);
		}
	}

	
	if( url_test($urlInfo["url"]) ) {
	  $urlInfo["status"] = 1;
	}
	else {
		$urlInfo["status"] = 0;
	}
	
	return $urlInfo;
}
			
			
			
	       
	     		   
function url_test( $url ) {
  $timeout = 0.5;
  $ch = curl_init();
  $status = false;
  curl_setopt ( $ch, CURLOPT_URL, $url );
  curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
  curl_setopt ( $ch, CURLOPT_TIMEOUT, $timeout );
  curl_setopt ( $ch, CURLOPT_NOBODY, false );
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, true );
         


  $http_respond = curl_exec($ch);
  $http_respond = trim( strip_tags( $http_respond ) );
  $http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
    	
  switch ($http_code) {
  	case '200':
  		$status = true;	

  		break;

  	case '301':
			$status = true;

  		break;

  	case '302':
  		$header = (get_headers($url));
  		$location = $header[1];

  		$location = str_replace("Location: ", "", $location );
  		$timeout = 20;
		$ch = curl_init();
		$status = false;
		curl_setopt ( $ch, CURLOPT_URL, $location );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_NOBODY, false );
		curl_setopt ( $ch, CURLOPT_TIMEOUT, $timeout );
		curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, true );
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
        
        $http_respond = curl_exec($ch);
		$http_respond = trim( strip_tags( $http_respond ) );
		$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );

		if ($http_code == 200){
			$status = true;
		}

  		break;


  	default:
  		$status = false;
  		break;
  }
  curl_close( $ch );
  return $status;
}

// function takeExcelFamilytools
function takeExcelFamilytools( $fileName )
{
	error_reporting(E_ALL);
	set_time_limit(0);

	$returnArray = array();
	$inputFileType = 'Excel2007';
	$inputFileName = $fileName;
	
	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
	$objReader->setLoadAllSheets();
	$objPHPExcel = $objReader->load($inputFileName);


	$numberSheet =  $objPHPExcel->getSheetCount();
	$loadedSheetNames = $objPHPExcel->getSheetNames();

	$j = 0;
	for ( $i=1; $i<$numberSheet; $i++ ) {
		if ( $loadedSheetNames[$i] != "Data respositories" )
		{

			$returnArray[$j] = $loadedSheetNames[$i];
			$j++;
		}

	}
	return $returnArray;

}

// function takeExcelInformation

function takeExcelInformationFamily( $fileNAme )
{
	error_reporting(E_ALL);
	set_time_limit(0);
	/** PHPExcel_IOFactory */
	$arraySheetsData = array();

	$returnArray = array();
	$inputFileType = 'Excel2007';
	$inputFileName = $fileNAme;
	


	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
	$objReader->setLoadAllSheets();
	$objPHPExcel = $objReader->load($inputFileName);


	$numberSheet =  $objPHPExcel->getSheetCount();
	$loadedSheetNames = $objPHPExcel->getSheetNames();

	for ( $i=1; $i<$numberSheet; $i++ ) {
		

		$objReader->setLoadSheetsOnly($loadedSheetNames[$i]);
		
		$objPHPExcel->setActiveSheetIndexByName($loadedSheetNames[$i]);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		$arraySheetsData[$loadedSheetNames[$i]] = $sheetData;
	}

	
	// clean excel
	
	$keys = array_keys($arraySheetsData);
	for  ($j = 0; $j<count($keys); $j++)
	{
		if ($keys[$j] != "Data respositories")
		{
		$l = 0;
		$arraySheet = $arraySheetsData[$keys[$j]];

			for ( $k = 2; $k<count($arraySheet); $k++)
			{
				if( $arraySheet[$k]["A"] != "" )
				{
					
					$statusTool = statusUrl($arraySheet[$k]["A"]);
				//	$statusTool["status"] = 1;
				//	$statusTool["url"] = "";

					$returnArray[$keys[$j]][$l] = array(
							"tool" => $arraySheet[$k]["A"],
							"osInfrastructure" => $arraySheet[$k]["B"],
							"public" => $arraySheet[$k]["C"],
							"language" => $arraySheet[$k]["D"],
							"inputs" => $arraySheet[$k]["E"],
							"outputs" => $arraySheet[$k]["F"],
							"mainFeatures" => $arraySheet[$k]["G"],
							"purpose" => $arraySheet[$k]["H"],
							"status" => $statusTool
						);
					$l++;
				}else{
					$lastPosition = $l - 1;
					$returnArray[$keys[$j]][$lastPosition]["osInfrastructure"].=$arraySheet[$k]["B"];
					$returnArray[$keys[$j]][$lastPosition]["public"].=$arraySheet[$k]["C"];
					$returnArray[$keys[$j]][$lastPosition]["language"].=$arraySheet[$k]["D"];
					$returnArray[$keys[$j]][$lastPosition]["inputs"].=$arraySheet[$k]["E"];
					$returnArray[$keys[$j]][$lastPosition]["outputs"].=$arraySheet[$k]["F"];
					$returnArray[$keys[$j]][$lastPosition]["mainFeatures"].=$arraySheet[$k]["G"];
					$returnArray[$keys[$j]][$lastPosition]["purpose"].=$arraySheet[$k]["H"];
				}// END OF IF/ELSE COLAPSE
			}
		}// end of if not equals data respositories

	}
	
	return $returnArray;


}


function takeExcelInformationRespositories( $fileNAme ){

	error_reporting(E_ALL);
	set_time_limit(0);
	/** PHPExcel_IOFactory */
	$arraySheetsData = array();

	$returnArray = array();
	//include 'Classes/PHPExcel/IOFactory.php';
	$inputFileType = 'Excel2007';
	$inputFileName = $fileNAme;
	
	$sheet = "Data repositories";


	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
	$objReader->setLoadAllSheets();
	$objPHPExcel = $objReader->load($inputFileName);

	
	//$objReader->setLoadSheetsOnly($sheet);
	$objReader->setLoadSheetsOnly($sheet);
	$objPHPExcel = $objReader->load($inputFileName);
	$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	$j = 0;
	$returnArray = array();
	for ( $i = 2; $i<count($sheetData); $i++)
	{
		if( $sheetData[$i]["A"] != "" )
		{
			$type = $sheetData[$i]["A"];
			
			
		}
		$status = statusUrl($sheetData[$i]["B"]);
		//$status = 1;
		$returnArray[$j] = array(
				"type" => $type,
				"repository" => $sheetData[$i]["B"],
				"volume" => $sheetData[$i]["C"],
				"downloadable" => $sheetData[$i]["D"],
				"webService" => $sheetData[$i]["E"],
				"purpose" => $sheetData[$i]["F"],
				"status" => $status
			);
		$j++;
	}//end of main for to excel
		
	return $returnArray;

}
// end of function takeExcelInformationRespositories

function addFamilies($arrayFamilies){
	
	include 'DB/connection.php';
	include 'model/family.php';

	

	

	$selected = mysqli_select_db( $conn, "humangut"  );
	if ($selected){
		for( $i = 0; $i<count($arrayFamilies); $i++ ){
			$sql = "SELECT name FROM familytool WHERE name = '".$arrayFamilies[$i]."' ";
			$result = $conn->query($sql);
			if ( $result) {
				if( $result->num_rows == 0 ) {
					$sqlAdd = "INSERT INTO familytool ( name) VALUES ('". $arrayFamilies[$i]."')";
					if ($conn->query($sqlAdd) === TRUE) {
					   $newFamilies = $arrayFamilies;
					} else {
					    echo "Error: " . $sqlAdd . "<br>" . $conn->error;
					}
				}
			}
		}
		$allFamilies = array();

		$sqlAll = "SELECT * FROM familytool";
		$resultAll = $conn->query($sqlAll);
		$k=0;

		if( $resultAll->num_rows > 0 ) {
			while($row = $resultAll->fetch_object() )
			{
				$returnArray[$k] = $row->name;
				$k++;
			}
		}

	}//end of selected
	return $returnArray;

}


function addInfo($arrayInformation){
	include 'DB/connection.php';
	include 'model/tool.php';

	$toolArray = array();

	$selected = mysqli_select_db( $conn, "humangut"  );
	if ($selected){

			$arrayLength = count($arrayInformation);
			$keys = array_keys($arrayInformation);
			
			for ($i = 0; $i<count($keys); $i++){
				$familyFK = "SELECT idFamilyTool FROM familytool WHERE name='".$keys[$i]."'";
				$k = 0;
				
				$resultFK = $conn->query($familyFK);
				
				if( $resultFK->num_rows > 0 ) {
					while($row = $resultFK->fetch_object() )
					{
						$familyFK =  $row->idFamilyTool;
					}
				}		
				for ($j = 0; $j<count($arrayInformation[ $keys[$i] ]); $j++)
				{
					
					$tool = new Tool;
					$tool->name = $arrayInformation[ $keys[$i] ] [$j] ["tool"];
					$tool->osInfrastructure = $arrayInformation[ $keys[$i] ] [$j] ["osInfrastructure"];
					$tool->public = $arrayInformation[ $keys[$i] ] [$j] ["public"];
					$tool->language =  $arrayInformation[ $keys[$i] ] [$j] ["language"];
					$tool->inputs =  $arrayInformation[ $keys[$i] ] [$j] ["inputs"];
					$tool->outputs =  $arrayInformation[ $keys[$i] ] [$j] ["outputs"];
					$tool->mainFeatures =  $arrayInformation[ $keys[$i] ] [$j] ["mainFeatures"];
					$tool->purpose =  $arrayInformation[ $keys[$i] ] [$j] ["purpose"];
					$tool->familyFK = $familyFK;	
					$tool->date =  date( "Y-m-d H:i:s", strtotime('-0 hours') );

					$tool->status = $arrayInformation[ $keys[$i] ] [$j]["status"]["status"];
					$tool->url = $arrayInformation[ $keys[$i] ] [$j]["status"]["url"];
					$tool->revised = 1;

					$sql = "INSERT INTO info ( tool, publicPrivate, language, osInfrastructure, inputs, outputs, mainFeatures, purpose, date, status, familyFK, url, revised )
					VALUES ('". $tool->name."', '". $tool->public."', '". $tool->language."', 
							'". $tool->osInfrastructure."', '". $tool->inputs."', 
							'". $tool->outputs."', '". $tool->mainFeatures."', '". $tool->purpose."', 
							'". $tool->date."', '". $tool->status."', '". $tool->familyFK."',
							'". $tool->url."', '". $tool->revised."')";

					if ($conn->query($sql) === TRUE) {
					   
						// create array tool[family][offset]
					   $toolArray[$keys[$i]][$k] = $tool;
					   $k++;
					   
					} else {
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}


				}// end of main for to add in database

				
					
	
			}// en of main for to read information


	}else{
		echo('Error selected database');
	}

	return $toolArray;
}// end of fucntion addinfo()



function addRepositories($arrayRepositories){
	include 'DB/connection.php';
	include 'model/repository.php';

	$repositoryArray = array();

	$selected = mysqli_select_db( $conn, "humangut"  );
	if ($selected){

			$j = 0;
	
			for ($i = 0; $i<count($arrayRepositories); $i++)
			{
				$repository = new Repository;
				$repository->type = $arrayRepositories[$i]["type"];
				$repository->webService = $arrayRepositories[$i]["webService"];
				$repository->repository = $arrayRepositories[$i]["repository"];
				$repository->purpose =  $arrayRepositories[$i]["purpose"];
				$repository->volume =  $arrayRepositories[$i]["volume"];
				$repository->downloadable =  $arrayRepositories[$i]["downloadable"];
				$repository->date =  date( "Y-m-d H:i:s", strtotime('-0 hours') );
				$repository->status = $arrayRepositories[$i]["status"]["status"];
				$repository->url = $arrayRepositories[$i]["status"]["url"];
				$repository->revised = 1;


				$sql = "INSERT INTO repositories ( type, webService, repository, purpose, volume, downloadable, status, date, revised, url)
				VALUES ('". $repository->type."', '". $repository->webService."', 
						'". $repository->repository."', '". $repository->purpose."',
						'". $repository->volume."', '". $repository->downloadable."',
						'". $repository->status."', '". $repository->date."',
						'". $repository->revised."','". $repository->url."')";

				if ($conn->query($sql) === TRUE) {
				   $repositoryArray[$j] = $repository;
				   $j++;
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}


			}// end of main for to add in database

				

	}else{
		echo('Error selected database');
	}

	return $repositoryArray;
}// end of fucntion addinfo()



function addForm($object, $type){

	include 'DB/connection.php';

	$result=array();

	if($type == "repo"){
		include 'model/repository.php';

		
		$repository = new Repository;
		$repository->type = $object["type"];
		$repository->webService = $object["webService"];
		$repository->repository = $object["repository"];
		$repository->purpose =  $object["purpose"];
		$repository->volume =  $object["volume"];
		$repository->downloadable =  $object["downloadable"];
		$repository->date =  date( "Y-m-d H:i:s", strtotime('-0 hours') );

		$status = statusUrl($object["repository"]);

		$repository->status = $status["status"];
		$repository->url = $status["url"];
		$repository->revised = 0;

		// TIME TO ADD NEW REPOSITORY
		$selected = mysqli_select_db( $conn, "humangut"  );
		if ($selected){


			$sql = "INSERT INTO repositories ( type, webService, repository, purpose, volume, downloadable, status, date, revised, url)
			VALUES ('". $repository->type."', '". $repository->webService."', '". $repository->repository."', '". $repository->purpose."',
					'". $repository->volume."', '". $repository->downloadable."','". $repository->status."', '". $repository->date."',
					'". $repository->revised."','". $repository->url."')";

			if ($conn->query($sql) === TRUE) {
				$result["repository"] = $repository;
			   $result["database"] = "Send correctly:";
			} else {
				$result["database"] = $conn->error;
			    
			}
			return $result;
		
		}
			

	}else{
		include 'model/tool.php';

		
		$tool = new Tool;
		$tool->tool = $object["tool"];
		$tool->publicPrivate = $object["publicPrivate"];
		$tool->osInfrastructure = $object["osInfrastructure"];
		$tool->familyFK =  $object["family"];
		$tool->inputs =  $object["inputs"];
		$tool->outputs =  $object["outputs"];
		$tool->mainFeataures =  $object["mainFeataures"];
		$tool->purpose =  $object["purposeTool"];
		$tool->date =  date( "Y-m-d H:i:s", strtotime('-0 hours') );

		$status = statusUrl($object["tool"]);

		$tool->status = $status["status"];
		$tool->url = $status["url"];
		$tool->revised = 0;

		// TIME TO ADD NEW REPOSITORY
		$selected = mysqli_select_db( $conn, "humangut"  );
		if ($selected){


			$sql = "INSERT INTO info ( tool, publicPrivate, language, osInfrastructure, inputs, outputs, mainFeatures, purpose, date, status, familyFK, url, revised )
					VALUES ('". $tool->name."', '". $tool->public."', '". $tool->language."', '". $tool->osInfrastructure."', '". $tool->inputs."', 
							'". $tool->outputs."', '". $tool->mainFeatures."', '". $tool->purpose."', '". $tool->date."', '". $tool->status."', '". $tool->familyFK."',
							'". $tool->url."', '". $tool->revised."')";

			if ($conn->query($sql) === TRUE) {
				$result["tool"] = $tool;
			   $result["database"] = "Add correctly";
			} else {
				$result["database"] = $conn->error;
			    
			}
		
		}
		return $result;

	}



}// end of addForm



function getFamilies(){
	include 'DB/connection.php';


	$selected = mysqli_select_db( $conn, "humangut"  );
	if ($selected){

		$returnFamilies = array();

		$sql = "SELECT * FROM familytool";
		$result = $conn->query($sql);
		$i = 0;

		if( $result->num_rows > 0 ) {
			while($row = $result->fetch_object() )
			{
				$returnFamilies[$i]["idFamilyTool"] = $row->idFamilyTool;	
				$returnFamilies[$i]["name"] = $row->name;
				$i++;
			}
		}

		return $returnFamilies;

	}


}
// end of get families