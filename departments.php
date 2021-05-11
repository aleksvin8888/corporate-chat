<?php

include "configs/db.php";
include "configs/settings.php";
// если на страничке  существует КУКА  то продолжаем  загружать иначе переходим к авторизации
if ($user_id == null) {
    header("Location: /login.php");
}

// запрос в базу для получения depart_id   авторизированого пользователя
    $sql       = "SELECT * FROM users WHERE id = '" . $user_id . "'";
    $result    = mysqli_query($connect, $sql);
    $num_users = mysqli_num_rows($result);
    $user      = mysqli_fetch_assoc($result);   
    $user_depart_id = $user["depart_id"];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Departaments</title>
    <link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
    <?php
         //<!-- подключаем шапку  сайта   -->
        include "site_parts/head.php";
    ?>
    <div id="content">
        <div id="users"> 
            <div id="search"><!-- форма для поиска пользователя    -->
                <form method="GET">
                    <input type="text" name="search-text">
                    <button type="submit">
                        <img src="images/search.png">
                    </button>
                </form>
            </div>
                <?php
                //<!-- СПИСОК ПОЛЬЗОВАТЕЛЕЙ  ТОЛЬКО ОДНОГО ДЕПАРТАМЕНТА   -->
                include "modules/departList.php";
                ?>
        </div>
        <div id="messages">
            <div id="message-list">
                <?php
               // подключаем  блок  отображения сообщений 
               include "modules/depart_messag_ul.php";
               ?>
            </div>
            <!-- форма отправки сообщения со страницы Департамент -->
            <form id="form" action="http://Coop.local/handling/depart_handling.php" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                <textarea name="text"></textarea>
                <button type="submit" name="send_sms"><img src="images/send.png"></button>
            </form>
        </div>
    </div>
<script src="script.js"></script>
</body>
</html>