<?php
// require_once 'mailerClass/class.php';
 require_once 'mailerClass/PHPMailerAutoload.php';
  /*-----------------------------------------------------------------------------*/
include('par.php');
/*insertion des données */

$name=$_POST["name_for"];
$mail=$_POST["email_for"];
##################################################
$x=0;

$stmt = $bdd->query('SELECT *FROM user');
while($message = $stmt->fetch())
{
	// Utilisation des données.
	if(($mail== $message[4])&&($name==$message[1])){
		//echo "egale.<br>";
		$x=1;
		//
		$pass=$message[5];
	}
}
if($x==0){
           echo '<div style="float:left; margin-left:34%; margin-top:0%;" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Attention!</strong> Votre nom ou email n est pas correct !!.
</div>
';
}

elseif ($x==1) {



  /*-----------------------------------------------------------------------------*/
 $mail = new PHPMailer;
 
 //Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
	
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "amzilyoussef98@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "youssef+1998";

//Set who the message is to be sent from
$mail->setFrom('donotreply@email.com', 'oftaox');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('youssefamzil0@gmail.com', 'oftaox');

//Set the subject line
$mail->Subject = 'Php Mail Check';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$mail->Body = " Password is : ".$pass;//contenu de message###################

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->isHTML(true);  
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
           echo '<div style="float:left; margin-left:30%; margin-top:0%;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>!</strong> Votre mot de passe est bien envoyé !!.
</div>
';
}
###############################################################//fin d'envoyer l'email



?>