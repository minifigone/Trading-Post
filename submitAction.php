<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trading Hub - Search</title>
	<link rel="icon" type="image/png" href="Favicon.png">
	<link rel="stylesheet" href="MainStyle.css">
	<?php
	
		//connect to mysql server
		$db = mysqli_connect("127.0.0.1:3306", "client", "clientinsert", "items_site_data");
		if(!$db) {
			echo "Error connecting to database " . PHP_EOL;
			//echo "Thing 1 " . mysqli_connect_errno() . PHP_EOL;
			//echo "Thing 2 " . mysqli_connect_error() . PHP_EOL;
			exit;
		}
		
		//echo "Connected to database " . PHP_EOL;
		
		//function for validation prevent sql injection and such
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			//$data = mysql_real_escape_string($data);
			return $data;
		}
		
		//redeclare variables because idk how php works //nvm i think i figured it out
		//$varEmail = $varPassword = $varTitle = $varDescription = $varQuantity = $varPrice = $varBarter = "";
		//$emailErr = $passowrdErr = $titleErr = $descriptionErr = $quantityErr = $priceErr = "";
		
		//getting the data from the form
		
		//if($_POST['formSubmit'] == 'Submit'){
			
			$varEmail = $_POST['email'];
			$varPassword = $_POST['password'];
			$varTitle = $_POST['title'];
			$varDescription = $_POST['description'];
			$varQuantity = $_POST['quantity'];
			$varPrice = $_POST['price'];
			$varBarter = $_POST['barter'];
			
			
			//validation of each part
			if(empty($varEmail)){
				$emailErr = "Email is required";
			} else {
				$varEmail = test_input($varEmail);
				if (!filter_var($varEmail, FILTER_VALIDATE_EMAIL)){
					$emailErr = "Not an email";
				}
			}
			if(empty($varPassword)){
				$passowrdErr = "Password is required";
			} else {
				$varPassword = test_input($varPassword);
				if (!preg_match("[-a-z0-9+&@#\/%?=~_|!:,.;]", $varPassword)) {
					$passowrdErr = "Some character in there isn't allowed";
				}
			}
			if(empty($varTitle)){
				$titleErr = "Title is required";
			} else {
				$varTitle = test_input($varTitle);
				if (!preg_match("[-a-z0-9+&@#\/%?=~_|!:,.;]", $varTitle)) {
					$titleErr = "Some character in there isn't allowed";
				}
			}
			if(empty($varDescription)){
				$descriptionErr = "A description is required";
			} else {
				$varDescription = test_input($varDescription);
				if (!preg_match("[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $varDescription)) {
					$descriptionErr = "Some character in there isn't allowed";
				}
			}
			if(empty($varQuantity)){
				$quantityErr = "A quantity is required";
			} else {
				$varQuantity = test_input($varQuantity);
				if (!preg_match("[0-9]", $varQuantity)) {
					$quantityErr = "Some character in there isn't allowed";
				}
			}
			if(empty($varPrice)){
				$priceErr = "A price is required. It can be 0";
			} else {
				$varPrice = test_input($varPrice);
				if (!preg_match("[0-9]", $varPrice)) {
					$priceErr = "Some character in there isn't allowed";
				}
			}
		/*}*/
		
		//image uploads
		//should probably be a function for this but time
		$image1path = "NoImage.png";
		$image2path = "NoImage.png";
		$image3path = "NoImage.png";
		
		$target_dir = "uploaded_images/";
		
		/*function renameImage($imageName) {
			String[] alphabet = {"a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"};
			String letter = alphabet[rand(0, 25)];
			
		}*/
		
		//image 1
		$target_file1 = $target_dir . basename($_FILES["itemImage1"]["name"]);
		$uploadOk1 = 1;
		$imageFileType1 = pathinfo($target_file1, PATHINFO_EXTENSION);
		
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["itemImage1"]["tmp_name"]);
			if($check !== false) {
				//echo "File1 is an image - " . $check["mime"] . ".";
				$uploadOk1 = 1;
			} else {
				//echo "File1 is not an image.";
				$uploadOk1 = 0;
			}
		}
		
		if (file_exists($target_file1)) {
			$target_file1 = $target_dir . "c" . strval(rand(0,1000)) . basename($_FILES["itemImage1"]["name"]);
			//echo "renamed image";
			$uploadOK1 = 1;
		}
		
		if ($_FILES["itemImage1"]["size"] > 3000000) {
			//echo "Sorry, your file1 is too large.";
			$uploadOk1 = 0;
		}
		
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType1 != "GIF" && $imageFileType1 != "JPG" && $imageFileType1 != "JPEG" && $imageFileType1 != "PNG") {
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk1 = 0;
		}
		
		if ($uploadOk1 == 0) {
			//echo "Sorry, your file was not uploaded.";
			$image1path = "NoImage.png";
		} else {
			if (move_uploaded_file($_FILES["itemImage1"]["tmp_name"], $target_file1)) {
				//echo "The file ". basename( $_FILES["itemImage1"]["name"]). " has been uploaded.";
				$image1path = "$target_file1";
			} else {
				//echo "Sorry, there was an error uploading your file.";
				$image1path = "NoImage.png";
			}
		}
		
		//image 2
		$target_file2 = $target_dir . basename($_FILES["itemImage2"]["name"]);
		$uploadOk2 = 1;
		$imageFileType2 = pathinfo($target_file2, PATHINFO_EXTENSION);
		
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["itemImage2"]["tmp_name"]);
			if($check !== false) {
				//echo "File is an image - " . $check["mime"] . ".";
				$uploadOk2 = 1;
			} else {
				//echo "File is not an image.";
				$uploadOk2 = 0;
			}
		}
		
		if (file_exists($target_file2)) {
			$target_file2 = $target_dir . "c" . strval(rand(0,10000)) . basename($_FILES["itemImage2"]["name"]);
			//echo "renamed image";
			$uploadOK1 = 1;
		}
		
		if ($_FILES["itemImage2"]["size"] > 3000000) {
			//echo "Sorry, your file is too large.";
			$uploadOk2 = 0;
		}
		
		if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif" && $imageFileType2 != "GIF" && $imageFileType2 != "JPG" && $imageFileType2 != "JPEG" && $imageFileType2 != "PNG") {
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk2 = 0;
		}
		
		if ($uploadOk2 == 0) {
			//echo "Sorry, your file was not uploaded.";
			$image2path = "NoImage.png";
		} else {
			if (move_uploaded_file($_FILES["itemImage2"]["tmp_name"], $target_file2)) {
				//echo "The file ". basename( $_FILES["itemImage1"]["name"]). " has been uploaded.";
				$image2path = "$target_file2";
			} else {
				//echo "Sorry, there was an error uploading your file.";
				$image2path = "NoImage.png";
			}
		}
		
		//image 3
		$target_file3 = $target_dir . basename($_FILES["itemImage3"]["name"]);
		$uploadOk3 = 1;
		$imageFileType3 = pathinfo($target_file3, PATHINFO_EXTENSION);
		
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["itemImage3"]["tmp_name"]);
			if($check !== false) {
				//echo "File is an image - " . $check["mime"] . ".";
				$uploadOk3 = 1;
			} else {
				//echo "File is not an image.";
				$uploadOk3 = 0;
			}
		}
		
		if (file_exists($target_file3)) {
			$target_file3 = $target_dir . "c" . strval(rand(0,1000)) . basename($_FILES["itemImage3"]["name"]);
			//echo "renamed image";
			$uploadOK1 = 1;
		}
		
		if ($_FILES["itemImage3"]["size"] > 3000000) {
			//echo "Sorry, your file is too large.";
			$uploadOk3 = 0;
		}
		
		if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" && $imageFileType3 != "gif" && $imageFileType3 != "GIF" && $imageFileType3 != "JPG" && $imageFileType3 != "JPEG" && $imageFileType3 != "PNG") {
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk3 = 0;
		}
		
		if ($uploadOk3 == 0) {
			//echo "Sorry, your file was not uploaded.";
			$image3path = "NoImage.png";
		} else {
			if (move_uploaded_file($_FILES["itemImage3"]["tmp_name"], $target_file3)) {
				//echo "The file ". basename( $_FILES["itemImage1"]["name"]). " has been uploaded.";
				$image3path = "$target_file3";
			} else {
				//echo "Sorry, there was an error uploading your file.";
				$image3path = "NoImage.png";
			}
		}
		
		
	?>
</head>
<body>
	<!-- Tool Bar on Every Page -->
	<?php
	include("toolBar.php"); 
	?>
	
	<?php
		//put data into database
		$sql = "INSERT INTO items (email, password, title, description, quantity, price, barter, image1path, image2path, image3path) VALUES ('$varEmail', '$varPassword', '$varTitle', '$varDescription', '$varQuantity', '$varPrice', '$varBarter', '$image1path', '$image2path', '$image3path')";
				/*$varEmail . ", " . 
				$varPassword . ", " . 
				$varTitle . ", " . 
				$varDescription . ", " . 
				$varQuantity . ", " . 
				$varPrice . ")";*/
				
		if (mysqli_query($db, $sql)) {
			echo "Submission Successful. Redirecting in 5 seconds.";
			header('refresh: 5; url=Browse.php');
			
		} else {
			echo "Error: " . mysqli_error($db);
		}
	?>
</body>
</html>