<?php

echo '<pre>';
print_r($_REQUEST);
echo '</pre>';

function updatePg() {

if (isset($_REQUEST['idPg'])){

	$idPg = $_REQUEST['idPg'];
	$hostPg = $_REQUEST['hostPg'];
	$dbnamePg = $_REQUEST['dbnamePg'];
	$portPg = $_REQUEST['portPg'];
	$namesoftPg = $_REQUEST['namesoftPg'];
	$desPg = $_REQUEST['desPg'];
	$userPg = $_REQUEST['userPg'];
	$passPg = $_REQUEST['passPg'];

	try {
		$user = 'root';
		$pass = '';   
		$dbh = new PDO("mysql:host=localhost;dbname=dbstatus", $user, $pass);
		$sql = ('UPDATE statuspostgres SET host=:host, dbname=:dbname, port=:port, namesoft=:namesoft, des=:des, user=:user, pass=:pass WHERE id=:id');
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':id', $idPg);
		$stmt->bindParam(':host', $hostPg);
		$stmt->bindParam(':dbname', $dbnamePg);
		$stmt->bindParam(':port', $portPg);
		$stmt->bindParam(':namesoft', $namesoftPg);
		$stmt->bindParam(':des', $desPg);
		$stmt->bindParam(':user', $userPg);
		$stmt->bindParam(':pass', $passPg);
		$stmt->execute();
		//header ('Location: formViewPg.php');
	}	
	catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "<br/>";
	};
};
};


?>