<!doctype html>
<html>
<head>

	<title>E CORP - Welcome</title>

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
			<h2>Welcome</h2>

			<h6>Welcome on your new account</h6>
		</div>
	</div>

</body>
