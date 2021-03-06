<?php 
require_once('../includes/bd.php'); 
require_once('encabezado.php'); 

//DEFINICION DE FUNCIONES
function validar_password($usr,$pass,$con) {
    //Comprueba usuario y contraseña:
    $sql="SELECT contras from usuarios where usuario=?";
    $q = $con->prepare($sql);
    $q->bind_param("s",$usr);
    $q->execute();
    $q->bind_result($clave);
    if(!$q->fetch()) {
        return false;
    } else {
        $ok = password_verify($pass, $clave);
        return $ok;
    }
}

function borre_pista($provincia,$orden,$base,$con) {
    //No borra la pista, sino que la desasigna de la base del usuario.
    //Primero, revisa que no se esté borrando la última pista de una provincia.
    if(cuantas_pistas_hay($provincia,$base,$con)<2) return "¡Debe haber al menos una pista por provincia!";
    //Luego, borra la pista.
    $sql="delete from bases_pistas where provincia=$provincia and orden=$orden and base=$base";
    $sql="delete from bases_pistas where provincia=? and orden=? and base=?";
    $q = $con->prepare($sql);
    $q->bind_param("iii",$provincia, $orden, $base);
    return $q->execute() ? "La pista ha sido eliminada." : "Error al eliminar la pista.";
}

function alta_pista($pista,$texto_pista,$base,$usr,$con) {
//Da de alta una nueva pista. 
//Primero obtiene el proximo nro de orden (no es auto increment)
$sql="select max(orden) from pistas where codigo=?";
$q = $con->prepare($sql);
$q->bind_param('i',$pista);
$q->execute();
$q->bind_result($maximo);
if($q->fetch()) {
	$orden=$maximo+1;
    $q->close();
	//Le saco a la pista comillas dobles y/o simples, y le agrego las entities.
	$pista2=chau_comillas($texto_pista);
	//Ahora inserta la nueva pista, y la habilita para el usuario.
	$sql2="insert into pistas values (?,?,?,?)";
    $q2= $con->prepare($sql2);
    $q2->bind_param('iiss',$pista,$orden,$pista2,$usr);
    $q2r = $q2->execute();
    $q2->close();
	$sql3="insert into bases_pistas values (?,?,?)";
    $q3 = $con->prepare($sql3);
    $q3->bind_param('iii',$pista,$orden,$base);
    $q3r = $q3->execute();
	if($q2r && $q3r) return "La pista ha sido agregada.";
}
return "Error al agregar la pista";
}

function edite_pista($base,$pista_borrar,$orden_borrar,$texto_pista,$pista_alta,$usr,$con) {
//Borra la pista vieja y da de alta la nueva.
$borrarOK=borre_pista($pista_borrar,$orden_borrar,$base,$con);
if($borrarOK=="¡Debe haber al menos una pista por provincia!") 
   {return $borrarOK;}
elseif($borrarOK=="La pista ha sido eliminada.") {
   $altaOK=alta_pista($pista_alta,$texto_pista,$base,$usr,$con);
   if($altaOK=="La pista ha sido agregada.") return "La pista ha sido modificada.";
}
return "Error al modificar la pista.";
}

//FIN DEFINICION DE FUNCIONES, EMPIEZA EL PROGRAMA

