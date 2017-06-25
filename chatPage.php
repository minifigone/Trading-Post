<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>The Trading Post - Chat</title>
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
	<div class="chatPageBackground">
		<h2 class="chatPageInboxHeader">Chat with GENERIC_USER_OTHER</h2>
	
		<!-- Messages List -->
		<div id="chatPageMessageContainer" class="chatPageContainer">
			<!-- List of Previous Messages -->
			<ul class="chatPageMessageList">
			
				<!-- List Item Start -->
				<li class="chatPageListItem">
					<div class="chatPageContainer" id="chatPageMessageContainer_Sent">
						<p id="chatPageMessageUsername">GENERIC_USER_OTHER</p>
						<p id="chatPageMessageText">This is an example of a message to the person who owns the inbox.</p>
					</div>
				</li>
				<!-- List Item End -->
				
				<!-- List Item Start -->
				<li class="chatPageListItem">
					<div class="chatPageContainer" id="chatPageMessageContainer_Given">
						<p id="chatPageMessageUsername">GENERIC_USER_OWNER</p>
						<p id="chatPageMessageText">This is an example of a message from the person who owns the inbox.</p>
					</div>
				</li>
				<!-- List Item End -->
				
			</ul>
		</div>
	
		<!-- New Message "Form" -->
		<div class="chatPageContainer">
			<form action="#" method="post" enctype="multipart/form-data"> <!-- CHANGE # TO PHP ACTION -->
				<input type="text" name="newMessage" value="" id="chatPageNewMessageInput">
				<!--<span class="error">* <?php echo $emailErr;?></span><br><br>-->
				
				<input type="submit" value="Submit" name="formSubmit"> <!-- CHANGE TO PHP ACTION PARAMS -->
			</form>
		</div>
	</div>
	<!-- Left Bar End -->
	
</body>
<script>
</script>
</html>