<?php 

include('includes/bd.php'); 
include('includes/header.php') 

?>

<body>
  <header>
  	<div id="links"><a href="profes.php">Área para docentes</a></div>
  </header>
  <div id="container" class="inner">

    <div id="main" role="main">
		<div id="login">
		
			<form action="juego.php" method="post">
				<div id="pancracio"></div>
				<h1>¡Bienvenidos al Juego!</h1>
				<fieldset>
					<label>Ingresá tu nombre:</label>
					<input type="text" name="nombre" id="nombre">
				</fieldset>
				<div class="options">
					<ul>
						<li><input id="todos" type="radio" name="cod" value="1" checked="checked"><label for="todos">Todos los temas</label></li>
						<li><input id="agua" type="radio" name="cod" value="2"><label for="agua">El Agua</label></li>
						<li><input id="musica" type="radio" name="cod" value="3"><label for="musica">Música</label></li>
						<li><input id="codigo" type="radio" name="cod" value="0"><label for="codigo">Código de tu escuela</label></li>
					</ul>
				</div>	
				<div id="codigoinput" style="display: none;">
					<fieldset>
						<label>Código:</label>
						<input type="text" name="base2">
					</fieldset>
				</div>
				<div class="controls"><button type="submit" class="button">¡A Jugar!</button></div>
			</form>
		</div>			
    </div>
    
    <footer>
		por <a href="http://www.twitter.com/profejuanse">Juanse</a> & <a href="http://www.twitter.com/nacho">Nacho</a>
		<a id="copyright"href="copyright.php">© Copyright</a>
    </footer>
  </div> <!--! end of #container -->

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
</body>
</html>
