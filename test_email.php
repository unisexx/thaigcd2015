<?
echo "send start";
$email = "rasmus@webmodelling.com";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers.= "Content-Type: text/html; charset=tis-620"."\r\n"; 
$headers .= "From: rasmus@fdintranet.com \r\n";
									
$subject = "ss3";
$message = 'bb3';


mail($email,$subject,$message,$headers);
echo "<br />send complete";
?>