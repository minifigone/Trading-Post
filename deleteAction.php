<!DOCTYPE html>
<html>
<head>
	<?php
		$index = $_POST['index'];
		$password = $_POST['password'];
		
		//connect to mysql server
					$db = mysqli_connect("127.0.0.1:3306", "client", "clientinsert", "items_site_data");
					if(!$db) {
						echo "Error connecting to database " . PHP_EOL;
						//echo "Thing 1 " . mysqli_connect_errno() . PHP_EOL;
						//echo "Thing 2 " . mysqli_connect_error() . PHP_EOL;
						exit;
					}
					
					
					
	?>
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
		//first, get stuff and delete image files.
		$sql = "SELECT * FROM items WHERE iditems = $index";
		$result = $db->query($sql);
		
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				//getting the information and putting it into variables
				$image1path = $row["image1path"];
				$image2path = $row["image2path"];
				$image3path = $row["image3path"];
				//get anything else before this comment
			}
		} else {
			echo "Something went wrong.";
		}
		
		//delete the files
		if ($image1path != "NoImage.png") {
			unlink($image1path);
		}
		if ($image2path != "NoImage.png") {
			unlink($image2path);
		}
		if ($image3path != "NoImage.png") {
			unlink($image3path);
		}
		
		//delte the database entry
		$sql = "DELETE FROM items WHERE iditems = '$index' AND password = '$password'";
				//$result = $db->query($sql);
				
				if (mysqli_query($db, $sql)) {
					echo "Deletion successful. Redirecting in 5 seconds.";
					header('refresh: 5; url=Browse.php');
					
				} else {
					echo "Error: Redirecting in 5 seconds.";
					header('refresh: 5; url=Browse.php');
				}
	?>
</body>
</html>