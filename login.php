<?php
header('Content-Type: text/html; charset=utf-8');
include_once '/helpers/logWithAccount.php'
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
							<label for="userName"> Потребител: </label>
						</br>
							<input type="text" name="userName" value="Insert your Username:" data-defaultValue="Insert your Username:" id="userName" maxlength="45">
						</br>
							<label for="password">Парола:</label>
						</br>
							<input type="password" name="password" value="*********" data-defaultValue="*********" id="password" maxlength="99"> 
						</br>
							<input type="checkbox" name="rememberMe" id="rememberMe" value="RememberMe"> Запомни ме на този компютър!
						</br>
						<?php 
							if($typeError['wrong_username'] || $typeError['wrong_pass'])
								echo "<h4>Wrong username or password.</h4>";
						?>
							<input type="submit"  id="submitter" value="Влез"> 
						</br>
						</br>
						</br>
						
					</br>
					<div class="buttons">
						<a href="forgottenPass.html"> <h4>Забравена парола</h4> </a>
						<a href="registration.php"> <h4>Регистрирай се!<h4/> </a>
					</div>
						</form>
					</div>
				</content>
				<footer>
					НаБас © Всички права са запазени .
				</footer>
			</div>
		
	</body>
</html>
