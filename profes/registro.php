<?php 
include('encabezado.php'); 
encabezado_profes('¿Dónde está Pancracio el Zorro? - ¡Sumate!');
?>
<body>
<div id="container">
<div id="main" role="main">
<div id="registro">
<div id="pancracio"></div>
<h1>¿Dónde está Pancracio el Zorro? - Área de docentes</h1>
<h2>Ingresá tus datos</h2>
<form action="registro2.php" method="post">
<table id="reg">	
	<tr><td class="izq">Nombre de usuario*:</td><td class="dcha"> <input type="text" name="nombre"></td></tr>
        <tr><td class="izq">Contraseña*:</td><td class="dcha"> <input type="password" name="pass"></td></tr>
	<tr><td class="izq">Tu nombre:</td><td class="dcha"> <input type="text" name="nombrereal"></td></tr>
	<tr><td class="izq">Tu escuela:</td><td class="dcha"> <input type="text" name="escuela"></td></tr>
	<tr><td class="izq">Tu localidad:</td><td class="dcha"> <input type="text" name="ciudad"></td></tr>
	<tr><td class="izq">Tu provincia:</td><td class="dcha"> <select name="provincia">
		<option value="0">--Elegí tu provincia--</option>
		<option value="1">Capital Federal (Ciudad de Buenos Aires)</option>
		<option value="2">Prov. de Buenos Aires</option>
		<option value="3">Santa Fe</option>
		<option value="4">Entre R&iacute;os</option>
		<option value="5">Corrientes</option>
		<option value="6">Misiones</option>
		<option value="7">Formosa</option>
		<option value="8">Provincia del Chaco</option>
		<option value="9">Jujuy</option>
		<option value="10">Salta</option>
		<option value="11">Tucum&aacute;n</option>
		<option value="12">Catamarca</option>
		<option value="13">La Rioja</option>
		<option value="14">Santiago del Estero</option>
		<option value="15">C&oacute;rdoba</option>
		<option value="16">San Luis</option>
		<option value="17">San Juan</option>
		<option value="18">Mendoza</option>
		<option value="19">La Pampa</option>
		<option value="20">Neuqu&eacute;n</option>
		<option value="21">R&iacute;o Negro</option>
		<option value="22">Chubut</option>
		<option value="23">Santa Cruz</option>
		<option value="24">Tierra del Fuego</option>
	</select></td></tr>
	<tr><td class="izq">Tu e-mail:</td><td class="dcha"> <input type="text" name="mail"></td></tr>
	<tr><td colspan="2"><input type="submit" value="Registrarte"></td></tr>
</table>
</form>

</div></div></div>
</body>
</html>
