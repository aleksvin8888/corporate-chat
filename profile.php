<!DOCTYPE html>
<html>

<head>
    <title>Профиль</title>
    <link rel="stylesheet" type="text/css" href="styles/main.css">
</head>

<body>
    <?php
include "site_parts/head.php";
if (
    isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["office"]) && isset($_POST["depart_id"]) && isset($_POST["name"]) &&
    $_POST["login"] != "" && $_POST["office"] != "" && $_POST["depart_id"] != "" && $_POST["name"] != ""
) {
    if ($_POST["password"] != "") {
        $sql = "UPDATE users SET name='" . $_POST["name"] . "',email='" . $_POST["login"] . "',password='" . $_POST["password"] . "',office='" . $_POST["office"] . "',depart_id='" . $_POST["depart_id"] . "' WHERE id = '" . $user_id . "'";
    } else {
        $sql = "UPDATE users SET name='" . $_POST["name"] . "',email='" . $_POST["login"] . "',office='" . $_POST["office"] . "',depart_id='" . $_POST["depart_id"] . "' WHERE id = '" . $user_id . "'";
    }
    if (mysqli_query($connect, $sql)) {
    } else {
        echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
    }
    header('Location: ' . $_SERVER['REQUEST_URI']);
}
?>
    <div id="content" style="height: 120%;">
        <form class="form-4" method="POST">
            <?php

            $sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";

            $result = mysqli_query($connect, $sql);
            $user   = mysqli_fetch_assoc($result);

            ?>
            <h1>Личный кабинет</h1>
            <p>
                <p>Ваше имя:</p>
                <label for="login">Имя</label>
                <input type="text" name="name" value='<?php echo $user["name"]; ?>' required>
            </p>
            <p>
                <p>Ваш логин или email</p>
                <label for="login">Логин или email</label>
                <input type="text" name="login" value=<?php echo $user["email"]; ?> required>
            </p>
            <p>
                <p>Новый пароль:</p>
                <label for="password">Пароль</label>
                <input type="password" name='password' placeholder="Пароль">
            </p>
            <p>
                <p>Ваша должность:</p>
                <label for="office">Должность</label>
                <input type="text" name='office' value=<?php echo $user["office"]; ?> required>
            </p>
            <p>
                <p>Ваш департамент:</p>
                <label for="depart_id">указать Id дапартаманта</label>
                <select name="depart_id" required>
                    <?php
                    if ($user["depart_id"] == 1) {
                    ?>
                    <option value="1" selected="selected">Начальство</option>
                    <?php
                    } else {
                    ?>
                    <option value="1">Начальство</option>
                    <?php
                    }
                    if ($user["depart_id"] == 2) {
    ?>
                    <option value="2" selected="selected">>транспортный отдел </option>
                    <?php
} else {
    ?>
                    <option value="2">транспортный отдел </option>
                    <?php
}
if ($user["depart_id"] == 3) {
    ?>
                    <option value="3" selected="selected">отдел продаж</option>
                    <?php
} else {
    ?>
                    <option value="3">отдел продаж</option>
                    <?php
}
if ($user["depart_id"] == 4) {
    ?>
                    <option value="4" selected="selected">отдел Зaкупок</option>
                    <?php
} else {
    ?>
                    <option value="4">отдел Зaкупок</option>
                    <?php
}
if ($user["depart_id"] == 5) {
    ?>
                    <option value="5" selected="selected">Бугалтерия</option>
                    <?php
} else {
    ?>
                    <option value="5">Бугалтерия</option>
                    <?php
}
if ($user["depart_id"] == 6) {
    ?>
                    <option value="6" selected="selected">отдел кадров</option>
                    <?php
} else {
    ?>
                    <option value="6">отдел кадров</option>
                    <?php
}if ($user["depart_id"] == 7) {
    ?>
                    <option value="7" selected="selected">IT- отдел</option>
                    <?php
} else {
    ?>
                    <option value="7">IT- отдел</option>
                    <?php
}if ($user["depart_id"] == 8) {
    ?>
                    <option value="8" selected="selected">Склад</option>
                    <?php
} else {
    ?>
                    <option value="8">Склад</option>
                    <?php
}if ($user["depart_id"] == 9) {
    ?>
                    <option value="9" selected="selected">Магазин</option>
                    <?php
} else {
    ?>
                    <option value="9">Магазин</option>
                    <?php
}

?>
                </select>
            </p>
            <input type="submit" name="submit" value="Редактировать">
            <a href="logaut.php" class="a-exit"><div class="btn-exit">Выйти >> </div></a>
        </form>
    </div>
</body>

</html>