<?php
include 'lib\autorise.inc.php';
$autorise=  new autorise;
?>
<html>
<head>
    <title>my script</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css" >
</head>
<body style="background-image: url(/lib/files/misc/background.jpg 100% 100% no-repeat);">

    <div class="header">
        <div class="contacts nnn"><a>Телефон:(499)3409431</a><br>
            <a>Email:info@future-group.ru</a><br>
        <div class="comm">Комментарии</div>
        </div>
        <div class="nnn logo">
            <img style="width: 150px;height: 150px;" src='\lib\files\misc\imgs.gif'>
        </div>

    </div>
	<div class="container">
		<div>
			<a href='lib\register.inc.php' class="reg"><? if(!$autorise->language){echo 'Зарегистрироватся';}elseif($autorise->language==true){echo 'Register';}?></a></div>
		<div>

		<?php $autorise->ainitialize();?>
<?include 'lib\chat.php';
$chat=new chat;
$chat->autoriselanguage=$autorise->language;
$chat->autoriselog=$autorise->log;
?><div style="margin-left: 10%;margin-top: 10%"><?
$chat->chat();
?><div style="margin:10% 0 10% 0;"><?
$chat->pagination();
                ?></div><?
$chat->atcdrawinput();

                ?></div>

	</div>
</div>
    <div class="footer">
        <div class="nnn ">
            <img style="width: 100px;height: 100px;" src='\lib\files\misc\imgs.gif'>
        </div><div class="contacts nnn"><a>Телефон:(499)3409431</a><br>
            <a>Email:info@future-group.ru</a><br>
            <a>Адрес:115088 Москваб ул. 2-я Машиностроительнаяб д.7 стр.1</a><br>
            <a>	&copy; 2010-2014 Future. Все права защищены</a><br>
            <div class="comm">Комментарии</div>
        </div>


    </div>
</body>
</html>
