<?php
include 'database.php';
$queryUser = "SELECT * FROM users where fullName='".$_SESSION['user']."' ";
$user= $connect->query($query);

$user = $_SESSION['user'];
foreach ($user as $key => $value) {
	$to = $value['email'];
	$id = $value['id'];
}
$subject = 'Email Activation';
$message = 'Hello'.$user.', Thankyou to activate your account now you are able to buy form our vast collection of shoes';
$headers = 'From: sepa2@yandex.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

	if(@mail($to, $subject, $message, $headers)){
		header("Location: profile");
		$query="UPDATE users SET email_confirm = 'CONF' ";
	}
	else{
		$alert = "Mail Not Sent";
		header("Location: reEmail");
?>
	
<?php } ?>
