<?php
class UpdateThread extends Thread {    
    public function run() {
    	include 'DB/connection.php';
		include 'functions.php';
      	$selected = mysqli_select_db( $conn, "humangut");
		if ($selected){
		    $sqlInfo = "SELECT * FROM info WHERE revised=1";
			$resultInfo = $conn->query($sqlInfo);
			if ( $resultInfo) {
				if( $resultInfo->num_rows > 0 ) {
	                $counter=1;
					$weekAgoTool = date( "Y-m-d H:i:s", strtotime('-1 weeks') );
	                while( $rowInfo = $resultInfo->fetch_object() ) {
						if($counter == 10){
	                      break;
	                    }else{
	                      if( $rowInfo->date < $weekAgoTool)
	                      {
	                          $actuallyDayTool = date( "Y-m-d H:i:s", strtotime('-0 hours') );
	                          $newStatusTool = statusUrl($rowInfo->tool);
	                          $sqlInfoUpdate = "UPDATE info SET status='".$newStatusTool['status']."', date='".$actuallyDayTool."' WHERE idInfo=".$rowInfo->idInfo."";
	                          $conn->query($sqlInfoUpdate);
	                          $counter=$counter+1;
	                      }
	                  }
					}
		       	} 
		    }
		}
	}
}

	$thread = new UpdateThread();
	$thread->start();

?>