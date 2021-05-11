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
    <title>Private</title>
    <link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
    <?php 
    //<!-- подключаем шапку  сайта   -->     
    include "site_parts/head.php";
    ?>
    <div id="content">
        <?php
                if (isset($_GET['user_id'])) {
                    $sql = "SELECT DISTINCT users.id, users.name, users.office FROM users INNER JOIN messages ON ((messages.sender_id = $user_id OR messages.recipient_id = $user_id) AND messages.depart_id = 0 AND (messages.sender_id = users.id OR messages.recipient_id = users.id)) WHERE  users.id != $user_id";
                } else if (isset($_POST['search-text'])) {
                    $sql = "SELECT DISTINCT users.id, users.name, users.office FROM users INNER JOIN messages ON ((messages.sender_id = $user_id OR messages.recipient_id = $user_id) AND messages.depart_id = 0 AND (messages.sender_id = users.id OR messages.recipient_id = users.id)) WHERE  users.id != $user_id AND users.name LIKE '%" . $_POST["search-text"] . "%' ";
                }
                $result    = mysqli_query($connect, $sql);
                $num_users = mysqli_num_rows($result);
        ?>
        <div id="users">
            <div id="search">
                <form method="POST">
                    <input type="text" name="search-text">
                    <button type="submit">
                        <img src="images/search.png">
                    </button>
                </form>
            </div>
            <ul>
                <?php
                    $i = 0;
                    while ($i < $num_users) {
                    $user = mysqli_fetch_assoc($result);
                ?>
                <li>
                    <a href="/private.php?user_id=<?php echo $user['id']; ?>"><div class="avatar"><img src="images/usericon.png"></div>
                    <p style="margin: 0;font-weight: bold;"><?php echo $user["name"]; ?></p>
                    <p style="margin: 0; font-style: italic; "><?php echo $user["office"]; ?></p>
                    </a>
                </li>
                <?php
                $i = $i + 1;
                }
                ?>
            </ul>
        </div>
        <div id="messages">
            <div id="message-list">
                <?php
                // подключаем список сообщений 
                include "modules/private_message_ul.php";

                ?>
            </div>
            <!-- форма отправки сообщения со страницы Приват -->
            <form id="form" action="http://Coop.local/handling/private_handling.php?user_id=<?php echo $_GET["user_id"]; ?>" method="POST">
                <input type="hidden" name="user_id" value="">
                <textarea name="text"></textarea>
                <button type="submit" name="send_sms"><img src="images/send.png"></button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>