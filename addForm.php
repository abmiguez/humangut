<?php include('tools/head.php'); ?>
<?php include('functions.php'); ?>
<?php
	$repo = array();
	$tool =	array();

	$type =  $_POST["typeForm"];

	if( $type == "repo"){
		$repo["repository"] =  $_POST["repository"];
		$repo["type"] =  $_POST["type"];
		$repo["volume"] =  $_POST["volume"];
		$repo["downloadable"] =  $_POST["downloadable"];
		$repo["webService"] =  $_POST["webService"];
		$repo["purpose"] =  $_POST["purpose"];

		$result = addForm($repo, "repo");


	}else{
		$tool["tool"] = $_POST["tool"];
		$tool["publicPrivate"] = $_POST["publicPrivate"];
		$tool["osInfrastructure"] = $_POST["osInfrastructure"];
		$tool["family"] = $_POST["family"];
		$tool["inputs"] = $_POST["inputs"];
		$tool["outputs"] = $_POST["outputs"];
		$tool["mainFeataures"] = $_POST["mainFeataures"];
		$tool["purposeTool"] = $_POST["purposeTool"];

		$result = addForm($tool, "tool");
		
	}
	

?>


		<h1 class="titleHeader"> Your suggestion has been sent. Thank you for your contribution</h1>
			
			<?php 
			if( $type == "repo"){
			?>
			<div class="reusltsAddForm">
				<p class="postTittleHeader"> <?php echo $result["database"]; ?></p>
				<p>
					<span><b> Repository:</b> <?php echo $result["repository"]->repository; ?></span>
				</p>
				<p>
					<span><b> Type:</b> <?php echo $result["repository"]->type; ?></span>
				</p>
				<p>
					<span><b> Volume:</b> <?php echo $result["repository"]->volume; ?></span>
				</p>
				<p>
					<span><b> Downloadable:</b> <?php echo $result["repository"]->downloadable; ?></span>
				</p>
				<p>
					<span><b> Web Service: </b><?php echo $result["repository"]->webService; ?></span>
				</p>
				<p>
					<span><b> Purpose:</b> <?php echo $result["repository"]->purpose; ?></span>
				</p>
			<?php 
			}else{ ?>

				<p class="postTittleHeader"> <?php echo $result["database"]; ?></p>
				<p>
					<span> <b>Repository:</b> <?php echo $result["tool"]->tool; ?></span>
				</p>
				<p>
					<span> <b>Type:</b> <?php echo $result["tool"]->publicPrivate; ?></span>
				</p>
				<p>
					<span> <b>Purpose:</b> <?php echo $result["tool"]->language; ?></span>
				</p>
				<p>
					<span> <b>Purpose:</b> <?php echo $result["tool"]->osInfrastructure; ?></span>
				</p>
				<p>
					<span> <b>Volume:</b> <?php echo $result["tool"]->inputs; ?></span>
				</p>
				<p>
					<span> <b>Downloadable: </b><?php echo $result["tool"]->outputs; ?></span>
				</p>
				<p>
					<span><b> Web Service: </b><?php echo $result["tool"]->mainFeatures; ?></span>
				</p>
				
				<p>
					<span> <b>Purpose:</b> <?php echo $result["tool"]->purpose; ?></span>
				</p>

			
			<?php
			}?>
			</div>

	<br/><br/>

		</div>
	</div>


<?php include ('tools/footer.php'); ?>