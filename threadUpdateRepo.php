<?php
class UpdateThread extends Thread {    
    public function run() {
    	include 'DB/connection.php';
		include 'functions.php';
      	$selected = mysqli_select_db( $conn, "humangut");
		if ($selected) {

			$sql = "SELECT * FROM repositories WHERE revised=1";
			$result = $conn->query($sql);

			if ($result) {
				if( $result->num_rows > 0 ) {
					$counter=1;
	                $weekAgo = date( "Y-m-d H:i:s", strtotime('-1 weeks') );
	                while( $row = $result->fetch_object() ) {
	                	
	                    if( $row->date < $weekAgo && $counter<10) {
	                        $actuallyDay = date( "Y-m-d H:i:s", strtotime('-0 hours') );
	                        $newStatus = statusUrl($row->repository);
	                        $sql = "UPDATE repositories SET status='".$newStatus['status']."', date='".$actuallyDay."' WHERE id=".$row->id."";			
	                        $conn->query($sql);
	                        $counter=$counter+1;

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