session_start();
$con = conectar();
//Si el usuario *no* ingresa por primera vez al panel en esta sesión...
if(isset($_SESSION['usuario'])) {
  $usuario_validado=1;
}
//Si el usuario ingresa por primera vez al panel en esta sesión...
elseif(validar_password($_POST['nombre'],$_POST['pass'],$con)) {
	// Usuario y contraseña OK, inicio sesión:
	$_SESSION['usuario']=$_POST['nombre'];
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
	<?php	
	$base=obtener_base($_SESSION['usuario'],$con);
	//En caso de que se haya elegido editar una pista:
	if(isset($_POST['e_pista_orig'])&&$_POST['e_texto_pista']!=''&&$_POST['e_pista']) {
	  //echo "Invocación: Base: ".$base."e_pista_orig:".$_POST['e_pista_orig'].',e_orden_orig:'.$_POST['e_orden_orig'].',e_texto_pista:'.$_POST['e_texto_pista'].',e_pista'.$_POST['e_pista'].',$_SESSION[usuario]:'.$_SESSION['usuario'];
	  $mensaje=edite_pista($base,$_POST['e_pista_orig'],$_POST['e_orden_orig'],chau_comillas($_POST['e_texto_pista']),$_POST['e_pista'],$_SESSION['usuario'],$con);
	}
	//En caso de que provenga de un alta de una pista:	
	elseif(isset($_POST['e_texto_pista'])&&$_POST['e_texto_pista']!=''&&$_POST['e_pista']) {
	   $mensaje=alta_pista($_POST['e_pista'],chau_comillas($_POST['e_texto_pista']),$base,$_SESSION['usuario'], $con);
	}
	//En caso de que se haya elegido borrar una pista:
	elseif(isset($_GET['accion']) && $_GET['accion']=='b') {$mensaje=borre_pista($_GET['pista'],$_GET['orden'],$base,$con);}
	//Obtengo y muestro el código para jugar
	$obtenerCodigo="select id_base from bases where nombre=\"".$_SESSION['usuario']."\"";
	$codigoParaJugar=mysqli_fetch_array(mysqli_query($con,$obtenerCodigo));
	$codigoParaJugar=$codigoParaJugar[0];
	echo "<p id=\"codigo_para_jugar\">Código para jugar con estas pistas: <strong>$codigoParaJugar</strong></p>";
	//Si hay algún mensaje que mostrar, se muestra.
	if(isset($mensaje)) echo "<p><span id=\"mensaje\">$mensaje</span></p>";
	echo "<p id=\"alta_de_pista\"><a href=\"editar.php\">Agregar una pista nueva</a></p>";
	echo "<p id=\"cerrar\"><a href=\"cerrar_sesion.php\">Cerrar sesión</a></p>";
	if($base) {
	  $sql="SELECT p.codigo as cod, p.orden as ord, p.pista as Pista, pr.provincia as Respuesta FROM pistas p, provincias pr, bases_pistas bp WHERE p.codigo=pr.codigo and pr.codigo=bp.provincia and p.orden = bp.orden and bp.base=$base";
	  $result=mysqli_query($con,$sql) or die ("Error al consultar la BD");
	//Encabezado de la tabla:
	  echo "<table id=\"pistas\"><tr><th>Pista</th><th>Respuesta</th><th class=\"icono\">Editar</th><th class=\"icono\">Borrar</th></tr>";
  	  $clase_tr='par';
	  while($linea=mysqli_fetch_array($result)) {
		if($clase_tr=='par') {$clase_tr='impar';} else {$clase_tr='par';}
		echo "<tr class=\"$clase_tr\"><td>".$linea["Pista"].'</td><td>'.$linea["Respuesta"].'</td>';
		echo "<td class=\"icono\"><a href=\"editar.php?pista=".$linea["cod"]."&amp;orden=" . $linea["ord"] . "\"><img src=\"lapiz.png\" alt=\"Editar\" title=\"Editar\" /></a></td>";
		echo "<td class=\"icono\"><a href=\"panel.php?pista=".$linea["cod"]."&amp;orden=" . $linea["ord"] . "&amp;accion=b\"><img src=\"borrar.png\" alt=\"Borrar\" title=\"Borrar\" /></a></td>";
	  }
	  echo '</table>';
	}
	echo '</div></div></div>';
	?>
	
  

<?php
/* Si el password estaba mal, o entró en la página sin loguearse, le pido que se loguee.*/ 
} else {
	header('Location: ../profes.php');
	exit();
}?>
</body></html>
