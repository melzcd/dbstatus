<?php
error_reporting(E_ALL);

/* echo '<pre>';
print_r($_REQUEST);
echo '</pre>'; */

/* function fbConn($dnsdb,$nameserver,$namesoft, $des){
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
}; */



function viewFb(){
	try {
		$user = 'root';
		$pass = '';   
		$dbh = new PDO("mysql:host=localhost;dbname=dbstatus", $user, $pass);
		$sql = ('SELECT * FROM statusfb');
		foreach ($dbh->query($sql) as $row) {
			if (!$db = ibase_connect($row['dnsdb'], $row['user'], ($row['pass']))){
				echo '
				<td>'.$row['nameserver'].'</td>
				<td>'.$row['namesoft'].'</td>
				<td>'.$row['des'].'</td>
				<td class="alert-danger">Офф-лайн</td>
				</tr>';
			}
			else {
				echo '
				<tr>
				<td>'.$row['nameserver'].'</td>
				<td>'.$row['namesoft'].'</td>
				<td>'.$row['des'].'</td>
				<td class="success">Он-лайн</td>
				</tr>';
				ibase_close($db);
			}
		};
	}	
	catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "<br/>";
	};
};	



function viewMysql(){
	try {
		$user = 'root';
		$pass = '';   
		$dbh = new PDO("mysql:host=localhost;dbname=dbstatus", $user, $pass);
		$sql = ('SELECT * FROM stausmysql2');
		foreach ($dbh->query($sql) as $row) {
			if (!$db = mysqli_connect($row['host'], $row['user'], $row['pass'], $row['dbname'])){
				echo '
				<td>'.$row['host'].'</td>
				<td>'.$row['namesoft'].'</td>
				<td>'.$row['des'].'</td>
				<td class="alert-danger">Офф-лайн</td>
				</tr>';
			}
			else {
				echo '
				<tr>
				<td>'.$row['host'].'</td>
				<td>'.$row['namesoft'].'</td>
				<td>'.$row['des'].'</td>
				<td class="success">Он-лайн</td>
				</tr>';
				mysqli_close($db);
			}
		};
	}	
	catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "<br/>";
	};
};


function viewPostgres(){
	try {
		$user = 'root';
		$pass = '';   
		$dbh = new PDO("mysql:host=localhost;dbname=dbstatus", $user, $pass);
		$sql = ('SELECT * FROM statuspostgres');
		foreach ($dbh->query($sql) as $row) {
			$host = $row['host'];
			$port = $row['port'];
			$dbname = $row['dbname'];
			$user = $row['user'];
			$pass = base64_decode($row['pass']);
			if (!$db = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass")){
				echo '
				<td>'.$row['host'].'</td>
				<td>'.$row['namesoft'].'</td>
				<td>'.$row['des'].'</td>
				<td class="alert-danger">Офф-лайн</td>
				</tr>';
			}
			else {
				echo '
				<tr>
				<td>'.$row['host'].'</td>
				<td>'.$row['namesoft'].'</td>
				<td>'.$row['des'].'</td>
				<td class="success">Он-лайн</td>
				</tr>';
				pg_close($db);
			}
		};
	}	
	catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "<br/>";
	};
};


//PostgreSQlS
//Функция для обработки конопок удаление и редактирование.
function viewPostgresR(){
	try {
		$user = 'root';
		$pass = '';   
		$dbh = new PDO("mysql:host=localhost;dbname=dbstatus", $user, $pass);
		$sql = ('SELECT * FROM statuspostgres');
		foreach ($dbh->query($sql) as $row) {
			$host = $row['id'];
			$host = $row['host'];
			$port = $row['port'];
			$dbname = $row['dbname'];
			$user = $row['user'];
			$pass = base64_decode($row['pass']);

			if (!$db = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass")){
				echo '
				<td>'.$row['host'].'</td>
				<td>'.$row['namesoft'].'</td>
				<td>'.$row['des'].'</td> 
				<td class="alert-danger">Офф-лайн</td>
				<form action="/formEditPg.php">
					<td><input type="hidden"  name="pgid" value='.$row['id'].'><button type="submit" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></button></td>
				</form>
				<form action="/formViewPg.php">
					<td><input type="hidden"  name="pgid" value='.$row['id'].'><button type="submit" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
				</form>
				</tr>';
			}
			else {
				echo '
				<tr>
				<td>'.$row['host'].'</td>
				<td>'.$row['namesoft'].'</td>
				<td>'.$row['des'].'</td>
				<td class="success">Он-лайн</td>
				<form action="/formEditPg.php">
					<td><input type="hidden"  name="pgid" value='.$row['id'].'><button type="submit" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></button></td>
				</form>
				<form action="/formViewPg.php">
					<td><input type="hidden"  name="pgid" value='.$row['id'].'><button type="submit" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
				</form>
				</tr>';
				pg_close($db);
			}
		};
	}	
	catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "<br/>";
	};
};


/* 		try {
			foreach ($dbh->query($sql) as $row) {
				$dbh = new PDO($row['dnsdb'], $row['user'], base64_decode($row['pass']));
				echo '
					<tr>
					<td>'.$row['nameserver'].'</td>
					<td>'.$row['namesoft'].'</td>
					<td>'.$row['des'].'</td>
					<td class="success">Он-лайн</td>
					<td>Без ошибок</td>
					</tr>';
				$dbh = null;  
			}
		}
		catch (PDOException $e) {
				echo '
				<td>'.$row['nameserver'].'</td>
				<td>'.$row['namesoft'].'</td>
				<td>'.$row['des'].'</td>
				<td class="danger">Офф-лайн</td>
				<td class="danger">'.$e->getMessage().'</td>
				</tr>';
				//print "Error!: <br/>";
		}

		//echo '<td class="success">Он-лайн</td>';
		//$p = base64_decode($pass);
		//echo $p;
	   
	} 
	catch (PDOException $e) {
	   echo "Error!: " . $e->getMessage() . "<br/>";
	} */	
	
	
?>



