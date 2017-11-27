<?php
	include 'DB/connection.php';
	include 'functions.php';
	
	$jsondata = array(); 
  	$selected = mysqli_select_db( $conn, "humangut");
	if ($selected) {
		$sql = "SELECT * FROM repositories WHERE revised=1";
		$result = $conn->query($sql);
		if ($result) {
			if( $result->num_rows > 0 ) {
				$jsondata["successRepositories"] = true;
				$jsondata["dataRepositories"]["message"] = sprintf("%d results have been found", $result->num_rows);
				$jsondata["dataRepositories"]["repositories"] = array();
				$counter=1;
                $weekAgo = date( "Y-m-d H:i:s", strtotime('-1 weeks') );
                while( $row = $result->fetch_object() ) {
                    if( $row->date < $weekAgo && $counter<10) {
                        $actuallyDay = date( "Y-m-d H:i:s", strtotime('-0 hours') );
                        $newStatus = statusUrl($row->repository);
                        $sql = "UPDATE repositories SET status='".$newStatus['status']."', date='".$actuallyDay."' WHERE id=".$row->id."";			
                        $conn->query($sql);
                        $jsondata["dataRepositories"]["repositories"][] = $row;
                        $counter=$counter+1;
                    } else {
                        $jsondata["dataRepositories"]["repositories"][] = $row;
                    }
				}
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
  	} 
  	header('Content-type: application/json; charset=utf-8');  	
  	echo json_encode($jsondata, JSON_FORCE_OBJECT); 
  	$conn->close();
?>
