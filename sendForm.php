<?php include('tools/head.php'); ?>
<?php include 'functions.php'; ?>
<?php $families = getFamilies();?>


			<h1 class="titleHeader"> Suggest a new resource </h1>


			<ul class="nav nav-tabs">
			    <li class="active"><a data-toggle="tab" href="#repositories">Data Repository</a></li>
			    <li><a data-toggle="tab" href="#tools">Omic Tool</a></li>
			</ul>

			<div class="tab-content">
				<div id="repositories" class="tab-pane fade in active">
			     	<form action="addForm.php" method="post">
			     		<input type="hidden" name="typeForm" value="repo">
						<div class="form-group">

							<div class="col-md-12 sendFormGrid">
								<label class="control-label col-sm-2" for="repository">Repository:</label>
								<div class="col-sm-7">
							    	<input type="text" name="repository" class="form-control" id="repository">
							    </div>
							</div>

						    <div class="col-md-12 sendFormGrid">
						    	<label class="control-label col-sm-2" for="type">Type:</label>
								<div class="col-sm-7">
						    		<input type="text" name="type" class="form-control" id="type">
						    	</div>
						    </div>

						    <div class="col-md-12 sendFormGrid">
						    	<label class="control-label col-sm-2" for="volume">Volume:</label>
								<div class="col-sm-7">
						    		<input type="text" name="volume" class="form-control" id="volume">
						    	</div>
						    </div>

						    <div class="col-md-12 sendFormGrid">
						    	<label class="control-label col-sm-2" for="downloadable">Downloadable:</label>
								<div class="col-sm-7">
						    		<input type="text" name="downloadable" class="form-control" id="downloadable">
						    	</div>
						    </div>

						    <div class="col-md-12 sendFormGrid">
						    	<label class="control-label col-sm-2" for="webService">Web Service:</label>
								<div class="col-sm-7">
						    		<input type="text" name="webService" class="form-control" id="webService">
						    	</div>
						    </div>

						    <div class="col-md-12 sendFormGrid">
						    	<label class="control-label col-sm-2" for="purpose">Purpose:</label>
								<div class="col-sm-7">
						    		<textarea class="form-control" name="purpose" id="purpose"></textarea>
						    	</div>
						    </div>

						</div><!-- end of form goup -->
						

						<div class="form-group"> 
							<div class="col-md-12 formAdd" >
						    	<button type="submit" class="btn btn-default">Submit</button>
						    </div>
						</div>
					</form>
			    </div>


			    <div id="tools" class="tab-pane fade">
			    	
			    	<form action="addForm.php" method="post">
			     		<input type="hidden" name="typeForm" value="omic">
						<div class="form-group">

							<div class="col-md-12 sendFormGrid">
								<label class="control-label col-sm-2" for="tool">Tool:</label>
								<div class="col-sm-7">
							    	<input type="text" name="tool" class="form-control" id="tool">
							    </div>
							</div>

						    <div class="col-md-12 sendFormGrid">
						    	<label class="control-label col-sm-2" for="publicPrivate">Public/Private:</label>
								<div class="col-sm-7">
						    		<input type="text" name="publicPrivate" class="form-control" id="publicPrivate">
						    	</div>
						    </div>

						    <div class="col-md-12 sendFormGrid">
						    	<label class="control-label col-sm-2" for="osInfrastructure">OS Infrastructure:</label>
								<div class="col-sm-7">
						    		<input type="text" name="osInfrastructure" class="form-control" id="osInfrastructure">
						    	</div>
						    </div>

						     <div class="col-md-12 sendFormGrid">
						    	<label class="control-label col-sm-2" for="family">Family:</label>
								<div class="col-sm-7">
									<select class="form-control send" id="sel1" name="family">
									<?php 
										for($i=0; $i<count($families); $i++){
									?>
										    <option value="<?php echo $families[$i]["idFamilyTool"]; ?>">
										    	<?php echo $families[$i]["name"]; ?>
										    </option> 
								    <?php
										}
									?>
								  </select>
						    	</div>
						    </div>


						    <div class="col-md-12 sendFormGrid">
						    	<label class="control-label col-sm-2" for="inputs">Inputs:</label>
								<div class="col-sm-7">
						    		<textarea class="form-control" name="inputs" id="inputs"></textarea>
						    	</div>
						    </div>

						    <div class="col-md-12 sendFormGrid">
						    	<label class="control-label col-sm-2" for="outputs">Outputs:</label>
								<div class="col-sm-7">
						    		<textarea class="form-control" name="outputs" id="outputs"></textarea>
						    	</div>
						    </div>

						    <div class="col-md-12 sendFormGrid">
						    	<label class="control-label col-sm-2" for="mainFeataures">Main Features:</label>
								<div class="col-sm-7">
						    		<textarea class="form-control" name="mainFeataures" id="mainFeataures"></textarea>
						    	</div>
						    </div>

						    <div class="col-md-12 sendFormGrid">
						    	<label class="control-label col-sm-2" for="purposeTool">Purpose:</label>
								<div class="col-sm-7">
						    		<textarea class="form-control" name="purposeTool" id="purposeTool"></textarea>
						    	</div>
						    </div>

						</div><!-- end of form goup -->
						

						<div class="form-group"> 
							<div class="col-md-12 formAdd" >
						    	<button type="submit" class="btn btn-default">Submit</button>
						    </div>
						</div>
					</form>
			    </div>
			    
			</div>
			

		</div>

	</div>


<?php include ('tools/footer.php'); ?>