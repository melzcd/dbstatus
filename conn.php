<?php

function MysqlConnStatus(){
	$err = array();
	$mysqli = new mysqli("localhost", "root", "", "gost", 3306);
	if ($mysqli->connect_errno) {
		echo'
		<td>GATE-1</td>
	    <td>Пи Судимость</td>
	    <td>Обезличиная</td>
		<td class="danger">OFF-LINE: ('. $mysqli->connect_errno.')</td>';
		$err[] = $mysqli->connect_errno;
	}
	else {
	    $mysqli->set_charset('utf8');
	   echo'
		<td>GATE-1</td>
	    <td>Пи Судимость</td>
	    <td>Обезличиная</td>
	    <td class="success">ON-LINE</td>';
	    mysqli_close($mysqli);
	}
	return $err;
}

function PostgresConnStatus(){
	$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=postgres");
	//$v = pg_version($dbconn); <td>'.$v['server'].'</td>
	$stat = pg_connection_status($dbconn);
	if ($stat === PGSQL_CONNECTION_OK) {
		echo'
		<td>kpsdp</td>
	    <td>ПИ КП СДП</td>
	    <td>Тестовая база</td>
	    <td class="success">Он-лайн</td>';
	    pg_close($dbconn);
	}
	else {
		echo'
		<td>GATE-1</td>
	    <td>ПИ КП СДП</td>
	    <td>Тестовая база</td>
	    <td class="danger">OFF-LINE</td>';
	}
}
//ПИ Судимость на GATE-2
function FirebirdConnStatusGate2() {
$host ='192.168.2.4:C:\Voskhod\Bd\CONVICTION_RF_FULL.GDB';
$username = 'SYSDBA';
$password = 'KBD2015';
$db = ibase_connect($host, $username, $password);
if ($db){
	echo' 
	<td>gate2</td>
	<td>ПИ Судимость</td>
	<td>Необезличенная КБД ПИ Судимость</td>
	<td class="success">Он-лайн</td>';
	ibase_close($db);
} 
else {
	echo'
	<td>gate2</td>
	<td>ПИ Судимость</td>
	<td>Необезличенная КБД ПИ Судимость</td>
	<td class="danger">OFF-LINE</td>';
};
};

//ПИ Судимость на GATE-1
function FirebirdConnStatusGate1() {
$host ='gate1:C:\1.GDB';
$username = 'SYSDBA';
$password = 'm';
$db = ibase_connect($host, $username, $password);
if ($db){
	echo' 
	<td>gate1</td>
	<td>ПИ Судимость</td>
	<td>Обезличенная КБД ПИ Судимость</td>
	<td class="success">Он-лайн</td>';
	ibase_close($db);
} 
else {
	echo'
	<td>gate1</td>
	<td>ПИ Судимость</td>
	<td>Обезличенная КБД ПИ Судимость</td>
	<td class="danger">OFF-LINE</td>';
};
};
//Подключение к postgres с помощью PDO
function pgConn(){
try {
   $dbh = new PDO('pgsql:host=localhost;dbname=postgres;user=postgres;password=postgres');
   echo'
		<td>kpsdp</td>
	    <td>ПИ КП СДП</td>
	    <td>Тестовая база</td>
	    <td class="success">Он-лайн</td>';
	$dbh = null;
}
catch(PDOException $e)
{
	echo'
		<td>GATE-1</td>
	    <td>ПИ КП СДП</td>
	    <td>Тестовая база</td>
	    <td class="danger">OFF-LINE</td>';
		echo $e->getMessage();
}
};
//-----------Новая функция PDO FireBird--------------------------//
function fbConn($dnsdb,$nameserver,$namesoft, $des){
	try {
	$user = 'sysdba';
	$pass = 'm';
	$dbh = new PDO($dnsdb, $user, $pass);
		echo '
			<td>'.$nameserver.'</td>
			<td>'.$namesoft.'</td>
			<td>'.$des.'</td>
			<td class="success">Он-лайн</td>';
	$dbh = null;  
	   
	} 
	catch (PDOException $e) {
		echo '
			<td>'.$nameserver.'</td>
			<td>'.$namesoft.'</td>
			<td>'.$des.'</td>
			<td class="success">Офф-лайн</td>';
	   print "Error!: " . $e->getMessage() . "<br/>";
	}
};

?>