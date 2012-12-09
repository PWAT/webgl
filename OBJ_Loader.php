<?php #Script 1.3 - index.php

$ptitle = 'Demo project';
$page_header = 'OBJ Viewer Page';

include ('includes/header.php');
?> 
		<div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3>Latest News</h3>
        <h4>New Website Launched</h4>
        <h5>October 26th, 2012</h5>
        <p>3D and 4D viewer website.<br /><a href="#">Read more</a></p>
        <p></p>
        <h4>New Website Launched</h4>
        <h5>October 26th, 2012</h5>
        <h3>Useful Links</h3>
        <ul>
          <li><a href="http://dev.opera.com/articles/view/an-introduction-to-webgl/">Opera webGL</a></li>
          <li><a href="https://developer.mozilla.org/en-US/docs/WebGL">Mozilla webGL</a></li>
          <li><a href="http://www.kadrmasconcepts.com/blog/2012/01/24/from-blender-to-threefab-exporting-three-js-morph-animations/">JSON export</a></li>
        </ul>
        <h3>Search</h3>
        <form method="post" action="#" id="search_form">
          <p>
            <input class="search" type="text" name="search_field" value="Enter keywords....." />
            <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
          </p>
        </form>
      </div>
      <div id="content">
        <!-- insert the page content here -->
				<script>
					
					var container, stats;
					
					var camera, scene, renderer;
					
					var mouseX = 0, mouseY = 0;
					
					var windowHalfX = window.innerWidth / 2;
					var windowHalfY = window.innerHeight / 2;
					
					
					init();
					animate();
					
					
					function init() {
						
						container = document.getElementById( 'webgl' );
						var width = container.clientWidth;
						var height = container.clientHeight;
						
						camera = new THREE.PerspectiveCamera( 45, width/height, 1, 10000 );
						camera.position.z = 500;
						
						// scene
						
						scene = new THREE.Scene();						
						var ambient = new THREE.AmbientLight( 0x101030 );
						scene.add( ambient );
						
						var directionalLight = new THREE.DirectionalLight( 0xffeedd );
						directionalLight.position.set( 0, 0, 1 ).normalize();
						scene.add( directionalLight );
						
						// texture
						
						var texture = new THREE.Texture();
						
						var loader = new THREE.ImageLoader();
						
						loader.addEventListener( 'load', function ( event ) {
							
							texture.image = event.content;
							texture.needsUpdate = true;
							
						} );
						
						// model
						loader.load( 'images/Philip/philip_003_00.jpg' );
						
						setTimeout(function() {
							loader.load( 'images/Philip/philip_003_50.jpg' );
						}, 2500);
						
						setTimeout(function() {
							renderer.deallocateTexture( 'images/Philip/philip_003_00.jpg' )					
						},2525);
						
						setTimeout(function() {
							loader.load( 'images/Philip/philip_003_80.jpg' );
						}, 5000);
						
						setTimeout(function() {
							renderer.deallocateTexture( 'images/Philip/philip_003_50.jpg' )					
						},5050);
						
						setTimeout(function() {
							loader.load( 'images/Philip/philip_003_50.jpg' );
						}, 6000);
						
						setTimeout(function() {
							renderer.deallocateTexture( 'images/Philip/philip_003_80.jpg' )					
						},6050);
						
						setTimeout(function() {
							renderer.deallocateTexture( 'images/Philip/philip_003_50.jpg' )					
						},6050);
						
						var loader = new THREE.OBJLoader();
						loader.addEventListener( 'load', function ( event ) {
							
							var object = event.content;
							
							for ( var i = 0, l = object.children.length; i < l; i ++ ) {
								
								object.children[ i ].material.map = texture;
								
							}
							
							object.position.y = - 1;
							
							scene.add( object );
							
							//Remove all objects to end animation
							setTimeout(function() {
								scene.remove( object );
							},20000);	
							
						});
						
						//});
						
						//Works but all on top of each other so setTimeOuts
						loader.load( 'images/Philip/philip_003_00.obj' );
						
						setTimeout(function() {
							loader.load( 'images/Philip/philip_003_50.obj' );
						}, 2500);
						
						setTimeout(function() {
							renderer.deallocateObject( 'images/Philip/philip_003_00.obj' )					
						},2525);
						
						setTimeout(function() {
							loader.load( 'images/Philip/philip_003_80.obj' );
						}, 5000);
						
						setTimeout(function() {
							renderer.deallocateObject( 'images/Philip/philip_003_50.obj' )					
						},5050);
						
						setTimeout(function() {
							loader.load( 'images/Philip/philip_003_50.obj' );
						}, 6000);
						
						
						if ("WebGLRenderingContext" in window)
						renderer = new THREE.WebGLRenderer();
						else
						renderer = new THREE.CanvasRenderer();
						
						renderer.setSize( width, height );
						
						container.appendChild( renderer.domElement );
						
						document.addEventListener( 'mousemove', onDocumentMouseMove, false );
						
						//
						
						window.addEventListener( 'resize', onWindowResize, false );
						
					}
					
					
					function onDocumentMouseMove( event ) {
						
						mouseX = ( event.clientX - windowHalfX ) / 2;
						mouseY = ( event.clientY - windowHalfY ) / 2;
						
					}
					
					//
					
					function animate() {
						
						requestAnimationFrame( animate );
						render();
						
					}
					
					function render() {
						
						camera.position.x += ( mouseX - camera.position.x ) * .05;
						camera.position.y += ( - mouseY - camera.position.y ) * .05;
						
						camera.lookAt( scene.position );
						
						renderer.render( scene, camera );
						
					}
					
				</script>
				<div id="webgl" oncontextmenu="return false;">
				</div>
				
      </div>
		<script src="js/three.min.js"></script>
		<script src="js/OBJLoader.js"></script>
    <script src="js/requestAnimationFrame.js"></script>
		<script src="js/Detector.js"></script>
		<script src="js/Stats.js"></script>

    </div>
<?php
include ('includes/footer.php');
?>