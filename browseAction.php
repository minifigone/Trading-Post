<!DOCTYPE html>
<html>
<head>
	<?php
		if (isset($_GET['index'])) {
			$index = $_GET['index'];
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
	<title>Trading Hub - <?php echo $title; ?></title>
	<link rel="icon" type="image/png" href="Favicon.png">
	<link rel="stylesheet" href="MainStyle.css">
</head>
<body>
	<!-- Tool Bar on Every Page -->
	<?php
	include("toolBar.php"); 
	?>
	
<!-- Left Bar Start -->
	<div class="itemPageBackground">

		<div class="itemPageTitleWrap">
			<h1 id="itemPageTitleFormat"><?php echo $title; ?></h1>
		</div>
		
		<img src="<?php echo $image1path; ?>" class="itemPageImageSize" id="itemPageImageId"></img>
		<br>
		<button type="button" id="itemPageImage1Button">Image 1</button>
		<button type="button" id="itemPageImage2Button">Image 2</button>
		<button type="button" id="itemPageImage3Button">Image 3</button>
		
		<div class="itemPageDescWrap">
			<p><?php echo $description; ?></p>
		</div>

	</div>
<!-- Left Bar End -->

<!-- Right Bar Start -->
	<div class="itemPageBackground" id="itemPageBackgroundRight">

		<h2 id="itemPageListingPriceFormat">$<?php echo $price; ?></h2>

		<h4>Item Quantity: <?php echo $quantity; ?></h4>

		<h4>Is the lister willing to to barter? <?php echo $barter; ?></h4>

		<button type="button" class="itemPageContactButton" id="itemPageContactButtonFormat">Contact Seller</button><br>
		<button type="button" id="itemOwnerTool">Lister Tools</button>
		
		

	</div>
<!-- Right Bar End -->
</body>
<script src="Master Files/jquery-2.1.4.min.js"></script>
<script src="Master Files/jquery-ui.js"></script>
<script>
	//Variables Start
	var image1Link = "<?php echo $image1path; ?>"; // If the base state ( {{Image 1 SRC}} ) changes then the IF statements below have to change to match
	var image2Link = "<?php echo $image2path; ?>"; // See above comment
	var image3Link = "<?php echo $image3path; ?>"; // See above comment
	//Variables End

	// On Load Start
	$(document).ready(function() {
		console.log("Page loaded, Setting up images");

		if (image1Link === "{{Image 1 SRC}}") {
			$("#itemPageImageId").attr("src", "NoImage.png")
		} else {
			$("#itemPageImageId").attr("src", image1Link)
		};

		console.log("Images set up");
	});
	// On Load End

	//Contact Seller Button Start
	$(".itemPageContactButton").on("click", function() {
		console.log("Contact Button Clicked");
		alert("Contact Seller at:\n<?php echo $email; ?>");
	});
	//Contact Seller Button End

	//owner tool button
	$ownerPass = "<?php echo $password; ?>";
	console.log($ownerPass);
	$("#itemOwnerTool").on("click", function() {
		$passwordIn = prompt("Enter password.", "");
		if ($passwordIn != null){
			if ($passwordIn != $ownerPass) {
				alert("Incorrect password.");
			} else {
				//go to another page
				window.location.href = 'deleteOption.php?index=<?php echo $index; ?>&password=<?php echo $password; ?>';
			}
		}
	});
	
	//Image Switch Buttons Start
	$("#itemPageImage1Button").on("click", function() {
		console.log("Image 1 Button Clicked");
		
		if (image1Link === "{{Image 1 SRC}}") {
			$("#itemPageImageId").attr("src", "NoImage.png")
		} else {
			$("#itemPageImageId").attr("src", image1Link)
		};
	});

	$("#itemPageImage2Button").on("click", function() {
		console.log("Image 2 Button Clicked");

		if (image2Link === "{{Image 2 SRC}}") {
			$("#itemPageImageId").attr("src", "NoImage.png")
		} else {
			$("#itemPageImageId").attr("src", image2Link)
		};
	});
	
	$("#itemPageImage3Button").on("click", function() {
		console.log("Image 3 Button Clicked");

		if (image3Link === "{{Image 3 SRC}}") {
			$("#itemPageImageId").attr("src", "NoImage.png")
		} else {
			$("#itemPageImageId").attr("src", image3Link)
		};
	});
	//Image Switch Buttons End
</script>
</html>