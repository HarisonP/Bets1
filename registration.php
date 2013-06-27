<?php
header('Content-Type: text/html; charset=utf-8');
include_once '/helpers/createAccount.php'
?>

<html>
	<head>
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
		<script src="jquery-1.4.4.min.js"></script>
		<script src="style.js"></script>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	</head>

	<body>
			<div class="cutted">
			
				<header>
					<h1>
						НаБас 
						<a href="login.php"> Login </a>
					</h1>
				</header>
				<content>
					<aside>
						<div class="buttons">
							<a href="index.php">Начало</a>
							<a href="unaccepted.html">Неприети</a>
							<a href="accepted.html">Приети</a>
							<a href="my.html">Мои</a>
						</div>
					</aside>
					<div class="main">
							<form method="post">
								<label for="name"> Име: </label>
								</br>
								<input type="text" name="name" value="Insert Username:"data-defaultValue="Insert Username:" id="name" maxlength="45"/>
								<?php
								if($typeError['NOT_LONG_ENOGHT_USERNAME'])  
									echo "<h4>Username must be at least 4symbols.</h4>";
								elseif($typeError['USERNAME_TAKEN'])  
									echo "<h4>Username is taken.</h4>";
								?>
								</br>
								<label for="password"> Парола: </label>
								</br>
								<input type="password" name="password" value="*********" data-defaultValue="*********" id="password" maxlength="99"/>
								<?php
								if($typeError['NOT_LONG_ENOGHT_PASS'])  
									echo "<h4>Password must be at least 7symbols.</h4>"
								?>
								</br>
								<label for="repassword"> Повтори паролата:: </label>								
								</br>
								<input type="password" name="repassword" value="*********" data-defaultValue="*********"  id="repassword" maxlength="99"/>
								<?php
								if($typeError['NOT_COMFORMT_PASSWORD'])  
									echo "<h4>Passwords didn't match</h4>"
								?>
								</br>
								<label for="email"> Електронна поща: </label>	
								</br>
								<input type="text" name="email" value="Insert your Email:" data-defaultValue="Insert your Email:" id="email" maxlenght="45"/>
								<?php
								if($typeError['NOT_VALID_EMAIL'])  
									echo "<h4>Email is not valid.</h4>";
								elseif ($typeError['TAKEN_EMAIL']) 
									echo "<h4>Email is taken.</h4>";
								?>
								</br>
								<input type="submit" value="Регистрирай ме"/>
								<?php
								if($typeError['conn_fail'])  
									echo "<h4>Connection with database lost.</h4>";
								elseif($typeError['ok'])
									echo "<h4>Created";
								?>
								</br>
							</form>
					</div>
				</content>
				<footer>
					НаБас © Всички права са запазени .
				</footer>
			</div>
		
	</body>
</html>
