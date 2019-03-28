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

echo "Debut connexion";

// Vérification que tous les champs ont été remplis
if (isset($_POST["id"]) && isset($_POST["password"]) && !empty($_POST["id"]) && !empty($_POST["password"])) {
	$id 	= $_POST["id"];
	$pass 	= $_POST["password"];
}
else {
	header('Location: ./index.php?status=empty_field#jumboForm');
	exit();
}

$sql_connexion = "SELECT *
FROM ".$table."
WHERE '" .$id. "' LIKE email
GROUP BY email";
try {
	$result_connexion = mysqli_query($db_link, $sql_connexion);
} catch (Exception $e) {
	echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
if (!$result_connexion) {
	die('Error : ' . mysqli_error($db_link));
}

if ($result_connexion->num_rows > 0) {
	$row = $result_connexion->fetch_assoc();

	if (!password_verify($pass, $row['password'])) {
		header('Location: ./index.php?status=wrong_password#jumboForm');
		exit();
	} else {
		echo "Connexion livre réussie";
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$_SESSION['email'] 		= $row['email'];
		header('Location: ./success.php');
		exit();
	}
}

/* Logs */
$log_path = "./";
$log_file = "log_upload_".date("Y-m-d").".txt";
$log_content = stripcslashes("Accessed URI: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
file_put_contents($log_path.$log_file, $log_content."\n", FILE_APPEND);


// ------------------------- Echec

header('Location: ../index.php?status=fail_connexion#jumboForm');
exit();
?>