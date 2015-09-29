<?php
if(isset($_POST['email']) AND trim($_POST['websiteurl']) =='') 
{
	if (!check_email($_POST['email'])) 
	{
		echo 'Please enter a valid email address<br />';
	}
	else send_email();
}
exit;

function check_email($emailAddress) {
	if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
	  return TRUE;
	} else {
	  return FALSE;
	}
}
function send_email() {
	$message = "\nName: " . $_POST['name'] .
		"\nEmail: " . $_POST['email'] ;

	$message .= "\nMessage: " . $_POST['message'] .
		"\n\nBrowser Info: " . $_SERVER["HTTP_USER_AGENT"] .
		"\nIP: " . $_SERVER["REMOTE_ADDR"] .
		"\n\nDate: " . date("Y-m-d h:i:s");

	$siteEmail = $_POST['receiver'];
	$emailTitle = $_POST['subject'];
	$thankYouMessage = "Thank you for contacting us, we'll get back to you shortly.";   

	if(!mail($siteEmail, $emailTitle, $message, 'From: ' . $_POST['name'] . ' <' . $_POST['email'] . '>'))
		{ echo 'error';}
	else { echo 'success'; }
}


?>
