<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trading Hub - Submit</title>
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

	<h1>Submit an Item for Sale</h1>

	<?php
		//declare variables
		$varEmail = $varPassword = $varTitle = $varDescription = $varQuantity = $varPrice = $varBarter = "";
		$emailErr = $passowrdErr = $titleErr = $descriptionErr = $quantityErr = $priceErr = "";
	?>	

	<form action="submitAction.php" method="post" enctype="multipart/form-data"> <!--<?php /*echo htmlspecialchars($_SERVER["PHP_SELF"]);*/?>-->
		<p class="error">* Required field</p>
		<fieldset>
			<legend><b>Your Info:</b></legend>
			Email Address:<br>
			<span class="formSmallText">Pretty self-explanatory.</span><br>
			<input type="text" name="email" value="">
			<span class="error">* <?php echo $emailErr;?></span><br><br>
			Password:<br>
			<span class="formSmallText">No character requirements. Should be unique for every submission.</span><br>
			<input type="text" name="password" value="">
			<span class="error">* <?php echo $passowrdErr;?></span>
		</fieldset>
		<br>
		<fieldset>
			<legend><b>Item Info:</b></legend>
			Item Title:<br>
			<span class="formSmallText">Be descriptive but brief.</span><br>
			<input type="text" name="title" value="" maxlength="30">
			<span class="error">* <?php echo $titleErr;?></span><br><br>
			Item Description:<br>
			<span class="formSmallText">Be sure to accurately describe your item. Include details like wear and dimensions.</span><br>
<!--			<input type="text" name="itemDesc" size="90" class="formInputDesc"> -->
			<textarea type="text" name="description" cols="40" rows="5" value="" maxlength="2000" class="formInputDesc"></textarea>
			<span class="error">* <?php echo $descriptionErr;?></span><br><br>
			Item Quantity:<br>
			<span class="formSmallText">Put the number of identical items you have to sell.</span><br>
			<input type="text" name="quantity" value="">
			<span class="error">* <?php echo $quantityErr;?></span><br><br>
			Listing Price:<br>
			<span class="formSmallText">Keep it reasonable. Don't put in the dollar sign.</span><br>
			<input type="text" name="price" value="">
			<span class="error">* <?php echo $priceErr;?></span><br><br>
			Barterable Price:<br>
			<span class="formSmallText">Are you willing to barter with the buyer?</span><br>
			<input type="radio" name="barter" value="Unspecified" checked>Unspecified<br>
			<input type="radio" name="barter" value="Yes">Yes<br>
			<input type="radio" name="barter" value="No">No<br>
			<!--<s>Tags:</s><br>
			<span class="formSmallText">Seperate tags with commas ( , ).</a></span><br>
			<input type="text" name="tag" value="">-->
		</fieldset>
		<br>
		<fieldset>
			<legend><b>Images:</b> </legend>
			Images are not <i>required</i> but are recommended.<br>
			Only files in .png, .jpg, and .gif formats. Under 3mb.<br><br>
			Image #1:<br>
			<span class="formSmallText">Will be used as picture on Browse page and shown on the item's page.</span><br>
			<input type="file" name="itemImage1" id="itemImage1"><br><br>
			Image #2:<br>
			<span class="formSmallText">Shown on the item's page.</span><br>
			<input type="file" name="itemImage2" id="itemImage2" ><br><br>
			Image #3:<br>
			<span class="formSmallText">Shown on the item's page.</span><br>
			<input type="file" name="itemImage3" id="itemImage3">
		</fieldset>
		<br>
		By submitting an item to this network, you are agreeing to our <a href="Disclaimer.html">Terms and Conditions</a>.
		<br>
		<input type="submit" value="Submit" name="formSubmit" id="formSubmitButton">
	</form>
</body>
<script>

</script>
</html>