<?php
	if (isset($_POST['email'])){
		// POST variables
		$email = $_POST['email'];

		require(dirname(__FILE__) . "/phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();

		$mail->IsSMTP(); // set mailer to use SMTP
		$mail->Host = "smtp.gmail.com";  // specify server
		$mail->Port = 587;
		$mail->SMTPSecure = "tls";
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = "user";  // SMTP username
		$mail->Password = "pw"; // SMTP password

		$mail->CharSet = 'UTF-8';

		$mail->From = "campaigns.iten@gmail.com";
		$mail->FromName = "iten";
		$mail->AddAddress("fabio.albuquerque@iten.pt");
                $mail->AddAddress("mssurfacehub@iten.pt");

		$mail->WordWrap = 50;  // set word wrap to 50 characters
		$mail->IsHTML(true);  // set email format to HTML

		$mail->Subject = "PDF Download Surface Hub lp1"; // Email subject
		// Email Body
		$mail->Body    = "<table>
												<tr><td>Email: </td><td>".$email."</td></tr>
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
