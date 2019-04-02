<!doctype html>
<html>
<head>

	<title>E CORP - Log in</title>

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
			<h2>Email sent</h2>

			<h6>An email has been sent to your address with a temporary password.</h6>

            <a href="./index.php" class="btn btn-login">Log in</a>

		</div>
	</div>

</body>
