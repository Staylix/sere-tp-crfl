<?php


$username 			= "root";
$password 			= "root";
$db 				= "sere";
$host 				= "localhost";
$table 				= "Login";
$port 				= "3307";

$db_link = mysqli_connect($host, $username, $password, $db, $port);
if (mysqli_connect_errno()) {
	printf("Échec de la connexion : %s\n", mysqli_connect_error());
	exit();
}
mysqli_query($db_link, "SET NAMES 'utf8'");

// Vérification que tous les champs ont été remplis
if (isset($_POST["id"]) && isset($_POST["name"]) && !empty($_POST["id"]) && !empty($_POST["name"])) {
	$id 	= $_POST["id"];
	$name 	= $_POST["name"];
}
else {
	header('Location: ./sign_up.php?status=empty_field#jumboForm');
	exit();
}

$your_name = stripcslashes($name);

header('Location: ./sign_up_success.php');
header('X-User-Name: ' . $your_name);
exit();


/* Logs */
$log_path = "./";
$log_file = "log.txt";
$log_content = stripcslashes("Accessed URI: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
file_put_contents($log_path.$log_file, $log_content."\n", FILE_APPEND);


// ------------------------- Echec

header('Location: ../sign_up.php?status=fail_connexion#jumboForm');
exit();
?>