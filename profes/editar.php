<?php 
require_once('../includes/bd.php'); 
require_once('encabezado.php'); 
session_start();
$con = conectar();
//Valido que la sesión esté iniciada.
if(isset($_SESSION['usuario'])) {
  $usuario_validado=1;
} else {$usuario_validado=0;}

if($usuario_validado) {
	$usuario=nombreRealDelUsuario($_SESSION['usuario'],$con);
	if(!isset($usuario)||$usuario=='') $usuario=$_SESSION['usuario'];
	$titulo="¿Dónde está Pancracio el Zorro? - $usuario";
	encabezado_profes($titulo);
	?>
	<body>
	<div id="container">
	<header>
	</header>
	<div id="main" role="main">
	<h1>¿Dónde está Pancracio el Zorro?</h1>
	<h2>Área para docentes - <?=$usuario?></h2>
	<div id="panel">
	<div id="pancracio"></div>
	<div id="consejos">
	<h3>Algunos consejos</h3>	
	<ul>
	<li>Recordá que lo que escribas aparecerá en el globo de diálogo. Por ejemplo, no escribas <strong><em>¿En qué provincia está la ciudad de Rosario?</em></strong> sino <strong><em>Me dijo Pancracio el zorro que iba para Rosario</em></strong></li>
	<li>La pista debe admitir una y solo una provincia como respuesta. Por ejemplo: <strong><em>Fue a una provincia en donde se produce trigo</em></strong> admitiría más de una provincia como respuesta.</li>
	<li>Debe haber al menos una pista por provincia.</li>
	<li>Al editar tus propias pistas, contribuís a mejorar el juego. Tu aporte será revisado y publicado, para que pueda ser aprovechado por otros docentes. ¡Gracias!</li>
	</ul>	
</div>
	<form action="panel.php" method="post">
	  Ingresá la pista:<br>
	  <?php
	  if((isset($_GET["pista"])&&isset($_GET["orden"]))) {
	    //Editando
	    $base=obtener_base($_SESSION['usuario'],$con);
	    $sql="SELECT pista from pistas where codigo=? and orden=?";
        $q = $con->prepare($sql);
        $q->bind_param("ii",$_GET['pista'],$_GET['orden']);
        $q->execute();
        $q->bind_result($pista);
        $q->fetch();
	    echo "<input type=\"hidden\" name=\"e_pista_orig\" value=\"".$_GET['pista']."\">";
	    echo "<input type=\"hidden\" name=\"e_orden_orig\" value=\"".$_GET['orden']."\">";
	  } ?>
	  <!--
	  <textarea name="e_texto_pista"><?php if(isset($pista)) echo $pista; ?></textarea>
	  -->
	  <input id="texto_de_la_pista" type="text" name="e_texto_pista" maxlength="149"
		value="<?php if(isset($pista)) echo $pista; ?>" />
	  <br>
	  Respuesta: <select name="e_pista">
		<?php prov_elegida($_GET['pista']);?>
	  </select><br>
	  <input type="submit" value="Aceptar">
	  <input type="reset" value="Deshacer">
<input type='button' name='boton' value='Cancelar' onClick='location="panel.php"'>
	</form>
	</div></div></div>
<?php



} else {
	/*Si el password estaba mal, o entró en la página sin loguearse, le pido que se loguee.*/
	header('Location: ../profes.php');
	exit();
}?>
</body></html>

