<?php
require('resources/PHPMailer/PHPMailerAutoload.php');
define ('MAIL_HOST' ,'smtp.gmail.com');
define ('MAIL_SMTP_AUTH' ,true);
define ('MAIL_USERNAME' ,'youremail@gmail.com');
define ('MAIL_PASSWORD' ,'passwordhere');
define ('MAIL_SMTP_SECURE' ,'ssl');
define ('MAIL_PORT' ,465);

$mail = new PHPMailer;
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        // 3 = verbose debug output
        $mail->SMTPDebug = 0;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = MAIL_HOST;  // Specify main and backup SMTP servers
        $mail->SMTPAuth = MAIL_SMTP_AUTH;                               // Enable SMTP authentication
        $mail->Username = MAIL_USERNAME;                 // SMTP username
        $mail->Password = MAIL_PASSWORD;                           // SMTP password
        $mail->SMTPSecure = MAIL_SMTP_SECURE;                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = MAIL_PORT;                                    // TCP port to connect to
        $mail->setFrom('youremail@gmail.com', 'your name');
        $mail->addAddress("sendTo@gmail.com", "Recipient email");     // Add a recipient
        $mail->addReplyTo("youremai@gmail.com", 'your name');
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Page was updated";
	$myfile = fopen("/home/ubuntu/diff/diff", "r") or die("Unable to open file!");
        $mail->Body    = "This is an auto-generated email <br>Following is the diff generated by the shell script running on a cron job.:<br>".htmlspecialchars(fread($myfile,filesize("/home/ubuntu/diff/diff")));
        $altBody = htmlspecialchars(fread($myfile,filesize("/home/ubuntu/diff/diff")));
        $mail->AltBody = $altBody;
        $mail->send();
