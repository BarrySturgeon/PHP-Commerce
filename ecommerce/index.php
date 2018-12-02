<!DOCTYPE> 
<?php 
	session_start();
	include("functions/functions.php");
?>

<html>
	<head>
		<title> My Online shop </title>
		<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
		<link rel="stylesheet" href="styles/style.css" media="all">	

		<!-- Depreciated fonts, each take an extra 330 ms to load if not commented out
		<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond" rel="stylesheet">
		-->

	</head>

	<body>
		

		<!--Main container starts-->

		<div class="main_wrapper">

			<!--Header starts here-->
			<div  class="header_wrapper">

				<a href="index.php"><img id="logo" src="images/new2.png"></a>

			</div>
			<!--Header ends here-->

			<!--Naivagation bar starts-->
			<div class="menubar" >


				<ul id="menu">
					<li><a href="index.php">Home</li>
					<li><a href="all_products.php">Products</li>
					<li><a href="customer/my_account.php">My Account</li>
					<li><a href="#">Sign Up</li>
					<li><a href="cart.php">Shopping Cart</li>
					<li><a href="#">Contact Us</li>
				</ul>
				
				 
				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search for something">
						<input class="button" type="submit" name="search" value="Search">
					</form>
				</div> 
				

			<!-- testing new search bar
				<div class="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input class="search_txt" type="text" name="user_query" placeholder="Search for something">
						<a class="search_btn" href="#">
							<i class="material-icons">search</i>
						</a>
					</form>
				</div> 
			-->

				</div>
			<!--Naivagation bar ends-->


			<!--Content wrapper starts-->
			<div class="content_wrapper">

				<div id="shopping_cart">
						<span style="float:right; font-size: 14px; padding: 5px; line-height: 40px;">

							<?php 
								if (isset($_SESSION['customer_email'])) {
									echo "<b>Welcome </b>". $_SESSION['customer_email'] . "<b>Your</b>";
								}
								else{
									echo "<b>Welcome Guest</b>";
								}

							?>

						 	 <b style="color: yellow">Shopping Cart:</b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="cart.php" style="text-decoration: none;">Go to Cart</a><br>

							<?php

							if (!isset($_SESSION['customer_email'])) {
								echo "<a href='checkout.php' style='text-decoration:none;'>Login</a>";
							}
							else{
								echo "<a href='logout.php'>Logout</a>";
							}

							 ?>

						</span>
					</div>

				<div id="sidebar">

					<div id="sidebar_title">Categories</div>
					
					<ul id="sidebar_style">
						
						<?php getCats(); ?>

					<ul>

					<div id="sidebar_title">Brands</div>
					
					<ul id="sidebar_style">
						<?php getBrands(); ?>

					<ul>

					
				</div>

				<div id="content_area">
					<?php cart(); ?>

					


					<div id="product_box">
							
						<?php getPro();	 ?>	
						<?php getCatPro(); ?>
						<?php getBrandPro(); ?>

					</div>


				</div>

			</div>	
			<!--Content wrapper ends-->

			<div id="footer">
				<h2 style="text-align:center; padding-top: 30px;">
					&copy; 2018 by TimeMastersts.co.za
				</h2>			

			</div>

		</div>
		<!--Main Container ends here-->

	</body>
</html>