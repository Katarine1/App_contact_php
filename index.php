<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>App Contact</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="body_center">
		<header class="header_center">
			<img src="img/contact.png" alt="Contact"/>
		</header>
		<section class="section_center">
			<form class="form_center" method="post" action="./index.php">
				<input type="text" name="name" placeholder="Name"/>
				<input type="email" name="email" placeholder="seuemail@email.com.br"/>
				<input type="text" name="subject" placeholder="Subject"/>
				<textarea name="message"></textarea>
				<input id="btn" type="submit" value="SEND"/>
				<!-- Code to send form. -->
				<?php					
					$field = 'Enter the required value (s)';
					
					if(isset($_POST['email']) && !empty($_POST['email']) ||
						isset($_POST['name']) && !empty($_POST['name']) ||
					isset($_POST['subject']) && !empty($_POST['subject']) ||
						isset($_POST['message']) && !empty($_POST['message'])
						) {

							$name = $_POST['name'];
							$email = $_POST['email'];
							$subject = $_POST['subject'];
							$message = $_POST['message'];

							//What the email is for
							$email_sender = "servidor@email.com"; //do domínio
							$email_adress = "any_email@email.com"; // que recebe
							$email_reply = "$email"; 
							$email_subject = "$subject";
							
							$email_content = "Name = $name \r\n"; 
	 						$email_content .= "Email = $email \r\n";
	 						$email_content .= "Subject = $subject \r\n";
	 						$email_content .= "Menssage: \r\n$message.\r\n"; 

							$email_headers = implode ( "\n",array ( "From: $email_sender", "Reply-To: $email_reply", "Return-Path: $email_sender","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
							
							$success = 'Email successfully sent!';
							$error = 'Error sending email!';							
							
							if (mail ($email_adress, $email_subject, nl2br($email_content), $email_headers) ){ ?>
								
								<div><p><?= $success; ?></p></div>	

							<?php } else { ?>	
							
								<div><p><?= $error; ?></p></div>
					<?php } } else {  ?>	

						<div><p><?= $field; ?></p></div>	
				<?php } ?>	

			</form>
		</section>
	</body>
</html>