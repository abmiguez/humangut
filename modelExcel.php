<?php
	include 'functions.php';
	include 'tools/head.php';
	include 'Classes/PHPExcel/IOFactory.php';

	$file =  $_FILES["fileToUpload"]["name"];
	$uploadInfo = upload($file);

?>
	<h1> Upload page </h1>

<?php
	if ( $uploadInfo['okUpload'])
	{
		$arrayInformation = takeExcelInformationFamily( $uploadInfo['fileName'] );
		$arrayFamily = takeExcelFamilytools($uploadInfo['fileName'] );
		$arrayDataRepositories = takeExcelInformationRespositories( $uploadInfo['fileName']);

		$jsonArray = json_encode($arrayInformation);
		$jsonArrayRespositories = json_encode($arrayDataRepositories);
		$jsonArrayFamilyTool = json_encode($arrayFamily);
		?>

		<form action="createTool.php" method="post" enctype="multipart/form-data">
			<div class="form-group" id="addinfo">
               	<input type="hidden" id="fileToUpload" name="info" value='<?php echo $jsonArray ?>' />
               	<input type="hidden" id="fileToUpload" name="repositories" value='<?php echo $jsonArrayRespositories ?>' />
               	<input type="hidden" id="fileToUpload" name="families" value='<?php echo $jsonArrayFamilyTool ?>' />
           		<button type="submit" id="submitButtonExcel" name="submit" class="btn btn-default">Add Tables</button>
			</div>
		</form>
		
		<ul class="nav nav-tabs tabsGut">
			<li class="active"><a data-toggle="tab" href="#data">Data Repositories</a></li>
			<?php
				$keys = array_keys($arrayInformation);

				for ($n = 0; $n < count($keys); $n++)
				{
				$keysClean = str_replace(' ', '', $keys[$n]);
				?>
					
					<li><a data-toggle="tab" href="#<?php echo $keysClean; ?>"><?php echo $keys[$n]; ?></a></li>
				<?php
				}
			?>
		    
		</ul>
		<div class="tab-content">    
			<div id="data" class="tab-pane fade in active">
				<table class="table table-bordered tableExcel">
					<thead>
						<tr>
						    <th>Type</th>
						    <th>Repository</th>
						    <th>Volume</th>
						    <th>Downloadable</th>
						    <th>Web Service</th>
						    <th>Purpose</th>
						</tr>
					</thead>
					<tbody>
					<?php
					for($m = 0; $m<count($arrayDataRepositories); $m++)
					{
						$repository = substr( $arrayDataRepositories[$m]["webService"] , 0, 15);
						$webService = substr( $arrayDataRepositories[$m]["repository"], 0, 15 );
						$purpose =  substr( $arrayDataRepositories[$m]["purpose"], 0, 15);

						if( $arrayDataRepositories[$m]["status"]["status"] == 1){
								$colorTable = "greenSuccessTable";
							}else{
								$colorTable = "redDangerTable";

							}
								
						?>
						<tr class="<?php echo $colorTable; ?>" >
							<th> <?php echo $arrayDataRepositories[$m]["type"]; ?> </th>
							<td> <?php echo $repository; ?> </td>
							<td> <?php echo $arrayDataRepositories[$m]["volume"]; ?> </td>
							<td> <?php echo $arrayDataRepositories[$m]["downloadable"]; ?> </td>
							<td> <?php echo $webService; ?> </td>
							<td> <?php echo $purpose; ?> </td>
						</tr>
					<?php
					}
				?>
					</tbody>
				</table>
			</div><!-- end of data repostories fade -->
		
		

				<?php
		
		for  ($i = 0; $i<count($arrayInformation); $i++)
		{
		$keysClean = str_replace(' ', '', $keys[$i]);
		?>
		<div id="<?php echo $keysClean; ?>" class="tab-pane fade">

			<table class="table table-bordered tableExcel">
			  <thead>
			    <tr>
			      <th>Tool</th>
			      <th>OS Infrastructure</th>
			      <th>Public/Private</th>
			      <th>Language</th>
			      <th>Inputs</th>
			      <th>Outputs</th>
			      <th>Main Features</th>
			      <th>Purpose</th>
			    </tr>
			  </thead>
			  <tbody>
			<?php
				
				$arraySheet = $arrayInformation[$keys[$i]];
				
					
				for ( $j=2; $j<count($arraySheet) ; $j++ )
				{
					$tool = substr( $arraySheet[$j]["tool"], 0, 15 );
					$inputs = substr( $arraySheet[$j]["inputs"], 0, 15 );
					$outputs = substr( $arraySheet[$j]["outputs"], 0, 15 );
					$mainFeatures = substr( $arraySheet[$j]["mainFeatures"], 0, 15 );
					$purpose = substr( $arraySheet[$j]["purpose"], 0, 15 );

					if( $arraySheet[$j]["status"]["status"] == 1){
						$colorTable = "greenSuccessTable";
					}else{
						$colorTable = "redDangerTable";

					}

						?>
						<tr class="<?php echo $colorTable; ?>">
						    <th scope="row">  <?php echo $tool; ?> </th>
						    <td> <?php echo $arraySheet[$j]["osInfrastructure"]; ?> </td>
						    <td> <?php echo $arraySheet[$j]["public"]; ?> </td>
						    <td> <?php echo $arraySheet[$j]["language"]; ?> </td>
						    <td> <?php echo $inputs; ?> </td>
						    <td> <?php echo $outputs; ?> </td>
						    <td> <?php echo $mainFeatures; ?> </td>
						    <td> <?php echo $purpose; ?> </td>
					    </tr>
					<?php
				}// for != data respositories
			?>
				</tbody>
			</table>
		</div><!-- end of tab for family -->
			<?php
		}
	?>

	
	</div><!-- end of tabs-->
	<?php
	}else{
		echo "Sorry, there was an error uploading your file.";

	}

?>

<?php include 'tools/footer.php'; ?>