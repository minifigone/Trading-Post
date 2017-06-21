<!DOCTYPE html>
<html>
<head>
	<?php
		if (isset($_GET['index'])) {
				$index = $_GET['index'];
				$password = $_GET['password'];
			}
			//echo $index;
			
			//connect to mysql server
				$db = mysqli_connect("127.0.0.1:3306", "client", "clientinsert", "items_site_data");
				if(!$db) {
					echo "Error connecting to database " . PHP_EOL;
					//echo "Thing 1 " . mysqli_connect_errno() . PHP_EOL;
					//echo "Thing 2 " . mysqli_connect_error() . PHP_EOL;
					exit;
				}
				
				//get stuff
				$sql = "SELECT * FROM items WHERE iditems = $index";
				$result = $db->query($sql);
		
				if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					//getting the information and putting it into variables
					$email = $row["email"];
					$password = $row["password"];
					$title = $row["title"];
					$description = $row["description"];
					$quantity = $row["quantity"];
					$price = $row["price"];
					$barter = $row["barter"];
					$image1path = $row["image1path"];
					$image2path = $row["image2path"];
					$image3path = $row["image3path"];
					//get anything else before this comment
				}
			} else {
				echo "Something went wrong.";
			}
	?>
	<meta charset="utf-8">
	<title>Trading Post - <?php echo $title; ?></title>
	<link rel="icon" type="image/png" href="Favicon.png">
	<link rel="stylesheet" href="MainStyle.css">
</head>
<body>
	<ul class="toolBar">
		<li id="toolBarHead">Trading Hub
		<li class="toolBarItem"> <a href="index.php" class="toolBarText">Home</a>
		<li class="toolBarItem"> <a href="Browse.php" class="toolBarText">Browse</a>
		<li class="toolBarItem"> <a href="Submit.php" class="toolBarText">Submit</a>
		<li class="toolBarItem"> <a href="Disclaimer.html" class="toolBarText">Disclaimer</a>
	</ul>
	<form action="deleteAction.php" method="post">
		<input type="hidden" name="index" value="<?php echo $index; ?>">
		<input type="hidden" name="password" value="<?php echo $password; ?>">
		<input type="submit" name="delete" value="Delete?">
	</form>
</body>
</html>