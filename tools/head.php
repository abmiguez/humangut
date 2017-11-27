<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Resources and tools for the high-throughput, multi-omic study of intestinal microbiota</title>
		<link rel="stylesheet" href="css/bootstrap.css" >
		<link rel="stylesheet" href="css/style.css" >
		
	</head>
	<body ng-app="humanGut" ng-cloak>
		<div class="container containerBorder">
			<div class="col-md-12">

			<nav id="navbar" class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="index.php"> Human Gut Resources </a>
			    </div>
			    <ul class="nav navbar-nav">
			      <li <?php if(preg_match("/index.php$", $_SERVER['REQUEST_URI'])){echo 'class="active"';}?>><a href="index.php">Home</a></li>
			      <li <?php if(preg_match("/listRepositories.php$", $_SERVER['REQUEST_URI'])){echo 'class="active"';}?>><a href="listRepositories.php">Data Repositories</a></li>
			      <li <?php if(preg_match("/listOmic.php$", $_SERVER['REQUEST_URI'])){echo 'class="active"';}?>><a href="listOmic.php">Omics Tools</a></li>
			      <li <?php if(preg_match("/sendForm.php$", $_SERVER['REQUEST_URI'])){echo 'class="active"';}?>><a href="sendForm.php">Suggest resource</a></li>
			      <li <?php if(preg_match("/contactus.php$", $_SERVER['REQUEST_URI'])){echo 'class="active"';}?>><a href="contactus.php">Contact us</a></li>
			    </ul>
			  </div>
			</nav>