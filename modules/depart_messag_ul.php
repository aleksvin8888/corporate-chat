 <ul>
    <?php                
        // выводим все сообщения где depart_id авторизированого пользователя
        // совпадает с depart_id  сообщения
        $sql  = " SELECT * FROM messages WHERE depart_id =" . $user_depart_id;
        $result = mysqli_query($connect, $sql);
        $col_messegs = mysqli_num_rows($result);

        $i = 0;
        while ($i < $col_messegs) {
        $messages = mysqli_fetch_assoc($result);
        ?>
        <li>
            <?php                                       
            // запрос в базу чтобы  вывести даные пользователя которий отправвил
            // сообщение
            $sql = " SELECT * FROM users WHERE id=" . $messages["sender_id"];
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
    ?>
</ul>