<?php
session_start();
header('Content-type:text/html; charset=utf-8');
if(isset($_POST["send"])) {
	$name=htmlspecialchars($_POST["name"]);
	$email=htmlspecialchars($_POST["email"]);
	$phone=htmlspecialchars($_POST["phone"]);
	$msg=htmlspecialchars($_POST["msg"]);
	$_SESSION["name"]=$name;
	$_SESSION["email"]=$email;
	$_SESSION["phone"]=$phone;
	$_SESSION["msg"]=$msg;

	$to = "gred@live.ru";
	$subject = "Заявка от ".$name." телефон ".$phone;
	$msg = wordwrap($msg, 70, "\n", 1);
	echo "$msg\n";
	// Дополнительные заголовки 
	$headers = "Content-type: text/plain; charset=\"UTF-8\""."\r\n";
	$headers .= "From: e-mail ".$email."\r\n";
	$headers .= "Content-type: text/plain; charset=\"UTF-8\""; 
	mail($to, $subject, $msg, $headers);
}
?>

<!doctype html>
<html>
<head lang="ru">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Электромонтаж САТРА Челябинск. Квалифицированные профессионалы выполнят любые работы по электричеству!">
<meta name="keywords" content="Электромонтаж Электричество Электрик Освещение Электропроводка Электрогенераторы Насосы Видеонаблюдение Видеодомофон Челябинск">
<meta name="author" content="Электромонтаж САТРА">

<title>Электромонтаж САТРА Челябинск</title>

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!--<link href="style.css" rel="stylesheet" type="text/css" />-->

<style type="text/css">

body {
	width: 99%;
	font-family: Arial, Calibri, Cambria;
	color: rgba(10,30,120,1);
	letter-spacing: 1px;
	word-spacing: 2px;
	background-color: rgba(30,180,240,0.1);
	cursor: default;
}

#order1 {
	width: 95%;
	max-width: 550px;
	margin-top: 20px;
	margin-left: 40px;
	position: relative;
	float: left;
	overflow-x: hidden;
	overflow-y: hidden;
	border: 20px solid rgba(30,180,240,0.8);
	border-top-left-radius: 100px;
	border-top-right-radius: 100px;
	box-shadow:inset 0px 0px 0px rgba(30,180,240,1.00);
}
#order2 {

}
.order3, .order4 {
	width: 100%;
	display: block;
	border-top-left-radius: 100px;
	border-top-right-radius: 100px;
}
.order4 {
	position:absolute;
	top:0;
	opacity:0;
	animation:order4 1s 10;
}
#order1:hover .order4 {opacity:1;}
@keyframes order4 {from {opacity:0;} to {opacity:1;}}

#name, #email, #phone, #msg, #send {
	width: 90%;
	margin-left: 5%;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	overflow-x: hidden;
	overflow-y: hidden;
	color: rgba(70,85,140,1.00);
	font-size: 25px;
	background-repeat: no-repeat;
	background-size: contain;
	border: 10px solid rgba(30,180,240,0.8);
	margin-bottom: 10px;
}
#email {
	text-indent: 50px;
	background-image: url(imgs/embl/email1.png);
}
#phone {
	text-indent: 50px;
	background-image: url(imgs/embl/phone.png);
}
#msg {
	height: 200px;
	overflow-x: scroll;
	overflow-y: scroll;
}
#send {
	cursor:pointer;
}


</style>


</script>

<body><noscript><p class="blink">Ваш браузер не поддерживает скрипты! Часть спецэффектов отключена!</p></noscript>

<div id="order1">
<img class="order3" src="imgs/order3.png" alt=""/>
<img class="order4" src="imgs/order4.png" alt=""/>

<form name="order2" method="post">
<input id="name" name="name" type="text" placeholder="Ваше имя" value="<?=$_SESSION["name"]?>">
<input id="email" name="email" type="email" placeholder="Ваш e-mail" value="<?=$_SESSION["email"]?>">
<input id="phone"  name="phone" type="tel" placeholder="Ваш телефон" value="<?=$_SESSION["phone"]?>">
<textarea id="msg" name="msg" cols="200" rows="10"><?=$_SESSION["msg"]?></textarea>
<input id="send" name="send" type="submit" value="Отправить заявку">
</form>
</div>



<div class="footer blue5"></div>


</body>
</html>