<?php
// подключаем базу даных
include "..//configs/db.php";

$user_id = $_COOKIE["user_id"];

if (isset($_POST["send_sms"])) {

	// запрос в базу для получения depart_id   авторизированого пользователя
	$sql       = "SELECT * FROM users WHERE id = '" . $user_id . "'";
	$result    = mysqli_query($connect, $sql);
	$num_users = mysqli_num_rows($result);
	$user      = mysqli_fetch_assoc($result);
	
	$user_depart_id = $user["depart_id"];
	
	// если сещесвует POST запрос с формы на страничке ДЕПАРТ и  он не пустой то 
	if (isset($_POST["send_sms"]) && $_POST["text"] != "") {
	    // запрос в базу на добавления нового сообщения с роздела  ( Департаменты  )
	    // также прописываеи в базу depart_id   авторизированого пользователя
	    $sql = " INSERT INTO messages (text, sender_id, depart_id)
				VALUES ('" . $_POST["text"] . "', '" . $user_id . "', '" . $user_depart_id . "') ";

	    if (mysqli_query($connect, $sql)) {
	    	
	    }
	}
	
}

include "..//modules/depart_messag_ul.php";


?>