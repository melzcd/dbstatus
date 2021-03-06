<?php 
error_reporting(E_ALL);
ini_set('display_errors', true);
require $_SERVER["DOCUMENT_ROOT"] . "/conn.php";
require $_SERVER["DOCUMENT_ROOT"] . "/err.php";
require $_SERVER["DOCUMENT_ROOT"] . "/funcViewDB.php";
//require $_SERVER["DOCUMENT_ROOT"] . "/connPDO.php";
?>
<!DOCTYPE html> 
<html lang="ru" g_init="6792">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Мониторинг">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/favicon.ico">

    <title>Мониторинг баз данных</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="/js/jquery-1.10.2.js"></script>
	<script src="/js/bootstrap.js"></script>
  </head>


  <body>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Мониторинг доступности баз данных</h1>
      </div>
      <!-- <p class="lead">Что-то будет написано</p> -->
      <button type="submit" class="btn btn-info btn-xs" onclick="window.location.reload();">Обновить статусы</button>
		<div class="btn-group">
		<button class="btn btn-info btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Добавить БД<span class="caret"></span></button>
		<ul class="dropdown-menu" role="menu">
		<li><a href="formAddFb.php">Добавить FireBird</a></li>
    <li><a href="formAddMysql.php">Добавить MySql</a></li>
    <li><a href="formAddPg.php">Добавить PostgreSql</a></li> 
		</ul>
		</div>
    <div class="btn-group">
      <button class="btn btn-info btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Управление БД<span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Управление FireBird</a></li>
        <li><a href="#">Управление MySql</a></li>
        <li><a href="formViewPg.php">Управление PostgreSql</a></li> 
      </ul>
    </div>
<!-- <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">Информация об ошибках</button>
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				xxxxxx
			</div>
		  </div>
		</div> -->
      <br>
      <br>
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Имя сервера\IP-адрес</th>
            <th>Пограммное изделие</th>
            <th>Примечание</th>
            <th>Статус</th>
          </tr>
        </thead>
          <?php viewFb(); ?>
          <?php viewMysql(); ?>
          <?php viewPostgres() ?>
      </table>
    </div>
</body>
</html>