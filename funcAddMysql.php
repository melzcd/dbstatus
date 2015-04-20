<?php
error_reporting(E_ALL);

/* echo '<pre>';
print_r($_REQUEST);
echo '</pre>'; */

function AddDataMysql(){
	try {
		
		$user = 'root';
		$pass = '';
		$dbh = new PDO("mysql:host=127.0.0.1;dbname=dbstatus", $user, $pass);
		$stmt = $dbh->prepare('INSERT INTO `stausmysql2` (`host`,`dbname`, `namesoft`, `des`, `user`, `pass`) VALUES (:host, :dbname, :namesoft, :des, :user, :pass)');


		if (!isset($_REQUEST['host']) || empty($_REQUEST['host']) || !isset($_REQUEST['dbname']) || empty($_REQUEST['dbname'])
			|| !isset($_REQUEST['des']) || empty($_REQUEST['des']) || !isset($_REQUEST['namesoft']) || empty($_REQUEST['namesoft']) || !isset( $_REQUEST['user']) || empty( $_REQUEST['user'])) {
			//|| !isset($_REQUEST['pass']) || empty($_REQUEST['pass'])) { закементировано для теста

			$messageErr ='Заполните все необходимые поля!';
		}

		else {

			$host = htmlspecialchars ( $_REQUEST['host']); 
			$dbname = htmlspecialchars ( $_REQUEST['dbname']); 
			$namesoft = htmlspecialchars ( $_REQUEST['namesoft']); 
			$des = htmlspecialchars ( $_REQUEST['des']); 
			$user = htmlspecialchars ( $_REQUEST['user']); 
			$pass = base64_encode(htmlspecialchars( $_REQUEST['pass']));
			
			
			
			$stmt->bindParam(':host', $host);
			$stmt->bindParam(':dbname', $dbname);
			$stmt->bindParam(':namesoft',  $namesoft);
			$stmt->bindParam(':des', $des);
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
