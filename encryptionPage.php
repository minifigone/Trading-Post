<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>The Trading Post - Encryption</title>
	<link rel="icon" type="image/png" href="Favicon.png">
	<link rel="stylesheet" href="MainStyle.css">
	<link rel="stylesheet" href="Master Files/colorScheme.css">
</head>
<body>
	<!-- Tool Bar on Every Page -->
	<?php
	include("toolBar.php"); 
	?>
	
	<!-- Main Page Text -->
	<div>
		<h1>Encryption Services</h1>
		<p>We offer Encryption Services for free on this site. Here you can submit a file and a password which will then be encrypted and delived back
		to you.</p>
	</div>
	
	<!-- Encryption Form -->
	<div>
		<form action="submitAction.php" method="post" enctype="multipart/form-data">
			<fieldset>
				
				Only .txt and .rtf files are accepted for encryption.<br>
				Only .crypt files are accepted for decryption.<br><br>
				However, V2 will support all file types!<br><br>
				Your File:<br>
				<span class="formSmallText">The file to be encrypted/decrypted.</span><br>
				<input type="file" name="file" id="itemImage1"><br><br>
				
				Your Password:<br>
				<span class="formSmallText">Use any ASCII characters. Password will also be used to encode/decrypt the file.</span><br>
				<input type="text" name="filePassword" value=""><br><br>
				
				Choose Action:<br>
				<span class="formSmallText">Do you want to encrypt or decrypt the file?<span><br>
				<input type="radio" name="isEncrypt" value="y">Encrypt<br>
				<input type="radio" name="isEncrypt" value="n">Decrypt<br><br>
				
				<input type="submit" value="Submit" name="encryptSubmit" id="formSubmitButton">
			</fieldset>
		</form>
	</div>
	
	<br>
	<!-- Output Spot -->
	<div>
		<h4>Your Output</h4>
		<a href="#" download><button type="button">Download Output</button></a>
	</div>
	
</body>
<script>
	console.log("What are you doing in here little bird?");
	console.log("Your infraction has been logged.");
	//TODO: Log IPs that open the Inspector or equivilant.
</script>
</html>