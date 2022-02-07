<?php 
extract($_POST);

if(!isset($nombre) || $nombre == ''){
	header('Location: index.php');
	exit();
}

include('includes/bd.php');

//session_start();

if(isset($cod)) {
	$base=$cod;
	
} else {$base=1;}

if($base==0) {$base=$base2;}

$con = conectar();

if(!validar_base($base)){
	header('Location: index.php');
	exit();
}

include('includes/header.php'); 

function genere($viaje) {
	$band=0;
	$prov = round(rand(1,24));
	$num = count($viaje);
	
	for($j = 0; $j < $num; $j++) {
	
		if($viaje[$j] == $prov) {
			$band = 1; break;
		}
		
	}	
		
	if(@$band) {
		$prov = genere($viaje);
	}
		
	return $prov;
}

$viaje[0] = round(rand(1,24));


for($i = 1; $i <= $config['pasos']; $i++) {
	$viaje[$i] = genere($viaje);
}

$sql = "SELECT * from provincias where codigo=" . $viaje[0];
$resp = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resp);

?>
<?php if(!$config['scrollbars']){ ?>
<style>
  body, html {
  	overflow: hidden;
  }
</style>
<?php } ?>
<body class="juego">

  <div id="log">
  	<div id="result"></div>
  	<div id="json">{"base":<?= $base; ?>,"km":0,"nombre":"<?= $nombre; ?>","personaje":"varón","paso":0,"errores":0,"msj":"","viaje":"<?= serialize($viaje); ?>","ok":0}</div>
  </div>
  <div id="container">
    <header>

    </header>
	  
	<div id="ganaste">
		<h2>¡Encontraste a Pancracio!</h2>
		<div class="options">
			<ul>
				<li><a href="losmejores.php?base=<?= $base ?>" class="button color">Ver los mejores puntajes</a></li>
			</ul>
		</div>
		<div class="pancracio"></div>
	</div>
			 
    <div id="main" role="main" class="juego">
		<div class="provincia" id="inicio">
			<h1>¡Empecemos a buscar!</h1>
			<div id="mensaje">
				<div class="area">
					<div class="bubble">
						<p>¡Hola, <?= $nombre;?>! Ayudanos a encontrar a Pancracio, el zorro. Nos dijeron que lo vieron en la <?= $fila['provincia']; ?>.</p>
					</div>
				</div>
				<div class="explorer"></div>
			</div> 
		</div>
		<?php
			$sql = "SELECT * from provincias ORDER BY codigo";
			$resp = mysqli_query($con, $sql);		
			while($fila = mysqli_fetch_array($resp)){
		?>
		<div class="provincia" id="<?= $fila['div'] ?>" style="background: #67B2B8 url(images/provincias/<?= $fila['div'] ?>.jpg)">
			<h1><?= $fila['provincia'] ?></h1>
			<div class="epigrafe"><?= $fila['epigrafe_foto']; ?></div>
		</div>
		<?php } ?>			
    </div>
    
    <footer class="fixed">
		<div class="controls">
			<a id="viajar" class="button">¡Viajar!</a>
			<div class="buttons">
				<span class="button right"><span id="km">0</span>km</span>
				<span class="button left">Errores: <span id="errores">0</span></span>
			</div>
		</div>
		<div id="provincias">
			<ol>
				<li><a href="#buenosaires" rel="2">Buenos Aires</a></li>
				<li><a href="#capital" rel="1">Capital Federal</a></li>
				<li><a href="#catamarca" rel="12">Catamarca</a></li>
				<li><a href="#chaco" rel="8">Chaco</a></li>
				<li><a href="#chubut" rel="22">Chubut</a></li>
				<li><a href="#cordoba" rel="15">Córdoba</a></li>
			</ol>
			<ol>
				<li><a href="#corrientes" rel="5">Corrientes</a></li>
				<li><a href="#entrerios" rel="4">Entre Ríos</a></li>
			   	<li><a href="#formosa" rel="7">Formosa</a></li>
				<li><a href="#jujuy" rel="9">Jujuy</a></li>
				<li><a href="#lapampa" rel="19">La Pampa</a></li>
				<li><a href="#larioja" rel="13">La Rioja</a></li>
			</ol>
			<ol>

				<li><a href="#mendoza" rel="18">Mendoza</a></li>
				<li><a href="#misiones" rel="6">Misiones</a></li>
				<li><a href="#neuquen" rel="20">Neuquén</a></li>
				<li><a href="#rionegro" rel="21">Río Negro</a></li>
				<li><a href="#salta" rel="10">Salta</a></li>
				<li><a href="#sanjuan" rel="17">San Juan</a></li>
			</ol>
			<ol>
				<li><a href="#sanluis" rel="16">San Luis</a></li>
				<li><a href="#santacruz" rel="23">Santa Cruz</a></li>
				<li><a href="#santafe" rel="3">Santa Fe</a></li>
				<li><a href="#santiago" rel="14">Santiago del Estero</a></li>
				<li><a href="#tucuman" rel="11">Tucumán</a></li>
				<li><a href="#fuego" rel="24">Tierra del Fuego</a></li>
			</ol>
		</div>	
    </footer>
    
  </div> <!--! end of #container -->
  <div id="argentina"></div>
  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
</body>
</html>
