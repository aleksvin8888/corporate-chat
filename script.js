// вивод  списка  сообщений роздел департаменты   через ajax 

// создаем переменную для форми вобор по селектору 
var form = document.querySelector("#form");
// закрепляем  собития отпраки для формы
console.dir(form);
form.onsubmit = function(sobitye) {
// запретить событи отправки формы  по умолчанию 	
sobitye.preventDefault();
var ot = form.querySelector("input[name='user_id']");
var messeg = form.querySelector("textarea");
console.dir(ot);
console.dir(messeg);
var danye = "send_sms=1" +
			"&user_id=" + ot.value +
			"&text=" + messeg.value;
	
// создаем новый обект AJAX				
var ajax = new XMLHttpRequest();
ajax.open("POST", form.action, false);
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
// прикреплям собраные  даные 
ajax.send(danye);	
console.dir(ajax);
var messageList	= document.querySelector("#message-list");
messageList.innerHTML = ajax.response;
messageList.scrollTop = messageList.scrollHeight;
messeg.value = "";


};