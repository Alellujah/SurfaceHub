<?php
	if (!empty($_POST['name']) && !empty($_POST['email'])){
		// POST variables
		$name = $_POST['name'];
		$email = $_POST['email'];
		$company = $_POST['company'];
		//$message = $_POST['message'];

		require(dirname(__FILE__) . "/phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();

		$mail->IsSMTP(); // set mailer to use SMTP
		$mail->Host = "smtp.office365.com";  // specify server
		$mail->Port = 587;
		$mail->SMTPSecure = "tls";
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = "user";  // SMTP username
		$mail->Password = "pw"; // SMTP password

		$mail->CharSet = 'UTF-8';

		$mail->From = "noreply@iten.pt";
		$mail->FromName = "iten";
		$mail->AddAddress("mssurfacehub@iten.pt");
		$mail->AddAddress("fabio.albuquerque@iten.pt");

		$mail->WordWrap = 50;  // set word wrap to 50 characters
		$mail->IsHTML(true);  // set email format to HTML

		$mail->Subject = "Contacto Surface Hub"; // Email subject
		// Email Body
		$mail->Body    = "<table>
							<tr><td>Name: </td><td>".$name."</td></tr>
							<tr><td>Email: </td><td>".$email."</td></tr>
							<tr><td>Tel: </td><td>".$company."</td></tr>
						</table>";

		if(!$mail->Send()) // check if mail is sent
		{
		   echo "Message could not be sent. <p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}
		echo "Message has been sent";
	}
?>
