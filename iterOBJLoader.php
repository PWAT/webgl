<?php #Script 1.3 - index.php

$ptitle = 'Demo project';
$page_header = 'Iter OBJ Page';

include ('includes/header.php');
?> 
	 <div id="content">
		<h1>OBJ Iterative Page</h1>
				<div id="webgl" oncontextmenu="return false;">
				</div>
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

				camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 10000 );
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
				
				// executeWhenLoaded() will be overloaded with as many arguments as i want to check for presence.
				function executeWhenLoaded(func){  
				 
				  for (var i = 1; i<arguments.length; i++){ // for loop starts at 1 to skip the function argument.
					if (! window[ arguments[i] ]) {
					  setTimeout(arguments.callee,50);      
					  return;
					} 
				  }
				 
				  func(); // only reaches here when for loop is satisfied.
				}
				
				
				var url = [ "images/Philip/philip_003_00.jpg",
							"images/Philip/philip_003_01.jpg",
							"images/Philip/philip_003_10.jpg",
							"images/Philip/philip_003_20.jpg",
							"images/Philip/philip_003_30.jpg",
							"images/Philip/philip_003_50.jpg",
							"images/Philip/philip_003_80.jpg"];							
								
				for ( var i in url ) {
					
					//executeWhenLoaded(function(){ 
						var loadImage  = url.splice(i,1);
						//loader.load( loadImage );	
					//},'loadImage');				
					
					
					
					loader.load( loadImage );
					
					
					
				}			
	
				// model
				//loader.load( loadimage );				
								
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
				
										
				var urls = ["images/Philip/philip_003_00.obj",
							"images/Philip/philip_003_01.obj",
							"images/Philip/philip_003_10.obj",
							"images/Philip/philip_003_20.obj",
							"images/Philip/philip_003_30.obj",
							"images/Philip/philip_003_50.obj",
							"images/Philip/philip_003_80.obj"];				
			
				for ( var i in urls ) {
					
					//executeWhenLoaded(function(){ 
						var loading  = urls.splice(i,1);
						//loader.load( loadImage );	
					//},'loadImage');		
					
					
					loader.load( loading );				
					
				}			
													
				//Works but all on top of each other so setTimeOuts
								
				if ("WebGLRenderingContext" in window)
						renderer = new THREE.WebGLRenderer();
						else
						renderer = new THREE.CanvasRenderer();
						
						renderer.setSize( width, height );
						
						container.appendChild( renderer.domElement );
						
						document.addEventListener( 'mousemove', onDocumentMouseMove, false
				//

				window.addEventListener( 'resize', onWindowResize, false );

			}

			function onWindowResize() {

				windowHalfX = window.innerWidth / 2;
				windowHalfY = window.innerHeight / 2;

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth, window.innerHeight );

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
				window.setInterval(renderer, 1000/20);
				renderer.render( scene, camera );
				
			}

		</script>
 </div>


<?php
include ('includes/footer.php');
?>