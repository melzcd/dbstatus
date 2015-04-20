<?php
error_reporting(E_ALL);

/* echo '<pre>';
print_r($_REQUEST);
echo '</pre>'; */

function AddDataFb(){
	try {
		//$pref = 'firebird:dbname=';
		$user = 'root';
		$pass = '';
		//$dbh = new PDO("sqlite:C:\\OpenServer\\domains\\localhost\\dbstatus.sqlite");
		$dbh = new PDO("mysql:host=127.0.0.1;dbname=dbstatus", $user, $pass);
		$stmt = $dbh->prepare('INSERT INTO `statusfb` (`dnsdb`,`nameserver`, `namesoft`, `des`, `user`, `pass`) VALUES (:dnsdb, :nameserver, :namesoft, :des, :user, :pass)');
		
		$dnsdb = htmlspecialchars ( $_REQUEST['dnsdb']); //Ïóòü äî áàçû
		$nameserver = htmlspecialchars ( $_REQUEST['nameserver']); // Èìÿ ñåðâåðà
		$namesoft = htmlspecialchars ( $_REQUEST['namesoft']); //Íàèìåíîâàíèå ÏÈ
		$des = htmlspecialchars ( $_REQUEST['des']); // Îïèñàíèå ÷òî íàõîäèòñÿ â áàçå
		$user = htmlspecialchars ( $_REQUEST['user']); //Èìÿ ïîëüçîâàòåëÿ
		$pass = base64_encode(htmlspecialchars( $_REQUEST['pass'])); //Ïàðîëü
		
		$host = $nameserver.':';
		$dnsFb = $host.$dnsdb;
		
		$stmt->bindParam(':dnsdb', $dnsFb);
		$stmt->bindParam(':nameserver', $nameserver);
		$stmt->bindParam(':namesoft',  $namesoft);
		$stmt->bindParam(':des', $des);
		$stmt->bindParam(':user', $user);
		$stmt->bindParam(':pass', $pass);
		$stmt->execute();
		header ('Location: index_new.php');  // перенаправление на нужную страницу
  		exit();
	   
	} 
	catch (PDOException $e) {
	   echo "Error!: " . $e->getMessage() . "<br/>";
	}
};

//Çàïèñü â ÁÄ
AddDataFb();


?>
