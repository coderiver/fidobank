<?php 

	$user_name = $_POST['user_name'];
	$user_code = $_POST['user_code'];
	$user_phone = $_POST['user_phone'];
	$user_day = $_POST['user_day'];
	$user_month = $_POST['user_month'];
	$user_year = $_POST['user_year'];
	$user_status = $_POST['user_status'];
	$user_money = $_POST['user_money'];

	$msg_success = 'Спасибо! Ваша заявка успешно отправлена. Менеджер по выдаче кредитов свяжется с вами в ближайшее время.';
	$msg_error = 'Извините, у нас отсутствуют предложения по кредитованию для Вас';
	
	$recipient = "arismiatov@profdigital.com.ua";
	// $recipient = "arturmorozv@gmail.com";
	$subject = "Fidobank";
	$mailheader = "From: $subject \r\n";

	$content = "Имя: ".$user_name."\r\nИНН: ".$user_code."\r\nТелефон: ".$user_phone."\r\n Дата рождения: ".$user_day.".".$user_month.".".$user_year."\r\nТрудоустройство: ".$user_status."\r\nСумма кредита: ".$user_money."грн";

?>
 
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" media="all" href="css/screen.css">
</head>
<body>
<!-- wrapper -->
<div class="wrapper">
	<!-- in -->
	<div class="in">
		<!-- header -->
		<header class="header l">
			<div class="header__logo"></div>
			<div class="header__title">Спасибо <span>за заявку</span></div>
		</header>
		<!-- msg -->
		<div class="msg">

			<?php

				$date = microtime(true);
				$birthdate = $user_year .'-'. $user_month .'-'. $user_day;
				$birthdate_ms = strtotime($birthdate);
				$ms = $date - $birthdate_ms;
				$age = $ms / 31536000;

				if ($user_status == 'Работаю не официально' || $user_status == 'Не трудоустроен' || $age < 22 || $age > 65) {
					echo $msg_error;
				}
				else {
					mail($recipient, $subject, $content, $mailheader) or die("Error!");
					echo $msg_success;
				}

			?>
		</div>
	</div>
</div>
<!-- Salesdoubler -->
<script type="text/javascript" src="//rdr.salesdoubler.com.ua/in/pixel/787/tracking.js?trans_id={<?php echo $user_code; ?>}"></script>
</body>
</html>