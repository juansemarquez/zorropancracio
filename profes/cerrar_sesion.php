<?php 
include('../includes/bd.php'); 
include('encabezado.php');
session_start();
//Si el usuario *no* ingresa por primera vez al panel en esta sesión...
if(isset($_SESSION['usuario'])) {$usuario_validado=1;} else {$usuario_validado=0;}
if($usuario_validado) {
	unset($_SESSION['usuario']);
	session_destroy();
	encabezado_profes("¿Dónde está Pancracio el Zorro? - Sesión cerrada");
	?>
	<body>
	<div id="container">
	<header>
	</header>
	<div id="main" role="main">
	<h1>¡Hasta la próxima!</h1>
	<h2>Tu sesión se cerró</h2>
	<a id="volver_al_inicio" href="../">Volver a la página principal del juego</a>
	</div></div>
<?php


} else {
	/*Si el password estaba mal, o entró en la página sin loguearse, le pido que se loguee.*/
	header('Location: ../profes.php');
	exit();
}?>
</body></html>
