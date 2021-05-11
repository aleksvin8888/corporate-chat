<?php
include "configs/db.php";
include "configs/settings.php";
// если на страничке  существует КУКА  то продолжаем  загружать иначе переходим к авторизацыи
if ($user_id == null) {
    header("Location: /login.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>CoopChat</title>
    <link rel="stylesheet" type="text/css" href="styles/main.css">
</head>

<body>
    
    <?php
        //подключаем шапку  сайта   
        include "site_parts/head.php";
        ?>
    <div id="content">
        
        <?php
        //подключаем список пользователей  
        include "modules/userList.php";
        ?>
        <div id="messages">
            <div id="message-list">
             <?php
                //подключаем блок сообщений  общего чата  
                include "modules/public_message_ul.php";
             ?>
            </div>
            <form id="form" action="http://Coop.local/handling/public_handling.php" method="POST">
                <input type="hidden" name="user_id" value="">
                <textarea name="text"></textarea>
                <button type="submit" name="send_sms"><img src="images/send.png"></button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>