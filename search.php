<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<title>Trading Hub - Search</title>
	<link rel="icon" type="image/png" href="Favicon.png">
	<link rel="stylesheet" href="MainStyle.css">
</head>
<body>
	<!-- Tool Bar on Every Page -->
	<?php
	include("toolBar.php"); 
	?>
	
	<?php
		if (isset($_GET['searchTerm'])) {
				$searchTerm = $_GET['searchTerm'];
			}
			echo "<div><h3 class=\"listingHeader\">Results For: \"" . $searchTerm . "\"</h3><br>";
	?>
	<!-- Search Form -->
	<form id="searchForm" action="search.php" method="get">
		<input type="text" name="searchTerm">
		<input type="submit" value="Search">
	</form>
	</div><br><br><br>
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
				$sql = "SELECT * FROM items WHERE title LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'";
				$result = $db->query($sql);
				
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						//getting the information and putting it into variables
						$index = $row["iditems"];
						$title = $row["title"];
						$description = $row["description"];
						$shortDescription = "" . substr($description, 0, 75) . "...";
						$price = $row["price"];
						$image1path = $row["image1path"];
						//get anything else before this comment
						
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
					}
				} else {
					echo "No Results.";
				}
	?>
</body>
</html>