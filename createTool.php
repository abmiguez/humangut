<?php

	include 'functions.php';
	include 'tools/head.php';


	$jsonTool = $_POST['info'];
	$jsonRepositories = $_POST['repositories'];
	$jsonFamilies = $_POST['families'];


	$arrayInformation = json_decode($jsonTool, true);
	$arrayRepositories = json_decode($jsonRepositories, true);
	$arrayFamilies = json_decode($jsonFamilies, true);

	$families = addFamilies($arrayFamilies);
	
	
	$tool = addinfo($arrayInformation);

	
	$repository = array();
	$repository = addRepositories($arrayRepositories);
	

	?>
	<h1> Add correctly </h1>

	<ul class="nav nav-tabs tabsCreateTool">
    	<li class="active"><a data-toggle="tab" href="#data">Data repositories</a></li>
    	<?php
    		for( $k = 0; $k<count($families); $k++)
    		{
    		$refFamily = str_replace(' ', '', $families[$k]);
    		?>
    		<li><a data-toggle="tab" href="#<?php echo $refFamily; ?>"> <?php echo $families[$k]; ?></a></li>	

    		<?php
    		}
    	?>
    	
  	</ul>

 	<div class="tab-content">
   		<div id="data" class="tab-pane fade in active">
	      	<table class="table table-bordered">
				<thead>
					<tr>
						<th>Type</th>
						<th>Web Service</th>
						<th>Repository</th>
						<th>Volume</th>
						<th>Downloadable</th>
						<th>Purpose</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for($j=0; $j<count($repository); $j++)
					{
						$purpose = substr( $repository[$j]->purpose , 0, 30);
						$repositoryParameter = substr( $repository[$j]->repository , 0, 30);
						$webService = substr( $repository[$j]->webService , 0, 30);
						if( $repository[$j]->status == 1){
							$colorTable = "greenSuccessTable";
						}else{
							$colorTable = "redDangerTable";

						}
						?>
						<tr class="<?php echo $colorTable; ?>">
							<td> <?php echo $repository[$j]->type; ?></td>
							<td> <?php echo $webService; ?></td>
							<td> <?php echo $repositoryParameter; ?></td>
							<td> <?php echo $repository[$j]->volume; ?></td>
							<td> <?php echo $repository[$j]->downloadable; ?></td>
							<td> <?php echo $purpose; ?></td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>

    	</div>
    		<?php
    			for( $i=0 ; $i<count($families) ; $i++)
    			{	
    				$familyName = $families[$i];
    				$nameFamilyID = str_replace(' ','', $families[$i]);
    		?>
    	
    	<div id="<?php echo $nameFamilyID; ?>" class="tab-pane fade">
			<table class="table table-bordered">
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
					for($l = 0; $l<count($tool[$familyName]); $l++ )
					{
						$name = substr($tool[$familyName][$l]->name, 0 , 10);
						$inputs = substr($tool[$familyName][$l]->inputs, 0 , 10);
						$outputs = substr($tool[$familyName][$l]->outputs, 0 , 10);
						$mainFeatures = substr($tool[$familyName][$l]->mainFeatures, 0 , 10);
						$purpose = substr($tool[$familyName][$l]->purpose, 0 , 10);
					
					if( $tool[$familyName][$l]->status == 1){
						$colorTable = "greenSuccessTable";
					}else{
						$colorTable = "redDangerTable";

					}
						?>
						<tr class="<?php echo $colorTable; ?>">
							<td> <?php echo $name."..."; ?> </td>
							<td> <?php echo $tool[$familyName][$l]->osInfrastructure; ?> </td>
							<td> <?php echo $tool[$familyName][$l]->public; ?> </td>
							<td> <?php echo $tool[$familyName][$l]->language; ?> </td>
							<td> <?php echo $inputs."..."; ?> </td>
							<td> <?php echo $outputs."..."; ?> </td>
							<td> <?php echo $mainFeatures."..."; ?> </td>
							<td> <?php echo $purpose."..."; ?> </td>
						</tr>
					<?php
					}?>
					</tbody>
			</table>
		</div>
		<?php
    			}// end of for
    		?>		
					
  
 	</div><!-- end of tab content-->

<?php	include 'tools/footer.php'; ?>