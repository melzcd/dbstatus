<?php
error_reporting(E_ALL);

/* echo '<pre>';
print_r($_REQUEST);
echo '</pre>'; */

function AddDataPostgres(){
	try {
		
		$user = 'root';
		$pass = '';
		$dbh = new PDO("mysql:host=127.0.0.1;dbname=dbstatus", $user, $pass);
		$stmt = $dbh->prepare('INSERT INTO `statuspostgres` (`host`,`namesoft`, `des`,`port`,`dbname`, `user`, `pass`) VALUES (:host,:namesoft, :des, :port, :dbname, :user, :pass)');
		
		if (!isset($_REQUEST['host']) || empty($_REQUEST['host']) || !isset($_REQUEST['namesoft']) || empty($_REQUEST['namesoft'])
			|| !isset($_REQUEST['des']) || empty($_REQUEST['des']) || !isset($_REQUEST['port']) || empty($_REQUEST['port'])
			|| !isset($_REQUEST['dbname']) || empty($_REQUEST['dbname']) ||	!isset( $_REQUEST['user']) || empty( $_REQUEST['user'])
			|| !isset($_REQUEST['pass']) || empty($_REQUEST['pass'])) {

			$messageErr ='Заполните все необходимые поля!';
		}
		
		else {

			$host = htmlspecialchars ($_REQUEST['host']); //Путь до базы
			$namesoft = htmlspecialchars ($_REQUEST['namesoft']); //Наименование ПИ
			$des = htmlspecialchars ($_REQUEST['des']); // Описание что находится в базе
			$port = htmlspecialchars ($_REQUEST['port']); // Описание что находится в базе
			$dbname = htmlspecialchars ($_REQUEST['dbname']); // Имя сервера
			$user = htmlspecialchars ($_REQUEST['user']); //Имя пользователя
			$pass = base64_encode(htmlspecialchars($_REQUEST['pass'])); //Пароль

			$stmt->bindParam(':host', $host);
			$stmt->bindParam(':namesoft',  $namesoft);
			$stmt->bindParam(':des', $des);
			$stmt->bindParam(':port', $port);
			$stmt->bindParam(':dbname', $dbname);
			$stmt->bindParam(':user', $user);
			$stmt->bindParam(':pass', $pass);
			$stmt->execute();
		   	header ('Location: index_new.php');  // перенаправление на нужную страницу
	  		exit();

		}


	} 
	catch (PDOException $e) {
	   echo "Error!: " . $e->getMessage() . "<br/>";
	}
return $messageErr;
};


?>
