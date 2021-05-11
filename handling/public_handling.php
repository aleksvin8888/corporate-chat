<?php 
include "..//configs/db.php";

if(isset($_COOKIE["user_id"])) {
	$user_id = $_COOKIE["user_id"];
}

if (isset($_POST["send_sms"]) && $_POST["text"] != "") {

    // запрос в базу на добавления нового сообщения с роздела  ( Общий чат  )
    // также прописываеи в базу depart_id   авторизированого пользователя
    $sql = "INSERT INTO public_chat (text, id_sender)
			VALUES ('" . $_POST["text"] . "', '" . $user_id . "')";

    mysqli_query($connect, $sql);
}

//подключаем блок сообщений  общего чата  
include "..//modules/public_message_ul.php";

?>