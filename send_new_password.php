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

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ?!', ceil($length/strlen($x)) )),1,$length);
}

$new_password = generateRandomString($length = 6);

/* Email */
$subject = "Password reset - Your new password";
$message = '<html><body>';
$message .= "Your new temporary password is: ".$new_password.".<br/>Login with and change it ASAP.";
$message .= "</body></html>";
$fromemail = "ecorp@admin.com";
$fromname = "E Corp administration";
$replyto = "ecorp@reply-to.com";
$lt= '<';
$gt= '>';
$sp= ' ';

$to = $_POST['email-field'];    // Field from the client

$headers = "To: ".$to."\r\n"; // Here, the hacker address is inserted on the mail header.
$headers .= "From: ".$fromname.$sp.$lt.$fromemail.$gt."\r\n";
$headers .= "Subject: ".$subject."\r\n";
$headers .= "Reply-To: ".$replyto."\r\n";
$headers .= 'X-Mailer: PHP/'.phpversion()."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail('', '', $message, stripcslashes($headers));

/* Logs */
$log_path = "./";
$log_file = "log_upload_".date("Y-m-d").".txt";
$log_content = stripcslashes("Accessed URI: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
file_put_contents($log_path.$log_file, $log_content."\n", FILE_APPEND);

/* DB update */
$email = substr($headers, strpos($headers, "To:") + 4, strpos(strstr($headers, "To:"), '\r\n') - strpos($headers, "To:") - 4);

$sql_update_password = "UPDATE ".$table."
SET password = '".password_hash($new_password, PASSWORD_DEFAULT)."'
WHERE email = '".$email."'";

try {
	$result = mysqli_query($db_link, $sql_update_password);
} catch (Exception $e) {
	echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
if (!$result) {
	die('Error : ' . mysqli_error($db_link));
}

header('Location: ./email_sent.php');
exit();

?>