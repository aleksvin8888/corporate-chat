<?php

include "..//configs/db.php";
if(isset($_COOKIE["user_id"])) {
	$user_id = $_COOKIE["user_id"];
}


  if (isset($_POST["send_sms"]) && $_POST["text"] != "") {
        // запрос в базу на добавления нового сообщения с роздела  ( Приватные )
                
   $sql = " INSERT INTO messages (text, sender_id, recipient_id)
            VALUES ('" . $_POST['text'] . "', '" . $user_id . "', '" . $_GET['user_id'] . "') ";
             if (mysqli_query($connect, $sql)) {
                }
            }

include "..//modules/private_message_ul.php";

?>