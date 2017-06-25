<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>The Trading Post - Reset Password</title>
	<link rel="icon" type="image/png" href="Favicon.png">
	<link rel="stylesheet" href="MainStyle.css">
	<link rel="stylesheet" href="Master Files/colorScheme.css">
</head>
<body>
	<!-- Tool Bar on Every Page -->
	<?php
	include("toolBar.php"); 
	?>
	
	<!-- Page Main -->		
	<!-- Left Bar Start -->
	<div class="accountPageBackground">
		<form action="#" method="post" enctype="multipart/form-data"> <!-- CHANGE # TO PHP ACTION -->
			<p class="error">* Required field</p>
			<fieldset>
				<legend><b>Reset your password:</b></legend>
				Old Password:<br>
				<span class="formSmallText">Your current password.</span><br>
				<input type="text" name="email" value="">
				<span class="error">* <?php echo $emailErr;?></span><br><br> <!-- CHANGE ERROR PHP -->
				New Password:<br>
				<span class="formSmallText">The password you want to change. No character requirements.</span><br>
				<input type="text" name="password" value="">
				<span class="error">* <?php echo $passowrdErr;?></span> <!-- CHANGE ERROR PHP -->
			</fieldset>
			<input type="submit" value="Submit" name="formSubmit" id="formSubmitButton"> <!-- CHANGE TO PHP ACTION PARAMS -->
		</form>
		
		<!-- End -->
		<p class="endSpacerGeneric"></p>
	</div>
<!-- Left Bar End -->
	
</body>
<script>
</script>
</html>