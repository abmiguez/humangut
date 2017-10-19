<?php include('tools/head.php'); ?>
			<h1> Main page </h1>

			<form action="modelExcel.php" method="post" enctype="multipart/form-data">
				<div class="form-group" id="uploadForm">
 					<label class="btn-bs-file btn btn btn-success">
               			 Browse
                	<input type="file" id="fileToUpload" name="fileToUpload" />
           			 </label>
            		<button type="submit" id="submitButtonExcel" value="Upload Image" name="submit" class="btn btn-default">Submit</button>
				</div>
			</form>

		</div>

	</div>


<?php include ('tools/footer.php'); ?>