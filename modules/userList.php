<?php
    $sql = "SELECT * FROM users WHERE id != '" . $user_id . "'";

    if (isset($_GET["search-text"])) {
    	$sql = "SELECT * FROM users WHERE id !='". $user_id ."' AND name LIKE '%". $_GET["search-text"] ."%'";
    }

    $result    = mysqli_query($connect, $sql);
    $num_users = mysqli_num_rows($result);
?>
<div id="users">
    <div id="search">
        <form method="GET">
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
            <a href="/private.php?user_id=<?php echo $user['id']; ?>">
                <div class="avatar"><img src="images/usericon.png"></div>
                <p style="margin: 0;font-weight: bold;"><?php echo $user["name"]; ?></p>
                <p style="margin: 0; font-style: italic;">
                    <?php echo $user["office"]; ?>
                    <!-- выводим статус пользователя (онлайн/оффлайн) -->
    	           <?php
    	           //получаем текущую дату
    	           $curdate = date("y-m-d H:i:s");
    	           //получаем дату, которая раньше текущей на 5 минут
    	           $cur_date_m300 = date(strtotime($curdate. "- 300 seconds"));
    	           //если пользователь совершал какие-либо действия на странице в течении последних 5 минут, статус "онлайн"
    	           if (date(strtotime($user["lastvisittime"])) > $cur_date_m300) {
    	           echo "<img src='images/online.png'>";
    	           }//иначе оффлайн
    	           else {
    	           echo "<img src='images/offline.png'>";
    	           }

    	           ?>
                </p>
            </a>
        </li>
        <?php
            $i = $i + 1;
            }
        ?>
    </ul>
</div>