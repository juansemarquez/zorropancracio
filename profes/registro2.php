<?php 
require_once('../includes/bd.php'); 
require_once('encabezado.php'); 
function existe_usuario($nombre, $con) {
//Comprueba si el nombre de usuario ya existe
	$sql="SELECT count(usuario) FROM usuarios WHERE usuario=?";
    $q = $con->prepare($sql);
    $q->bind_param("s",$nombre);
    $q->execute();
    $q->bind_result($n);
    $q->fetch();
    return $n;
}

$con = conectar();
encabezado_profes('¿Dónde está Pancracio el Zorro? - ¡Sumate!');
?>
<body>
<div id="container">
<header>
</header>
<div id="main" role="main">
<div id="registro">
<div id="pancracio"></div>
<?php
if(
    isset($_POST["nombre"]) && $_POST["nombre"]!='' && 
    isset($_POST["pass"]) && $_POST["pass"]!='' && 
    existe_usuario($_POST["nombre"],$con)==0
) {
   //Si no existe el usuario, lo carga:
   $sql="insert into usuarios (usuario,contras,nombre,escuela,ciudad,provincia,mail) ";
   $sql.="VALUES (?,?,?,?,?,?,?)";
   $q = $con->prepare($sql);
   $nombre = chau_comillas($_POST["nombre"]);
   $clave = password_hash($_POST["pass"],PASSWORD_DEFAULT);
   $q->bind_param("sssssss",$nombre,$clave,$_POST['nombrereal'],$_POST['escuela'],$_POST['ciudad'],$_POST['provincia'],$_POST['mail']);

	if ($q->execute()) {
		echo "<h1>¡Registro correcto!</h1>\n";
		//Paso por post al panel de control el usuario y la contraseña, en un form oculto.
		echo "<form action=\"panel.php\" method=\"post\">\n";
		echo "<input name=\"nombre\" type=\"hidden\" value=\"".$_POST["nombre"]."\">\n";
		echo "<input name=\"pass\" type=\"hidden\" value=\"".$_POST["pass"]."\">\n";
		echo "<input type=\"submit\" value=\"Ir al panel de control\">\n</form>\n";
		//Le creo una base al usuario, que por ahora es idéntica a la base "default":
		//1-Busco cuál es la última base, para asignarle el nro que sigue (no es AUTOINCREMENT)
		$ult_base=mysqli_query($con, 'SELECT MAX(id_base) FROM  bases');
		if($ultima=mysqli_fetch_array($ult_base)) $id_base=$ultima[0]+1;
		//2-Creo una nueva base
		$basenueva="insert into bases values($id_base,?)";
        $q2 = $con->prepare($basenueva);
        $q2->bind_param('s',$nombre);
		if(!$q2->execute()) die ("Error 1");
		//3-Obtengo la lista de preguntas de la base "default"		
		$preguntas_default='select distinct provincia,orden from bases_pistas where base<100';
		if(!$default=mysqli_query($con,$preguntas_default)) {die ("Error 2");}
		//4-Si todo fue bien, asigno las pistas por default a la base del nuevo usuario		
		else {
		  $asignar_pistas='insert into bases_pistas values ';
		  $primero=1;
		  while($pista=mysqli_fetch_array($default)) {
			if(!$primero) {$asignar_pistas.=",";} else {$primero=0;}
			$asignar_pistas.="(".$pista['provincia'].",".$pista['orden'].",$id_base)";
		  }
		  //echo $asignar_pistas;
	 	  if(!mysqli_query($con,$asignar_pistas)) die ("Error 3");		  
		}				
	} else {
		//Si ocurrió algún error...
		echo "<h1>Error de registro</h1>";
	}
} else {
	//Si el usuario ya existía, vuelve a poner los datos cargados para que el usuario lo cambie.
?>
	<h1>¿Dónde está Pancracio el Zorro? - Área de docentes</h1>	
	<h2>¡Ese usuario ya existe!</h2>
<form action="registro2.php" method="post">
<table id="reg">	
	<tr><td class="izq">Nombre de usuario*:</td><td class="dcha"> <input type="text" name="nombre"></td></tr>
        <tr><td class="izq">Contraseña*:</td><td class="dcha"> <input type="password" name="pass"></td></tr>
	<tr><td class="izq">Tu nombre:</td><td class="dcha"> 
<input type="text" name="nombrereal" value="<?=$_POST['nombrereal']?>"></td></tr>
	<tr><td class="izq">Tu escuela:</td><td class="dcha"> 
<input type="text" name="escuela" value="<?=$_POST['escuela']?>"></td></tr>
	<tr><td class="izq">Tu localidad:</td><td class="dcha"> 
<input type="text" name="ciudad" value="<?=$_POST['ciudad']?>"></td></tr>
	<tr><td class="izq">Tu provincia:</td><td class="dcha"> <select name="provincia">
		<?php prov_elegida($_POST['provincia']);?>
	</select></td></tr>
	<tr><td class="izq">Tu e-mail:</td><td class="dcha"> 
<input type="text" name="mail" value="<?=$_POST['mail']?>"></td></tr>
	<tr><td colspan="2"><input type="submit" value="Registrarte"></td></tr>
</table>
</form>	
<?php } //Cierro el else ?>
</div></div></div>

</body>
</html>
