<?php
function encabezado_profes($titulo='¿Dónde está Pancracio el Zorro?') {
    echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n";
    echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"es-ar\">\n";
    echo "<head>\n<meta content=\"text/html; charset=UTF-8\" http-equiv=\"content-type\" />\n";
    echo "<title>$titulo</title>\n";
    echo "<link rel=\"stylesheet\" href=\"estilo.css\" type=\"text/css\" />\n</head>\n";
}

function cuantas_pistas_hay($provincia, $base,$con) {
    //Recibe un código de provincia y una base, y retorna cuántas pistas hay para esa base.
    $sql="SELECT count(orden) from bases_pistas where provincia=? and base=?";
    $q = $con->prepare($sql);
    $q->bind_param('ii',$provincia, $base);
    $q->execute();
    $q->bind_result($orden);
    $q->fetch();
    return (int) $orden;
}

/* PARA MÁS ADELANTE; CUANDO EL JUEGO SE PUEDA JUGAR EXCLUYENDO PROVINCIAS
function provincias_con_pista($base) {
//Retorna un array con las provincias en $base que tienen al menos una pista.
$sql="SELECT distinct provincia from bases_pistas where base=$base";
$consulta=mysql_query($sql);
while($fila=mysql_fetch_array($consulta) $prov[]=$fila[0];
return $prov;
}
*/

function lista_provincias(){
    $provincias=array(
        "--Elegí la provincia--",
        "Capital Federal (Ciudad de Buenos Aires)",
        "Prov. de Buenos Aires",
        "Santa Fe",
        "Entre R&iacute;os",
        "Corrientes",
        "Misiones",
        "Formosa",
        "Chaco",
        "Jujuy",
        "Salta",
        "Tucum&aacute;n",
        "Catamarca",
        "La Rioja",
        "Santiago del Estero",
        "C&oacute;rdoba",
        "San Luis",
        "San Juan",
        "Mendoza",
        "La Pampa",
        "Neuqu&eacute;n",
        "R&iacute;o Negro",
        "Chubut",
        "Santa Cruz",
        "Tierra del Fuego"
    );
    return $provincias;
}

function prov_elegida($elegida=100) {
    //Para que, si el usuario ya existe, no tenga que volver a elegir la prov.
    $provincias=lista_provincias();
    foreach($provincias as $cod => $p) {
        $mostrar="<option value=\"$cod\"";
        if($elegida==$cod) $mostrar.=" selected=\"selected\"";
        $mostrar.=">$p</option>\n";
        echo $mostrar;
    }
}

function nombreRealDelUsuario($usr,$con) {
	$sql="SELECT nombre from usuarios where usuario=\"$usr\"";	
	$nom=mysqli_query($con, $sql);
	if($nombre=mysqli_fetch_array($nom)) {return $nombre[0];} else {return 0;}
}
function obtener_base($usr,$con) {
	$sql="select id_base from bases where nombre=\"$usr\"";
	$consulta=mysqli_query($con,$sql) or die ("Error en la consulta a la BD");
	if($base=mysqli_fetch_array($consulta)) {return $base[0];} else {return 0;}
}

function chau_comillas($cadena) {
	$nueva='';
	for($i=0; $i<strlen($cadena);$i++) {
		$letra=$cadena[$i];
		if(!es_comilla($letra)) $nueva.=$letra;
	}
	return htmlspecialchars($nueva);
}

function es_comilla($letra) {
	if ($letra=="\"" || $letra=="'") {return 1;} else {return 0;}
}
?>
