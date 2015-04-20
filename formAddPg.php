<?php require $_SERVER["DOCUMENT_ROOT"] . "/funcAddPg.php"; ?>
<?php AddDataPostgres();
$message = AddDataPostgres();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ФГБУ ИАЦ Судебного департамента</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <style>
    body {
        margin-top: 60px;
    }
    </style>

</head>

<body>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Мониторинг доступности баз данных</h1>
      </div>
      <!-- <p class="lead">Что-то будет написано</p> -->
      <button type="submit" class="btn btn-info btn-xs" onclick="location.href='index_new.php'">Назад</button>
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
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<table class="table table-hover">
							<h3>Регистрация новой БД</h3>
							<div class='alert alert-warning'><?php echo "$message"; ?></div>
							<form class="form-reg" role="form" action="formAddPg.php" method="POST">
								<div class="form-group">
									<label for="exampleInputEmail1">Хост</label>
									<input type="text" name="host" class="form-control" id="exampleInputEmail1" placeholder="IP или доменное имя">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Имя базы</label>
									<input type="text" name="dbname" class="form-control" id="exampleInputEmail1" placeholder="Имя базы данных">
								</div>
								<div class="form-group">
									<label for="namegost1">Порт</label>
									<input type="text" name="port" class="form-control" id="exampleInputPassword1" placeholder="Стандартный порт:5432">
								</div>
								<div class="form-group">
									<label for="namegost1">Наименование ПИ</label>
									<input type="text" name="namesoft" class="form-control" id="exampleInputPassword1" placeholder="Наименование ПИ">
								</div>
									<div class="form-group">
									<label for="namegost1">Назначения</label>
									<input type="text" name="des" class="form-control" id="exampleInputPassword1" placeholder="Назначения">
								</div>
								<div class="form-group">
									<label for="namegost1">Имя пользователя</label>
									<input type="text" name="user" class="form-control" id="exampleInputPassword1" placeholder="Имя пользователя">
								</div>
								<div class="form-group">
									<label for="namegost1">Пароль</label>
									<input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
								</div>
								<button type="submit" class="btn btn-default btn-xs">Создать новую запись</button>
							</form>
						</table>
					</div>
				</div>
			</div>
      </table>
    </div>
</body>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>