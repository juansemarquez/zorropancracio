<?php
include('includes/bd.php'); 

extract($_POST);

$prov = provincias();
$queprov = queprov($destino);
$itinerario = unserialize($viaje);

/*
echo "Personaje: " . $personaje . "<br />";
echo "Itinerario: ";
print_r($itinerario);
echo "<br />";
echo "Elementos del array: " .  count($itinerario) . "<br />";
echo "Paso: " . $paso . "<br />";
echo "Errores: " . $errores . "<br />";
echo "Nombre: " . $nombre . "<br />";
echo "Origen: " .  $origen . "<br />";
echo "Destino: " .  $destino . "<br />";
*/

if($paso == 0) {
	$origen = 0;
} else{
	$origen = $paso-1;
}

//echo $itinerario[$origen]."<br>";
//echo $destino."<br>";

$km = distancia($itinerario[$origen], $destino);

if($destino == $itinerario[$paso]) {

	if($paso < $config['pasos'])
	{
		$paso++;
		$msj = pista($itinerario[$paso],$base);	
		$ok = 1;
	}
	else 
	{	
	
		//Recibe por post nombre, km y base (no me acuerdo si son los nombres correctos).
		if(isset($nombre)&&isset($kmtotal)&&isset($base)) {
			
			$con = conectar();
			
			//Obtengo la tabla de "high scores"
			$sql="select id,nombre,km from posiciones where base=? order by km ASC";
            $query = $con->prepare($sql);
            $query->bind_param("i", $base);
            $query->execute();
            $query->bind_result($id_, $nombre_, $km_);
			$band=$contador=$cont_posicion=0;
			
			while($query->fetch()) {
				$contador++;
				if($km<$km_ && !$band) {$band=1;$cont_posicion=$contador;}
				if($contador==$config['total'] && $band) mysqli_query($con, "delete from posiciones where id=$id_");
			}
			
			if($band||$contador<$config['total']) {
                $sql2= "insert into posiciones (nombre,km,base) values (?,?,?)";
                $query = $con->prepare($sql2);
                $kms = $kmtotal + $km;
                $query->bind_param("sii",$nombre,$kms,$base);
				$query->execute();
				if(!$band) $cont_posicion=$contador+1;
			}
			
		}	
	
		$msj = "<h1>¡Me encontraste!</h1><h2>¡Ganaste!</h2> <p>Errores en total: " . $errores . ".<br /><a href=\"index.html\">Volver a jugar</a></p>"; 
		$ok = 2;
	}
	
}
else 
{
	$errores++;
	$paso--;
	if($paso < 0) $paso = 0;
	$volver = queprov($itinerario[$paso]);
	$msj = "Por aquí no lo hemos visto. Te vas a tener que volver a la " . $volver['p'] . ".";
	$ok = 0;
}

$json = array(
	"destino" => $destino,
	"origen" => $itinerario[$origen],
	"base" => $base,	
	"km" => $km,
	"kmtotal" => $kmtotal, 
	"nombre" => $nombre,
	"personaje" => $personaje,
	"paso" => $paso,
	"errores" => $errores,
	"msj" => $msj,
	"viaje" => $viaje,
	"ok" => $ok
); 

echo json_encode($json);

?>
