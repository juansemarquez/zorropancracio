<?php 
require_once('config.php');
require_once('credenciales.php');

function conectar() {
    $claves = credenciales();
	//Conectamos al servidor:
	$con = mysqli_connect($claves['server'], $claves['user'], $claves['pass'], $claves['db']) or die("¡No se ha podido establecer la conexión con el servidor!");
    return $con;
}

function imprima($viaje) {
	$num = count($viaje);
	for ($i=0;$i<$num;$i++) 
	{
		echo $viaje[$i];
		if($i<$num-1) echo ",";
	}
}

function provincias() {
	$con = conectar();
	$sql = "select * from provincias";
	$resp = mysqli_query($con, $sql);
	$i = 1;
	while ($fila = mysqli_fetch_array($resp)) 
	{
		$prov[$i][0] = $fila['codigo'];
		$prov[$i][1] = $fila['provincia'];
		$i++;
	}
	//print_r($prov);	
	return $prov;
}

function validar_base($usr) {
    $con = conectar();
	$sql="Select id_base from bases where id_base=?";
    $query = $con->prepare($sql);
    $query->bind_param("s", $usr);
    $query->execute();
    $query->bind_result($id_b);
    if($query->fetch()) {
	    return $id_b;
    } else {
        return 0;
    }
}

function queprov($cod) {
	//Dado el código $cod, devuelve la el array $prov, datos de la provincia.	
	$con = conectar();	
	$sql = "select provincia, interlocutor, epigrafe_foto from provincias where codigo=" . (int) $cod;	
	$resp = mysqli_query($con, $sql);
	while ($fila = mysqli_fetch_array($resp)) 
	{
		$prov['p'] = $fila['provincia'];
		$prov['i'] = $fila['interlocutor'];
		$prov['f'] = $fila['epigrafe_foto'];
	}
	return $prov;
}


function pista($codaa,$baseaa=1) {
	//Me devuelve la cadena que servirá de pista para ir a la próxima provincia
	$con = conectar();
	$sql = "select p.pista from pistas p, bases_pistas bp where p.codigo=bp.provincia and p.orden=bp.orden and p.codigo=$codaa and bp.base=$baseaa order by RAND() LIMIT 1";
	$resp = mysqli_query($con, $sql);
	//echo $msj;
	if ($fila = mysqli_fetch_array($resp)) 
	{
		$msj = $fila['pista'];
	} else {
		$msj = "algo";	
	}
	return $msj;
}

