<?php
error_reporting(E_ALL); 


function pgDel(){

if (isset($_REQUEST['pgid'])){

	$idPg = $_REQUEST['pgid'];
	//print_r($_REQUEST['id']);

	try {
		$user = 'root';
		$pass = '';   
		$dbh = new PDO("mysql:host=localhost;dbname=dbstatus", $user, $pass);
		$sql = ('DELETE FROM statuspostgres WHERE id = :id');
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':id', $idPg);
		$stmt->execute();
		//header ('Location: formViewPg.php');
	}	
	catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "<br/>";
	};
}
};	

function updatePg() {
$messageOK = null;
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
		$messageOK = 'Данные изменены'; 
	}	
	catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "<br/>";
	};
};
return $messageOK;
};	

function viewPostgresEdit(){
	try {
		$pgArr = array();
		$user = 'root';
		$pass = '';   
		$dbh = new PDO("mysql:host=localhost;dbname=dbstatus", $user, $pass);
		$sql = ('SELECT * FROM statuspostgres');
		foreach ($dbh->query($sql) as $row) {
			$pgArr[] = $row;
/*			$host = $row['id'];
			$host = $row['host'];
			$port = $row['port'];
			$dbname = $row['dbname'];
			$user = $row['user'];
			$pass = base64_decode($row['pass']);*/
		};
	}	
	catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "<br/>";
	};
return 	$pgArr;
};


?>