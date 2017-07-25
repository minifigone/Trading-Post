<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>The Trading Post - Home</title>
	<link rel="icon" type="image/png" href="Favicon.png">
	<link rel="stylesheet" href="MainStyle.css">
	<link rel="stylesheet" href="Master Files/colorScheme.css">
	<script type="text/javascript" src="Master Files/jquery-2.1.4.min.js"></script>
</head>
<body>
	<!-- Tool Bar on Every Page -->
	<?php
	include("toolBar.php"); 
	?>

	<!-- Page Main, Logged In Start -->	
	<div id="loggedInHTMLChunk">	
		<!-- Left Bar Start -->
		<div class="accountPageBackground">
			<!-- User Info Block -->
			<h4 id="accountPageWelcome">Welcome back,</h4>
			<h1 id="accountPageTitleFormat" class="accountPageTitleWrap">GENERIC_USERNAME</h1>
			<p>You have <span class="accountPageHighlightNum">NUMBER</span> active products currently.</p>
			<p>There are <span class="accountPageHighlightNum">NUMBER</span> messages in your Inbox.</p>
			<p>You are connected to node <span class="accountPageHighlightNum">IP_ADDRESS</span>.</p>
			<!-- SHIT HTML MODE GO: <p>You are computer <span class="accountPageHighlightNum">IP_ADDRESS</span> on our network.</p> -->
			<p>You are computer <span class="accountPageHighlightNum"><?PHP echo $_SERVER['REMOTE_ADDR']; ?></span>.</p>
			
			<br>
			<!-- User Settings Block -->
			<h1 id="accountPageTitleFormat" class="accountPageTitleWrap">User Settings</h1>
			<ul class="accountPageButtonList">
				<li class="accountPageListButton"> <a href="resetPassword.php"><button type="button">Change Password</button></a>
				<li class="accountPageListButton"> <a href="#"><button type="button">Log Out</button></a>
				<li class="accountPageListButton"> <a href="#"><button type="button">Delete Account</button></a>
			</ul>

			<!-- End -->
			<p class="endSpacerGeneric"></p>
		</div>
	<!-- Left Bar End -->

	<!-- Right Bar Start -->
		<div class="accountPageBackground" id="accountPageBackgroundRight">
			<h1 id="accountPageTitleFormat" class="accountPageTitleWrap">Account Actions</h1>
			<ul class="accountPageButtonList">
				<li class="accountPageListButton"> <a href="#"><button type="button">Open Your Products</button></a> <!-- Opens search action with username as search param -->
				<li class="accountPageListButton"> <button id="accountPageShowMessagesButton" type="button" onclick="showMessagesHTML()">Open Inbox</button> <!-- Opens the Inbox below button -->
			</ul>
		</div>
		
	<!-- Messages Panel Start -->
		<div class="accountPageBackground" id="accountPageBackgroundRight_Inbox">
			<!-- Inbox -->
			<h1 id="accountPageTitleFormat" class="accountPageTitleWrap">Inbox</h1>
			<ul class="inboxListFormat"> <!-- Main list container -->
			
				<li><!-- Single Entry Start --> <!-- New Messages have OTHER_USER in BOLD text, Opened Messages have OTHER_USER in REGULAR text -->
					<a href="#" id="inboxListLink">
						<ul id="inboxListInternal">
							<li id="inboxListInternalListItem"><p style="font-weight:bold;" id="inboxListItem_user" class="inboxListItem_Left">OTHER_USER</p>
							<li id="inboxListInternalListItem"><p id="inboxListItem_text" class="inboxListItem_Right">TEXT_PREVIEW</p>
							<!--<li id="inboxListInternalListItem"><p id="inboxListItem" class="inboxListItem_Left">TIME_STAMP</p>
							<li id="inboxListInternalListItem"><p id="inboxListItem" class="inboxListItem_Right">IS_READ</p>-->
						</ul>
					</a>
				</li><!-- Single Entry End -->
				
				<li><!-- Single Entry Start --> <!-- New Messages have OTHER_USER in BOLD text, Opened Messages have OTHER_USER in REGULAR text -->
					<a href="#" id="inboxListLink">
						<ul id="inboxListInternal">
							<li id="inboxListInternalListItem"><p id="inboxListItem_user" class="inboxListItem_Left">OTHER_USER</p>
							<li id="inboxListInternalListItem"><p id="inboxListItem_text" class="inboxListItem_Right">TEXT_PREVIEW</p>
							<!--<li id="inboxListInternalListItem"><p id="inboxListItem" class="inboxListItem_Left">TIME_STAMP</p>
							<li id="inboxListInternalListItem"><p id="inboxListItem" class="inboxListItem_Right">IS_READ</p>-->
						</ul>
					</a>
				</li><!-- Single Entry End -->
				
			</ul>
			
			<!-- End -->
			<p class="endSpacerGeneric"></p>
		</div>
	</div>
	<!-- Page Main, Logged In End -->	

	<!-- Page Main, Not Logged In Start -->	
	<div id="notLoggedInHTMLChunk">
		<div class="accountPageBackground">
			<form action="#" method="post" enctype="multipart/form-data"> <!-- CHANGE # TO PHP ACTION -->
				<p class="error">* Required field</p>
				<fieldset>
					<legend><b>Create New Account:</b></legend>
					Username:<br>
					<span class="formSmallText">Choose your Username. If it's already used, you can't use it.</span><br>
					<input type="text" name="username" value="">
					<span class="error">* <?php echo $emailErr;?></span><br><br> <!-- CHANGE ERROR PHP -->
					New Password:<br>
					<span class="formSmallText">The password you want to change. No character requirements.</span><br>
					<input type="text" name="password" value="">
					<span class="error">* <?php echo $passowrdErr;?></span> <!-- CHANGE ERROR PHP -->
				</fieldset>
				<br>
				<button type="button" id="createNewAccountButton" onclick="submitNewUser();">Create Account</button>
				<!-- <input type="submit" value="Submit" name="formSubmit" id="formSubmitButton"> <!-- CHANGE TO PHP ACTION PARAMS -->
			</form>
			
			<!-- End -->
			<p class="endSpacerGeneric"></p>
		</div>
	</div>
	<!-- Page Main, Not Logged In End -->	
	
