
<div class="container containerBorder" style="background-color:#CCC; text-align:center">
<br/></br>&copy; SING - Sistemas Inform&aacute;ticos de Nueva Generaci&oacute;n 2017</br></br></br>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/js.js"></script>
<?php if(ereg("/listOmic.php$", $_SERVER['REQUEST_URI'])){ ?> 
<script>
$( document ).ready(function() {
	setTimeout(function(){

    		var t = document.getElementsByClassName("tab-pane");
		for (i = 1; i < t.length; i++) { 

    			t[i].classList.remove("in");
			t[i].classList.remove("active");
		}

	}, 500);

});
</script>
 <?php  }?>
</body>
</html>