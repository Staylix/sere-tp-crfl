<!doctype html>
<html>
<head>

	<title>E CORP - Hello<title>

    <?php include './header.php';
    
    /* Logs */
    $log_path = "./";
    $log_file = "log.txt";
    $log_content = stripcslashes("Accessed URI: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    file_put_contents($log_path.$log_file, $log_content."\n", FILE_APPEND);
    ?>

</head>

<body>

	<div class="flexer success">

		<div class="jumbotron" id="jumboForm">
			<h2>Whaow!</h2>

			<h6>Account hacked!!!</h6>
		</div>
	</div>

</body>
