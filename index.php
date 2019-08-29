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
<body><div class="container">
	<div style="text-align: center;">
        <a href='lib\register.inc.php'><? if(!$autorise->language){echo 'Зарегистрироватся';}elseif($autorise->language==true){echo 'Register';}?></a>
        <?php $autorise->ainitialize();?>

	</div>
</div>

</body>
</html>
