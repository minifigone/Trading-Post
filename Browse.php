<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>The Trading Post - Browse</title>
	<link rel="icon" type="image/png" href="Favicon.png">
	<link rel="stylesheet" href="MainStyle.css">
</head>
<body>
	<!-- Tool Bar on Every Page -->
	<?php
	include("toolBar.php"); 
	?>
	
	<div>
	<h3 class="listingHeader">All Listings:</h3><br>
	<!-- Search Form -->
	<form id="searchForm" action="search.php" method="get">
		<input type="text" name="searchTerm">
		<input type="submit" value="Search">
	</form>
	</div><br><br>
	
	<!-- Submitted Item List, Dynamic -->
	<ul class="itemListMainList">
		<?php
			//connect to mysql server
			include("tpapi/tpapiGetServerInfo.php");

			$_dbAddress = $_CFG_ADDRESS;
			$_dbUser = $_CFG_USER;
			$_dbPasskey =$_CFG_PASSKEY;
			$_dbSchema = $_CFG_SCHEMA;

			$db = mysqli_connect($_dbAddress, $_dbUser, $_dbPasskey, $_dbSchema);

			//$db = mysqli_connect("127.0.0.1:3306", "client", "clientinsert", "items_site_data");
			if(!$db) {
				echo "Error connecting to database " . PHP_EOL;
				//echo "Thing 1 " . mysqli_connect_errno() . PHP_EOL;
				//echo "Thing 2 " . mysqli_connect_error() . PHP_EOL;
				exit;
			}
			
			//get stuff
			$sql = "SELECT * FROM items";
			$result = $db->query($sql);
			
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					
					$index = $row["iditems"];
					$title = $row["title"];
					$description = $row["description"];
					$shortDescription = "" . substr($description, 0, 75) . "...";
					$price = $row["price"];
					$image1path = $row["image1path"];
					
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
				echo "There's nothing to see";
			}
		?>
	<!--	<li>
			<ul class="itemListInternalList">
				<li><img src="NoImage.png" class="itemListImage"></li>
				<li><p class="itemListTitle">Title of Item</p></li>
				<li><p class="itemListDesc">Short Description</p></li>
				<li><p class="itemListPrice">$ --.--</p></li>
				<ul style="float:right; list-style-type:none;"> <!-- Floats button to right side 
					<li><a href="x" class="itemListInfo">More Info</a></li>
				</ul>
			</ul>
		</li>
		<li>
			<ul class="itemListInternalList">
				<li><img src="NoImage.png" class="itemListImage"></li>
				<li><p class="itemListTitle">Title of Item</p></li>
				<li><p class="itemListDesc">Short Description</p></li>
				<li><p class="itemListPrice">$ --.--</p></li>
				<ul style="float:right; list-style-type:none;"> <!-- Floats button to right side 
					<li><a href="x" class="itemListInfo">More Info</a></li>
				</ul>
			</ul>
		</li>
		<li>
			<ul class="itemListInternalList">
				<li><img src="NoImage.png" class="itemListImage"></li>
				<li><p class="itemListTitle">Title of Item</p></li>
				<li><p class="itemListDesc">Short Description</p></li>
				<li><p class="itemListPrice">$ --.--</p></li>
				<ul style="float:right; list-style-type:none;"> <!-- Floats button to right side 
					<li><a href="x" class="itemListInfo">More Info</a></li>
				</ul>
			</ul>
		</li> -->
	</ul>

</body>
<script src="Master Files/jquery-2.1.4.min.js"></script>
<script>

</script>
</html>

<!-- The List Item that should be added to list for each new offer with filled in data

<li>
	<ul class="itemListInternalList">
		<li><img src="NoImage.png" class="itemListImage"></li>
		<li><p class="itemListTitle">Title of Item</p></li>
		<li><p class="itemListDesc">Short Description</p></li>
		<li><p class="itemListPrice">$ --.--</p></li>
		<ul style="float:right; list-style-type:none;">
			<li><a href="x" class="itemListInfo">More Info</a></li>
		</ul>
	</ul>
</li>

-->
