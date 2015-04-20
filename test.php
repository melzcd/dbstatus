<?php
function pgConn(){
	try {
		$user = 'postgres';
		$pass = 'postgres';
	   $dbh = new PDO("pgsql:host=localhost;dbname=postgres",$user,$pass);
		echo '
			<td>kpsdp</td>
			<td>ПИ КП СДП</td>
			<td>Тестовая база</td>
			<td class="success">ON-LINE</td>';
	   $dbh = null;
	}
	catch(PDOException $e){
		print "Error!: " . $e->getMessage() . "<br/>";
		
	}
};

function fbConn($nameserver,$namesoft, $des){
	try {
	$user = 'sysdba';
	$pass = 'm';
	$dbh = new PDO("firebird:dbname=localhost:C:\\DATA\\JUSTICE\\CONVICTION.GDB", $user, $pass);
		echo '
			<td>'.$nameserver.'</td>
			<td>'.$namesoft.'</td>
			<td>'.$des.'</td>
			<td class="success">Он-лайн</td>';
	$dbh = null;  
	   
	} 
	catch (PDOException $e) {
	   echo "Error!: " . $e->getMessage() . "<br/>";
	}
};


echo pgConn();
echo fbConn($nameserver = 'gate', $namesoft = 'ПИ Судимость' , $des = 'тестовая база');
echo '<br>';

?>