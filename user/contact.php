<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['userName']; // required
		$email_from = $_POST['userEmail']; // required
		$comments = $_POST['userMsg']; // required
		$email_to="gmail.com";
		$email_message .= "First Name: ".$name."\n";
		$email_message .= "Email: ".$email_from."\n";	 
		$email_message .= "Subject: ".$comments."\n";
		mail($email_to, "Enquiry", $email_message);  
?>
	<script>
	//alert('Your contact request form has been submitted thankyou!');
	//window.location = "../";
	</script>
	   
<?php     
	} 
?>