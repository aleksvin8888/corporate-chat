   <ul>
        <?php
            // запрос в базу для вывода всех собщений  на  странице Общий чат
            $sql = " SELECT * FROM public_chat";
            $result = mysqli_query($connect, $sql);
            $col_messegs = mysqli_num_rows($result);

            $i = 0;
            while ($i < $col_messegs) {
                $messages = mysqli_fetch_assoc($result);
            ?>
                <li>
                <?php
                    
                    // вывести даные конкретного пользователя который отправил сообщения
                    $sql = " SELECT * FROM users WHERE id=" . $messages["id_sender"];
                    $result_user = mysqli_query($connect, $sql);
                    $polzovatel = mysqli_fetch_assoc($result_user);
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
        ?>
    </ul>