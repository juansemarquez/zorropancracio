<?php 
include('includes/bd.php');
$con = conectar();


include('includes/header.php');

if(isset($_GET['base'])) {
	$base=(int) $_GET['base'];
} else {
	$base=1;
}

$sql="select id,nombre,km from posiciones where base=$base order by km ASC";
$result2=mysqli_query($con, $sql);
?>
<body>
  <header>
  	<div id="links"><a href="profes.php">Área para docentes</a></div>
  </header>
  <div id="container" class="inner">
    <div id="main" role="main">
		<div id="login">
			<a id="pancracio" href="/"></a>
			<h1>Top <?= $config['total'] ?></h1>
<table id="scores">
<tr><th>Nombre</th><th>Kilómetros</th></tr>
<?php
$j=0;
while($fila2=mysqli_fetch_array($result2)) {
	$j++;
	echo "<tr><td>".$fila2['nombre']."</td><td>".$fila2['km']."</tr>\n";
}
for($j++;$j<=$config['total'];$j++) 	echo "<tr><td>Vacío</td><td>Vacío</tr>\n";
?>
</table>
</div>			
    </div>
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
