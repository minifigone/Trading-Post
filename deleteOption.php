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
	<!-- Tool Bar on Every Page -->
	<?php
	include("toolBar.php"); 
	?>
	<form action="deleteAction.php" method="post">
		<input type="hidden" name="index" value="<?php echo $index; ?>">
		<input type="hidden" name="password" value="<?php echo $password; ?>">
		<input type="submit" name="delete" value="Delete?">
	</form>
</body>
</html>