<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trading Hub - {{TITLE OF ITEM}}</title>
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
			<h1 id="itemPageTitleFormat"><?php echo $_POST["title"]; ?></h1>
		</div>
		
		<img src="NoImage.png" class="itemPageImageSize" id="itemPageImageId"></img>
		<br>
		<button type="button" id="itemPageImage1Button">Image 1</button>
		<button type="button" id="itemPageImage2Button">Image 2</button>
		<button type="button" id="itemPageImage3Button">Image 3</button>
		
		<div class="itemPageDescWrap">
			<p>{{ITEM DESCRIPTION}} {{ITEM DESCRIPTION}} {{ITEM DESCRIPTION}} {{ITEM DESCRIPTION}} {{ITEM DESCRIPTION}} {{ITEM DESCRIPTION}}</p>
		</div>

	</div>
<!-- Left Bar End -->

<!-- Right Bar Start -->
	<div class="itemPageBackground" id="itemPageBackgroundRight">

		<h2 id="itemPageListingPriceFormat">${{Listing Price}}</h2>

		<h4>Item Quantity: {{Item Quantity}}</h4>

		<h4>Price Barterable: {{Barterable Price}}</h4>

		<button type="button" class="itemPageContactButton" id="itemPageContactButtonFormat">Contact Seller</button>

	</div>
<!-- Right Bar End -->
</body>
<script src="Master Files/jquery-2.1.4.min.js"></script>
<script>
	//Variables Start
	var image1Link = "{{Image 1 SRC}}"; // If the base state ( {{Image 1 SRC}} ) changes then the IF statements below have to change to match
	var image2Link = "{{Image 2 SRC}}"; // See above comment
	var image3Link = "{{Image 3 SRC}}"; // See above comment
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
		alert("Contact Seller at:\n{{Seller Email}}");
	});
	//Contact Seller Button End

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