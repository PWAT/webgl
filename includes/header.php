<?php

//include ('/classes/clsMetaContent.php');
//include ('/js');
//include ('/includes/session.php');
// $meta = &new Meta;

// $meta->company_name = "Project Demo";
// $meta->description = "A demo of the final year project.  A proof of concept";
// $meta->keywords2 = "3D, 4D, OBJ file viewer and player.  Manipulate 3D and 4D images and video.";
// $meta->sitename = "Project Demo";
// $meta->slogan = "A proof of concept";
// $meta->generator = "PHP";

//start the output buffering
ob_start();
?>

<!DOCTYPE>
<html>

<head>
  <title>OBJ STL Viewer</title>
  <meta name="description" content="A 3D and 4D object file and stl file viewer" />
  <meta name="keywords" content="3D, 4D, viewer, facial gesture analysis, medical application" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
	
  <link rel="stylesheet" type="text/css" href="style/style.css" />
	
    <script src="js/Three.js"></script>
	<script src="js/three.min.js"></script>
	<script src="js/requestAnimationFrame.js"></script>
	<script src="js/objstl.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="js/jquery.mousewheel.js"></script>
	<script src="js/sim.js"></script>
	<script src="js/modelViewer.js"></script>
	<script src="js/jsonModel.js"></script>
	<script src="js/MTLLoader.js"></script>
	<script src="js/OBJMTLLoader.js"></script>
	<script src="js/OBJLoader.js"></script>
	<script src="js/Detector.js"></script>
	<script src="js/Stats.js"></script>
	<script>
		
		var renderer = null;
		var scene = null;
		var camera = null;
		var mesh = null;
		
		$(document).ready(
		function() {
			var container = document.getElementById("container");
			
			var app = new ModelViewer();
			app.init({ container: container });
			
			//t.parisi sim.app classes used here
			var model = new JSONModel();
			model.init({ url : "images/philip.js", scale:0.01});			
			app.addModel(model);
			
			app.run();
		}
		);
	</script>
	
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">3D and 4D Web Browser<span class="logo_colour">Analysis</span></a></h1>
          <h2>3D and 4D image viewing application.</h2>
        </div>
      </div>
      <div id="menubar">
				<ul class="arrowunderline">
					<li><a href="index.php">OBJ Loader</a></li>
					<li><a href="4DImage.php">4D Image</a></li>
					<li><a href="JSON Loader.php">JSON Loader</a></li>
					<li><a href="objAnim.php">4D Player</a></li>
					<li><a href="video.php">Video</a></li>		
				</ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content"><!--Start of page specific content-->
<!--Script 1.1 - header.html-->