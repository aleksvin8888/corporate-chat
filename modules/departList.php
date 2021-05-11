 
<ul>
 <!-- подключаем список пользователей, которые есть участниками того же департамента   -->
<?php
 // если существует GET запрос на поиск пользователя среди пользователей  ОДНОГО 
 // конкретного департамента 
    
	        // выбрать всех у кого depart_id соответствует depart_id авторизированого пользователя 
	        // кроме пользователя которий авторизирован 
	        $sql = "SELECT * FROM users WHERE id !=
	        '" . $user_id . "' AND depart_id ='". $user_depart_id ."'";

	        $result    = mysqli_query($connect, $sql);
	        $num_users = mysqli_num_rows($result);
    
                $i = 0;
                while ($i < $num_users) {
                $user = mysqli_fetch_assoc($result);
            ?>
                <li>
                    <a href="/private.php?user_id=<?php echo $user['id']; ?>">
                        <div class="avatar">
                            <img src="images/usericon.png">
                        </div>
                        <p style="margin: 0;font-weight: bold;"><?php echo $user["name"]; ?></p>
                        <p style="margin: 0; font-style: italic;"><?php echo $user["office"]; ?>
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


?> 