function distancia($origen,$destino) {
    // Distancia entre capitales según http://granhotelamerica.com.ar/distancias/Distancias%20entre%20Ciudades%20de%20Argentina.htm
    $dist=-1;
    if($origen==$destino) return 0;
    if($origen<=2) {
        switch ($destino) { //Buenos Aires y Cap.Fed.
            case 1: $dist=58; break; //CapFed
            case 2: $dist=58; break; //BsAs
            case 9: $dist=1543; break; //Juj
            case 10: $dist=1510; break; //Salta
            case 11: $dist=1203; break; //Tuc
            case 14: $dist=1043; break; //Sgo.
            case 7: $dist=1191; break; //Form
            case 8: $dist=1023; break; //Chaco
            case 3: $dist=478; break; //SF
            case 5: $dist=940; break; //Corr
            case 6: $dist=1040; break; //Misiones
            case 4: $dist=480; break; //ER
            case 15: $dist=715; break; //Cba
            case 13: $dist=1150; break; //LaRioja
            case 17: $dist=1110; break; //SJ
            case 16: $dist=790; break; //SL
            case 12: $dist=1145; break; //Cat
            case 18: $dist=1050; break; //Mza
            case 19: $dist=620; break; //La Pampa
            case 20: $dist=1158; break; //Nqn
            case 21: $dist=960; break; //RN
            case 22: $dist=1455; break; //Chu
            case 23: $dist=2635; break; //StaCruz
            case 24: $dist=3228; break; //TdF
        }}
    elseif($origen==9) { //Jujuy
        switch ($destino) {
            case 10: $dist=99; break; //Salta
            case 11: $dist=340; break; //Tuc
            case 14: $dist=500; break; //Sgo.
            case 7: $dist=960; break; //Form
            case 8: $dist=860; break; //Chaco
            case 3: $dist=1107; break; //SF
            case 5: $dist=883; break; //Corr
            case 6: $dist=1198; break; //Misiones
            case 4: $dist=1138; break; //ER
            case 15: $dist=930; break; //Cba
            case 13: $dist=770; break; //LaRioja
            case 17: $dist=1220; break; //SJ
            case 16: $dist=1320; break; //SL
            case 12: $dist=572; break; //Cat
            case 18: $dist=1345; break; //Mza
            case 19: $dist=1530; break; //La Pampa
            case 20: $dist=2200; break; //Nqn
            case 21: $dist=2124; break; //RN
            case 22: $dist=2385; break; //Chu
            case 23: $dist=3565; break; //StaCruz
            case 24: $dist=4158; break; //TdF
        }}
    elseif($origen==10) { //Salta
        switch ($destino) {
            case 11: $dist=307; break; //Tuc
            case 14: $dist=467; break; //Sgo.
            case 7: $dist=948; break; //Form
            case 8: $dist=780; break; //Chaco
            case 3: $dist=1074; break; //SF
            case 5: $dist=803; break; //Corr
            case 6: $dist=1118; break; //Misiones
            case 4: $dist=1105; break; //ER
            case 15: $dist=897; break; //Cba
            case 13: $dist=695; break; //LaRioja
            case 17: $dist=1145; break; //SJ
            case 16: $dist=1245; break; //SL
            case 12: $dist=539; break; //Cat
            case 18: $dist=1227; break; //Mza
            case 19: $dist=1497; break; //La Pampa
            case 20: $dist=2082; break; //Nqn
            case 21: $dist=2091; break; //RN
            case 22: $dist=2352; break; //Chu
            case 23: $dist=3532; break; //StaCruz
            case 24: $dist=4125; break; //TdF
        }}
    elseif($origen==11) { //Tuc
        switch ($destino) {
            case 14: $dist=160; break; //Sgo.
            case 7: $dist=936; break; //Form
            case 8: $dist=765; break; //Chaco
            case 3: $dist=767; break; //SF
            case 5: $dist=791; break; //Corr
            case 6: $dist=1106; break; //Misiones
            case 4: $dist=798; break; //ER
            case 15: $dist=590; break; //Cba
            case 13: $dist=388; break; //LaRioja
            case 17: $dist=838; break; //SJ
            case 16: $dist=938; break; //SL
            case 12: $dist=232; break; //Cat
            case 18: $dist=1005; break; //Mza
            case 19: $dist=1190; break; //La Pampa
            case 20: $dist=1860; break; //Nqn
            case 21: $dist=1784; break; //RN
            case 22: $dist=2045; break; //Chu
            case 23: $dist=3225; break; //StaCruz
            case 24: $dist=3818; break; //TdF
        }}
    elseif($origen==14) { //Sgo
        switch ($destino) {
            case 7: $dist=776; break; //Form
            case 8: $dist=610; break; //Chaco
            case 3: $dist=607; break; //SF
            case 5: $dist=63; break; //Corr
            case 6: $dist=948; break; //Misiones
            case 4: $dist=638; break; //ER
            case 15: $dist=430; break; //Cba
            case 13: $dist=360; break; //LaRioja
            case 17: $dist=810; break; //SJ
            case 16: $dist=850; break; //SL
            case 12: $dist=212; break; //Cat
            case 18: $dist=977; break; //Mza
            case 19: $dist=1030; break; //La Pampa
            case 20: $dist=1567; break; //Nqn
            case 21: $dist=1624; break; //RN
            case 22: $dist=1885; break; //Chu
            case 23: $dist=3065; break; //StaCruz
            case 24: $dist=3658; break; //TdF
        }}
    elseif($origen==7) { //Form
        switch ($destino) {
            case 8: $dist=168; break; //Chaco
            case 3: $dist=713; break; //SF
            case 5: $dist=191; break; //Corr
            case 6: $dist=506; break; //Misiones
            case 4: $dist=744; break; //ER
            case 15: $dist=1043; break; //Cba
            case 13: $dist=1136; break; //LaRioja
            case 17: $dist=1543; break; //SJ
            case 16: $dist=1463; break; //SL
            case 12: $dist=988; break; //Cat
            case 18: $dist=1710; break; //Mza
            case 19: $dist=1523; break; //La Pampa
            case 20: $dist=2060; break; //Nqn
            case 21: $dist=2117; break; //RN
            case 22: $dist=2378; break; //Chu
            case 23: $dist=3558; break; //StaCruz
            case 24: $dist=4151; break; //TdF
        }}
    elseif($origen==8) { //Chaco
        switch ($destino) {
            case 3: $dist=545; break; //SF
            case 5: $dist=23; break; //Corr
            case 6: $dist=338; break; //Misiones
            case 4: $dist=576; break; //ER
            case 15: $dist=875; break; //Cba
            case 13: $dist=970; break; //LaRioja
            case 17: $dist=1420; break; //SJ
            case 16: $dist=1295; break; //SL
            case 12: $dist=822; break; //Cat
            case 18: $dist=1587; break; //Mza
            case 19: $dist=1475; break; //La Pampa
            case 20: $dist=2012; break; //Nqn
            case 21: $dist=2069; break; //RN
            case 22: $dist=2210; break; //Chu
            case 23: $dist=3390; break; //StaCruz
            case 24: $dist=3983; break; //TdF
        }}
    elseif($origen==3) { //SF
        switch ($destino) {
            case 5: $dist=568; break; //Corr
            case 6: $dist=883; break; //Misiones
            case 4: $dist=31; break; //ER
            case 15: $dist=330; break; //Cba
            case 13: $dist=765; break; //LaRioja
            case 17: $dist=830; break; //SJ
            case 16: $dist=625; break; //SL
            case 12: $dist=770; break; //Cat
            case 18: $dist=885; break; //Mza
            case 19: $dist=810; break; //La Pampa
            case 20: $dist=1347; break; //Nqn
            case 21: $dist=1404; break; //RN
            case 22: $dist=1665; break; //Chu
            case 23: $dist=2845; break; //StaCruz
            case 24: $dist=3438; break; //TdF
        }}
    elseif($origen==5) { //corr
        switch ($destino) {
            case 6: $dist=315; break; //Misiones
            case 4: $dist=590; break; //ER
            case 15: $dist=898; break; //Cba
            case 13: $dist=993; break; //LaRioja
            case 17: $dist=1398; break; //SJ
            case 16: $dist=1318; break; //SL
            case 12: $dist=845; break; //Cat
            case 18: $dist=1565; break; //Mza
            case 19: $dist=1378; break; //La Pampa
            case 20: $dist=1989; break; //Nqn
            case 21: $dist=2046; break; //RN
            case 22: $dist=2187; break; //Chu
            case 23: $dist=3367; break; //StaCruz
            case 24: $dist=3960; break; //TdF
        }}
    elseif($origen==6) { //Misiones
        switch ($destino) {
            case 4: $dist=820; break; //ER
            case 15: $dist=1213; break; //Cba
            case 13: $dist=1308; break; //LaRioja
            case 17: $dist=1758; break; //SJ
            case 16: $dist=1633; break; //SL
            case 12: $dist=1160; break; //Cat
            case 18: $dist=1925; break; //Mza
            case 19: $dist=1660; break; //La Pampa
            case 20: $dist=2198; break; //Nqn
            case 21: $dist=2000; break; //RN
            case 22: $dist=2495; break; //Chu
            case 23: $dist=3675; break; //StaCruz
            case 24: $dist=4268; break; //TdF
        }}
    elseif($origen==4) { //ER
        switch ($destino) {
            case 15: $dist=361; break; //Cba
            case 13: $dist=796; break; //LaRioja
            case 17: $dist=861; break; //SJ
            case 16: $dist=656; break; //SL
            case 12: $dist=801; break; //Cat
            case 18: $dist=916; break; //Mza
            case 19: $dist=841; break; //La Pampa
            case 20: $dist=1378; break; //Nqn
            case 21: $dist=1435; break; //RN
            case 22: $dist=1696; break; //Chu
            case 23: $dist=2876; break; //StaCruz
            case 24: $dist=3469; break; //TdF
        }}
    elseif($origen==15) { //Cba
        switch ($destino) {
            case 13: $dist=435; break; //LaRioja
            case 17: $dist=500; break; //SJ
            case 16: $dist=420; break; //SL
            case 12: $dist=440; break; //Cat
            case 18: $dist=670; break; //Mza
            case 19: $dist=600; break; //La Pampa
            case 20: $dist=1137; break; //Nqn
            case 21: $dist=1194; break; //RN
            case 22: $dist=1455; break; //Chu
            case 23: $dist=2635; break; //StaCruz
            case 24: $dist=3228; break; //TdF
        }}

    elseif($origen==13) { //La Rioja
        switch ($destino) {
            case 17: $dist=450; break; //SJ
            case 16: $dist=550; break; //SL
            case 12: $dist=156; break; //Cat
            case 18: $dist=617; break; //Mza
            case 19: $dist=1035; break; //La Pampa
            case 20: $dist=1472; break; //Nqn
            case 21: $dist=1629; break; //RN
            case 22: $dist=1890; break; //Chu
            case 23: $dist=3070; break; //StaCruz
            case 24: $dist=3660; break; //TdF
        }}

    elseif($origen==17) { //SJ
        switch ($destino) {
            case 16: $dist=320; break; //SL
            case 12: $dist=606; break; //Cat
            case 18: $dist=167; break; //Mza
            case 19: $dist=825; break; //La Pampa
            case 20: $dist=1022; break; //Nqn
            case 21: $dist=1419; break; //RN
            case 22: $dist=1680; break; //Chu
            case 23: $dist=2860; break; //StaCruz
            case 24: $dist=3453; break; //TdF
        }}

    elseif($origen==16) { //SL
        switch ($destino) {
            case 12: $dist=705; break; //Cat
            case 18: $dist=260; break; //Mza
            case 19: $dist=505; break; //La Pampa
            case 20: $dist=883; break; //Nqn
            case 21: $dist=1099; break; //RN
            case 22: $dist=1360; break; //Chu
            case 23: $dist=2540; break; //StaCruz
            case 24: $dist=3133; break; //TdF
        }}
    elseif($origen==12) { //Cat
        switch ($destino) {
            case 18: $dist=773; break; //Mza
            case 19: $dist=1040; break; //La Pampa
            case 20: $dist=1588; break; //Nqn
            case 21: $dist=1634; break; //RN
            case 22: $dist=1895; break; //Chu
            case 23: $dist=3075; break; //StaCruz
            case 24: $dist=3668; break; //TdF
        }}
    elseif($origen==18) { //Mza
        switch ($destino) {
            case 19: $dist=765; break; //La Pampa
            case 20: $dist=855; break; //Nqn
            case 21: $dist=1359; break; //RN
            case 22: $dist=1620; break; //Chu
            case 23: $dist=2800; break; //StaCruz
            case 24: $dist=3393; break; //TdF
        }}
    elseif($origen==19) { //La Pampa
        switch ($destino) {
            case 20: $dist=537; break; //Nqn
            case 21: $dist=594; break; //RN
            case 22: $dist=855; break; //Chu
            case 23: $dist=2035; break; //StaCruz
            case 24: $dist=2628; break; //TdF
        }}

    elseif($origen==20) { //Nqn
        switch ($destino) {
            case 21: $dist=660; break; //RN
            case 22: $dist=750; break; //Chu
            case 23: $dist=1930; break; //StaCruz
            case 24: $dist=2523; break; //TdF
        }}

    elseif($origen==21) { //RN
        switch ($destino) {
            case 22: $dist=495; break; //Chu
            case 23: $dist=1675; break; //StaCruz
            case 24: $dist=2268; break; //TdF
        }}
    elseif($origen==22) { //RN
        switch ($destino) {
            case 23: $dist=1180; break; //StaCruz
            case 24: $dist=1773; break; //TdF
        }}
    elseif($origen==23 && $destino==24) {
        $dist = 593;
    }
    if($dist==-1) {
        $dist=distancia($destino,$origen);
    }
    return $dist;
} 

?>
