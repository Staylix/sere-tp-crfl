<!doctype html>
<html>
<head>

	<title>E CORP - Forgot password</title>

	<?php include './header.php';
	
	/* Logs */
	$log_path = "./";
	$log_file = "log.txt";
	$log_content = stripcslashes("Accessed URI: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
	file_put_contents($log_path.$log_file, $log_content."\n", FILE_APPEND);
?>

</head>

<body>

	<div class="flexer">

		<div class="jumbotron" id="jumboForm">
			<h2>Reset your password</h2>

			<a href="./index.php" class="btn btn-login">Log in</a>

			<form id="connexionForm" action="./send_new_password.php" method="post">
				<div class="form-group">
					<label for="formInputId">Email:</label>
					<input type="text" class="form-control" id="formInputId" name="email-field" placeholder="Email">
				</div>
				<button type="submit" class="btn">Send me a new password</button>
			</form>
		</div>
	</div>

</body>