</body>
<script>
// Globals
var isLoggedIn = false; // Pull from PHP or some shit, Tom?

if(isLoggedIn) {
	/// If User is Logged Into An Account
	// Hide Other HTML
	//document.getElementById("notLoggedInHTMLChunk").style.visibility = "hidden";
	$("#notLoggedInHTMLChunk").hide();

	// Variables
	var isMsgOpen = false;

	// Hide intially
	document.getElementById("accountPageBackgroundRight_Inbox").style.visibility = "hidden";

	// Guess what this does
	function showMessagesHTML() {
		if (!isMsgOpen) {
			// Flop
			document.getElementById("accountPageShowMessagesButton").innerHTML = "Close Inbox";
			isMsgOpen = true;
			
			// Show
			document.getElementById("accountPageBackgroundRight_Inbox").style.visibility = "visible";
		} else {
			// Flop
			document.getElementById("accountPageShowMessagesButton").innerHTML = "Open Inbox";
			isMsgOpen = false;
			
			// Hide
			document.getElementById("accountPageBackgroundRight_Inbox").style.visibility = "hidden";
		}
	}
} else {
	/// If User is NOT Logged Into An Account
	// Hide Other HTML
	$("#loggedInHTMLChunk").hide();

	// Variables
	var sendButton = document.getElementById("createNewAccountButton");
	var apiLink = "tpapi";

	// Try and Create Account
	function submitNewUser() {
		console.log("New User Button Pressed");

		/*$.get(apiLink+"/tpapiCreateNewUser.php", function(data, status){
			var convertedData = JSON.stringify(JSON.parse(data));
			var dataArrayTemp = $.map(JSON.parse(data), function(el) { return el });

			console.log("Status: "+status);
			console.log("Data:")
			console.log(dataArrayTemp);
		}*/
	}
}

</script>
</html>