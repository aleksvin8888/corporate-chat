<?php
// удаляем КУКИ
setcookie("user_id", "" , 0);
// перенаправления на главную страницу -->
header("location: /");
?>