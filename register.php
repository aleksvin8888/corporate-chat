<?php
include "configs/db.php";
	if (
		isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["office"]) && isset($_POST["depart_id"]) && isset($_POST["name"]) &&
		$_POST["login"] != "" && $_POST["password"] != "" && $_POST["office"] != "" && $_POST["depart_id"] != "" && $_POST["name"] != ""
		) {

		$sql = "INSERT INTO users (name, email, password, office, depart_id) VALUE ('". $_POST["name"] ."','". $_POST["login"] ."','". $_POST["password"] ."','". $_POST["office"] ."','". $_POST["depart_id"] ."');";
		if (mysqli_query($connect, $sql)) {
			echo "<h2>Пользователь добавлен</h2>";
			header("Location: /login.php");
		} else {
			echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
		}
	}
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Registretion</title>
	<link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
	<?php
	include "site_parts/head.php";
	?>
	<div id="content">
		<form class="form-4" method="POST">
		    <h1>Форма регистрации</h1>
		    <p>
		        <label for="login">Имя</label>
		        <input type="text" name="name" placeholder="Имя" required>
		    </p>

		    <p>
		        <label for="login">Логин или email</label>
		        <input type="text" name="login" placeholder="Логин или email" required>
		    </p>

		    <p>
		        <label for="password">Пароль</label>
		        <input type="password" name='password' placeholder="Пароль" required>
		    </p>
		    <p>
		        <label for="office">Должность</label>
		        <input type="text" name='office' placeholder="Должность" required>
		    </p>
			 <p>
		        <label for="depart_id">укзать Id дапартаманта</label>
		        <select  name="depart_id" required>
				<option>Выберите департамент</option>
				<option value="1">Начальство</option>
				<option value="2">транспортный отдел </option>
				<option value="3">отдел продаж</option>
				<option value="4">отдел Зaкупок</option>
				<option value="5">Бугалтерия</option>
				<option value="6">отдел кадров</option>
				<option value="7">IT- отдел</option>
				<option value="8">Склад</option>
				<option value="9">Магазин</option>
				</select>					 
			</p>		 
		    <p>
		        <input type="submit" name="submit" value="Продолжить">
		    </p>
		</form>
	</div>
</body>
</html>