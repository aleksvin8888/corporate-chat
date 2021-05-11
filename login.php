<?php
include "configs/db.php";
if (isset($_POST["login"]) && isset($_POST["password"])
		&& $_POST["login"] != "" && $_POST["password"] != "") {

	$sql = "SELECT * FROM users WHERE email ='" . $_POST["login"] . "' AND password = '" . $_POST["password"] . "'";

	$result = mysqli_query($connect, $sql);
	$num_users = mysqli_num_rows($result);
	
	if($num_users == 1) {

		$user = mysqli_fetch_assoc($result);
		setcookie("user_id", $user["id"], time() + 60*60*30);

		header("Location: /");
	} else {
		echo "<h2>Логин или пароль введены неверно</h2>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
	<link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
	<?php
	include "site_parts/head.php";
	?>
	<div id="content">
		<form class="form-4" method="POST">
		    <h1>Форма входа</h1>
		    <p>
		        <label for="login">Логин или email</label>
		        <input type="text" name="login" placeholder="Логин или email" required>
		    </p>
		    <p>
		        <label for="password">Пароль</label>
		        <input type="password" name='password' placeholder="Пароль" required>
		    </p>
		 
		    <p>
		        <input type="submit" name="submit" value="Продолжить">
		    </p>
		    <p>
		    	<a href="register.php" type="button" name="register">Зарегистрироваться</a>
		    </p>  
		</form>		
	</div>
</body>
</html>