<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trading Hub - Home</title>
	<link rel="icon" type="image/png" href="Favicon.png">
	<link rel="stylesheet" href="MainStyle.css">
</head>
<body>
	<!-- Tool Bar on Every Page -->
	<ul class="toolBar">
		<li id="toolBarHead">Trading Hub
		<li class="toolBarItem"> <a href="index.php" class="toolBarText">Home</a>
		<li class="toolBarItem"> <a href="Browse.php" class="toolBarText">Browse</a>
		<li class="toolBarItem"> <a href="Submit.php" class="toolBarText">Submit</a>
		<li class="toolBarItem"> <a href="Disclaimer.html" class="toolBarText">Disclaimer</a>
	</ul>
	<div id="mainPageContent">
		<div class="itemPageBackground">
		<h1>Are you trying to sell your stuff at [CLEVER NAME]?</h1>
		<p id="mainPagePara">Then you've come to the right place!<br><br>Here at <i>Trading Post</i> we help you connect with others and allows all 
			to connect on a convenient network. Here you can post your items, their prices, and even their pictures. It also makes it easy for others 
			to contact you if they're interested.<br><br><i>The best part?</i> The service is entirely <b>free</b> and leaves the physical transfer of 
			assets up to user discretion.</p>
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