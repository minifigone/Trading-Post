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
	<div id="mainPageContent">
		<div class="itemPageBackground">
		<h1>Welcome back to The Trading Post!</h1>
		<p id="mainPagePara">
		Here you can feel free to sell whatever you wish, for whatever the price! We exist off the internet and completely disconnected with
		the outside world all for your security of course; and ours for that matter. Be sure to check out the recently listed items below.<br><br>
		
		If you're new here, then this is how you can get started using The Trading Post:<br>
		1. You can create an account by clicking the button above. This is your key to the shop!<br>
		2. Your account can then be used at any Trading Post Hotspot. But, remember, you have to be connected to view log-in and view this site!<br>
		3. Once you've made an account, you can list items for sale or interact with sellers at any time!<br>
		4.If you're interested in a product, you can send the seller a personal message all within The Trading Post. This maximizes security and lets you ensure
			your buyer or seller is for real!<br>
		5. Once you've made an agreement, just meet up, exchange your goods, and be on your way. Easy as pie!
		</p>
		</div>
	</div>
	<div>
		<br><h3>Recently Listed:</h3>
		<ul class="itemListMainList">
		<?php
			//connect to mysql server
			$db = mysqli_connect("127.0.0.1:3306", "client", "clientinsert", "items_site_data");
			if(!$db) {
				echo "Error connecting to database " . PHP_EOL;
				//echo "Thing 1 " . mysqli_connect_errno() . PHP_EOL;
				//echo "Thing 2 " . mysqli_connect_error() . PHP_EOL;
				exit;
			}
			
			//get stuff
			$sql = "SELECT * FROM items ORDER BY iditems DESC LIMIT 3";
			$result = $db->query($sql);
			
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					
					$index = $row["iditems"];
					$title = $row["title"];
					$description = $row["description"];
					$shortDescription = "" . substr($description, 0, 75) . "...";
					$price = $row["price"];
					$image1path = $row["image1path"];
					
					//while(mysqli_num_rows($result) > mysqli_num_rows($result) - 3) {
						echo "<li>";
						echo "<ul class=\"itemListInternalList\">";
						echo "<li><img src=\"" . $image1path . "\" class=\"itemListImage\"></li>";
						echo "<li><p class=\"itemListTitle\">" . $title . "</p></li>";
						echo "<li><p class=\"itemListDesc\">" . $shortDescription . "</p></li>";
						echo "<li><p class=\"itemListPrice\">$" . $price . "</p></li>";
						echo "<ul style=\"float:right; list-style-type:none;\">";
						echo "<li><a href=\"browseAction.php?index=$index\" class=\"itemListInfo\">More Info</a></li>";
						echo "</ul>";
						echo "</ul>";
						echo "</li>";
					//}
				}
			} else {
				echo "There's nothing to see";
			}
		?>
		</ul>
	</div>
</body>
<script>
	console.log("Built by Tom Castle. Promoted by Brody Childs.");
</script>
</html>