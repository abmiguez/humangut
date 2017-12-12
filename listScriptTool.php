<?php
	include 'DB/connection.php';
	include 'functions.php';
	
	$jsondata = array(); 
  	$selected = mysqli_select_db( $conn, "humangut"  );
	if ($selected){

  	  $sqlFamilly = "SELECT * FROM familytool";
	    $resultFamily = $conn->query($sqlFamilly);
	    $familyArray = array();
		if ( $resultFamily) {
			if( $resultFamily->num_rows > 0 ) {
				$l = 0;
				while( $rowFamily = $resultFamily->fetch_object() ) {
					$jsondata["dataFamilies"]["family"][] = $rowFamily;
					$sqlInfoTool = "SELECT * FROM info WHERE revised=1 and familyFK='".$rowFamily->idFamilyTool."'";
					$resultInfoTool = $conn->query($sqlInfoTool);
					
					if ( $resultInfoTool) {
						if( $resultInfoTool->num_rows > 0 ) {
							$jsondata["successInfo"][$l] = true;
							$jsondata["dataInfo"][$l]["nameFamily"] = $rowFamily->name;
							$jsondata["dataInfo"][$l]["message"] = 
									sprintf("%d results have been found", $resultInfoTool->num_rows);
							$jsondata["dataInfo"][$l]["info"] = array();
							
							while( $rowInfoTool = $resultInfoTool->fetch_object() ) {
								
								$jsondata["dataInfo"][$l]["info"][] = $rowInfoTool;
								
							}// main while loop repositories
						} else {
								$jsondata["successInfo"][$l] = false;
								$jsondata["dataInfo"][$l] = array(
									'message' => 'No results found.'
								);
					       }
				    } else {
				    		$jsondata["successInfo"][$l] = false;
							$jsondata["dataInfo"][$l] = array(
								'message' => $database->error
							);
				    	}
				    	$l++;
				}// end of while result family
			}// end of if num rows familiy
		}// end of if result family
	} 
  	header('Content-type: application/json; charset=utf-8');  	
  	echo json_encode($jsondata, JSON_FORCE_OBJECT); 
  	$conn->close();
?>
