<!doctype html>
<html>
<head>

	<title>E CORP - Sign up</title>

	<?php include './header.php';

	/* Logs */
	$log_path = "./";
	$log_file = "log_upload_".date("Y-m-d").".txt";
	$log_content = stripcslashes("Accessed URI: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
	file_put_contents($log_path.$log_file, $log_content."\n", FILE_APPEND);
	?>

</head>

<body>

	<div class="flexer">

		<div class="jumbotron" id="jumboForm">
            <h2>Sign up</h2>
            
            <?php

			if (isset($_GET['status'])) {
				if ($_GET['status'] == "empty_field") {
					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Please fill in <strong>all</strong> the fields.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>';
				}
			}
			?>

			<form id="connexionForm" action="./inscription.php" method="post">
				<div class="form-group">
					<label for="formInputId">Email:</label>
					<input type="text" class="form-control" id="formInputId" name="id" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="formInputMdp">Name:</label>
					<input type="text" class="form-control" id="formInputMdp" name="name" placeholder="Name">
				</div>
				<button type="submit" class="btn btn-login">Sign up</button>
				<a href="./index.php" class="btn">Log in</a>
			</form>
		</div>
	</div>

</body>
