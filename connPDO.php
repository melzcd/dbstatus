<?php
$dsnPgsql = "pgsql:host=localhost;port=5432;dbname=postgres;user=postgres;password=postgres";
$dnsMysql = "mysql:host=localhost;dbname=gost";



function ConnPDO($dsn){
	try {
	    $dbh = new PDO($dsn);
	    echo '<td class="success">Он-лайн</td>';
	} 
	catch (PDOException $e) {
	    die('Подключение не удалось: ' . $e->getMessage());
	}
	$dbh = null;
}

function ConnPDOMysql1($dsn){
		$user = 'root';
		$pass = '';
	try {
	    $dbh = new PDO($dsn,$user,$pass);
	    echo '<td class="success">Он-лайн</td>';
	} 
	catch (PDOException $e) {
		echo '<td class="danger">Оф-лайн</td>';
	    die('Подключение не удалось: ' . $e->getMessage());
	}
	$dbh = null;
}

function ConnPDOMysql($dsn){
		$user = 'root';
		$pass = '';
	    $dbh = new PDO($dsn,$user,$pass);
	    if ($dbh) {
	    	echo '<td class="success">Он-лайн</td>';	
	    }
	    else {
	    	echo '<td class="danger">Оф-лайн '. $e->getMessage().'</td>';
	
	    }
	$dbh = null;
	}


?>

