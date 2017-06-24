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
	<ul class="toolBar">
	<li id="toolBarHead"><span id="toolBarHead_text">The Trading Post</span>
	<li class="toolBarItem"> <a href="index.php" class="toolBarText">Home</a>
	<li class="toolBarItem"> <a href="Browse.php" class="toolBarText">Browse</a>
	<li class="toolBarItem"> <a href="Submit.php" class="toolBarText">Submit</a>
	<li class="toolBarItem"> <a href="Disclaimer.php" class="toolBarText">Disclaimer</a>
	<li class="toolBarItem_Right"> <a href="AccountPage.php" class="toolBarText">My Account</a>
	</ul>
	
	<!-- Page Main -->		
	<!-- Left Bar Start -->
	<div class="accountPageBackground">
		<!-- User Info Block -->
		<h4 id="accountPageWelcome">Welcome back,</h4>
		<h1 id="accountPageTitleFormat" class="accountPageTitleWrap">GENERIC_USERNAME</h1>
		<p>You have <span class="accountPageHighlightNum">NUMBER</span> active products currently.</p>
		<p>There are <span class="accountPageHighlightNum">NUMBER</span> messages in your Inbox.</p>
		<p>You are connected to node <span class="accountPageHighlightNum">IP_ADDRESS</span>.</p>
		<p>You are computer <span class="accountPageHighlightNum">IP_ADDRESS</span> on our network.</p>
		<!-- PHP MODE GO: <p>You are computer <span class="accountPageHighlightNum"><?PHP echo $_SERVER['REMOTE_ADDR']; ?></span>.</p> -->
		
		<br>
		<!-- User Settings Block -->
		<h1 id="accountPageTitleFormat" class="accountPageTitleWrap">User Settings</h1>
		
	</div>
<!-- Left Bar End -->

<!-- Right Bar Start -->
	<div class="accountPageBackground" id="accountPageBackgroundRight">

		<h4>Item Quantity: <?php echo $quantity; ?></h4>

		<h4>Is the lister willing to to barter? <?php echo $barter; ?></h4>
		

	</div>
	
</body>
<script>
</script>
</html>