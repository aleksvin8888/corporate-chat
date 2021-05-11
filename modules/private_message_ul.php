<ul>
    <?php
    if (isset($_GET["user_id"]) && $_GET["user_id"] != null) {
    $sql = $sql = "SELECT * FROM messages" .
            " WHERE (sender_id = " . $_GET["user_id"] .
            " AND recipient_id = " . $_COOKIE["user_id"] . ")" .
            " OR" ." (recipient_id = " . $_GET["user_id"] .
            " AND sender_id = " . $_COOKIE["user_id"] . ")";
    $result      = mysqli_query($connect, $sql);
    $col_messegs = mysqli_num_rows($result);

    $i = 0;
    while ($i < $col_messegs) {
    $messages = mysqli_fetch_assoc($result);
        ?>
        <li>
        <?php
            // запрос в базу чтобы  вывести даные пользователя которий отправвил
            // сообщение
            $sql        = "SELECT * FROM users WHERE id=" . $messages["sender_id"];
            $polzovatel = mysqli_query($connect, $sql);
            $polzovatel = mysqli_fetch_assoc($polzovatel);
            ?>
            <div class="avatar"><img src="images/user.png"></div>
            <h2><?php echo $polzovatel["name"]; ?></h2>
            <h2><?php echo $polzovatel["office"]; ?></h2>
            <p><?php echo $messages["text"]; ?></p>
            <div class="time"><?php echo $messages["time"] ?></div>
        </li>
            <?php
            $i = $i + 1;
            }
        if ($col_messegs == 0) {
            echo "<h2>There are no messages!</h2>";
        }
    } else {
        echo "<h2>There are no messages!</h2>";
    }
    ?>
</ul>