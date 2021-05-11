<?php
include "configs/db.php";
include "configs/settings.php";

	if (isset($_COOKIE["user_id"])) {
		$sql = "UPDATE users SET lastvisittime = '". date("y-m-d H:i:s") ."' WHERE id = '" . $user_id . "'";
		$result    = mysqli_query($connect, $sql);

	}

?>

<div id="head">
    <div id="logo">
        <div id=logo-pic>
            <img src="images/logo.png">
        </div>
        <span><b>Бизнес</b><i>СЕТЬ</i></span>
    </div>
    <div id="menu">
        <a href="/">Общий чат</a>
        <a href="departments.php">Департамент</a>
        <a href="private.php?user_id">Личные</a>
        <?php
            $sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
            $result = mysqli_query($connect, $sql);
            $user   = mysqli_fetch_assoc($result);
        if (isset($user_id)) {
        ?>
        <a href="profile.php"><?php echo $user["name"]; ?>   Profil</a>
        <?php
} else {
    ?>
        <a href="login.php">Войти</a>
        <?php
}

?>
    </div>
</div>