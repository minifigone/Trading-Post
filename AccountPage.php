<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>The Trading Post - Home</title>
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
	
</body>
<script>
// Variables
isMsgOpen = false;

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
</script>
</html>