<?php 

include('includes/bd.php'); 
include('includes/header.php');

?>

<body>
	<header>
		<div id="links"><a href="profes/registro.php">¿No estás registrado?</a></div>
	</header>
  <div id="container" class="inner">

    <div id="main" role="main">
		<div id="login">
			<form action="profes/panel.php" method="post">
				<a href="/" id="pancracio"></a>
				<h1>¡Ingresá tus datos!</h1>
				<fieldset>
					<label>Usuario:</label>
					<input type="text" name="nombre" id="nombre">
				</fieldset>
				<fieldset>
					<label>Contraseña:</label>
					<input type="password" name="pass" id="nombre">
				</fieldset>
				<div class="controls"><button type="submit" class="button">Ingresar</button></div>
			</form>
		</div>			
    </div>
    <br>
    <footer>
		por <a href="http://www.twitter.com/profejuanse">Juanse</a> & <a href="http://www.twitter.com/ignaciogiri">Nacho</a>
		<a id="copyright"href="copyright.php">© Copyright</a>
    </footer>
  </div> <!--! end of #container -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25422739-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
</body>
</html>