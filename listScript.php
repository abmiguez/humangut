<?php
	include 'DB/connection.php';
	include 'functions.php';
	
	$jsondata = array();
 
  	$selected = mysqli_select_db( $conn, "humangut"  );
	if ($selected){


		$sql = "SELECT * FROM repositories WHERE revised=1";
		$result = $conn->query($sql);
		if ( $result) {

			if( $result->num_rows > 0 ) {

				$jsondata["successRepositories"] = true;
				$jsondata["dataRepositories"]["message"] = sprintf("%d results have been found", $result->num_rows);
				$jsondata["dataRepositories"]["repositories"] = array();
				while( $row = $result->fetch_object() ) {
					$weekAgo = date( "Y-m-d H:i:s", strtotime('-1 weeks') );

					if( $row->date < $weekAgo)
					{
						$actuallyDay = date( "Y-m-d H:i:s", strtotime('-0 hours') );
						$newStatus = statusUrl($row->repository);
						$sql = "UPDATE repositories SET status='".$newStatus['status']."', date='".$actuallyDay."' WHERE id=".$row->id."";			
						$conn->query($sql);

						$sql = "SELECT * FROM repositories";
						$result = $conn->query($sql);
						if ( $result) {
							while( $row = $result->fetch_object() ) {
								$jsondata["dataRepositories"]["repositories"][] = $row;
							}
						}

					}else{
						$jsondata["dataRepositories"]["repositories"][] = $row;
					}// if / else update date and status

				}// main while loop repositories
			
     
	       	} else {
	     
				$jsondata["successRepositories"] = false;
				$jsondata["dataRepositories"] = array(
					'message' => 'No results found.'
				);
	     
	       }

   
	    } else {
	   
	    		$jsondata["successRepositories"] = false;
				$jsondata["dataRepositories"] = array(
					'message' => $database->error
				);
	   
	    	}



	    // UPDATE
	    $sqlInfo = "SELECT * FROM info WHERE revised=1";
		$resultInfo = $conn->query($sqlInfo);
		if ( $resultInfo) {

			if( $resultInfo->num_rows > 0 ) {

				while( $rowInfo = $resultInfo->fetch_object() ) {
					$weekAgoTool = date( "Y-m-d H:i:s", strtotime('-1 weeks') );

					if( $rowInfo->date < $weekAgoTool)
					{
						$actuallyDayTool = date( "Y-m-d H:i:s", strtotime('-0 hours') );
						$newStatusTool = statusUrl($rowInfo->tool);

						$sqlInfoUpdate = "UPDATE info SET status='".$newStatusTool['status']."', date='".$actuallyDayTool."' WHERE idInfo=".$rowInfo->idInfo."";
						
						$conn->query($sqlInfoUpdate);

					}

				}// main while loop repositories
     
	       	} 

	    } // END OF UPDATE DATE


	    //INFORMATION FAMILY and Tool
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


  	}// sselected database
 
  	header('Content-type: application/json; charset=utf-8');
  	
  	echo json_encode($jsondata, JSON_FORCE_OBJECT);
 
  	$conn->close();

?>