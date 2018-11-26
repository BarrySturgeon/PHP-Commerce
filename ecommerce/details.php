<!DOCTYPE> 
<?php 
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

				<img id="logo" src="images/logo.PNG">

			</div>
			<!--Header ends here-->

			<!--Naivagation bar starts-->
			<div class="menubar">


				<ul id="menu">
					<li><a href="#">Home</li>
					<li><a href="#">Products</li>
					<li><a href="#">My Account</li>
					<li><a href="#">Sign Up</li>
					<li><a href="#">Shopping Cart</li>
					<li><a href="#">Contact Us</li>
				</ul>

				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search for something">
						<input type="submit" name="search" value="Search">
					</form>
				</div>



				</div>
			<!--Naivagation bar ends-->


			<!--Content wrapper starts-->
			<div class="content_wrapper">

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

					<div id="shopping_cart">
						<span style="float:right; font-size: 18px; padding: 5px; line-height: 40px;">

							Welcome Guest! <b style="color: yellow">Shopping Cart:</b>Total Items: Total Price:<a href="cart.php">Go to Cart</a>

						</span>
					</div>

					<div id="product_box">
							
						<?php 

							if (isset($_GET['pro_id'])) {


							$product_id = $_GET['pro_id'];
							$get_pro = "select * from products where product_id ='$product_id'";
							$run_pro = mysqli_query($con, $get_pro);

							while ($row_pro=mysqli_fetch_array($run_pro)) {
							 	$pro_id = $row_pro['product_id'];
							 	$pro_title = $row_pro['product_title'];
							 	$pro_price = $row_pro['product_price'];
							 	$pro_image = $row_pro['product_image'];
							 	$pro_desc = $row_pro['product_desc'];

						 	echo "
					 		<div id='single_product'>
	 							<h3>$pro_title</h3>
	 							<img src='admin_area/product_images/$pro_image' width='400' height='300'/>
	 							<p><b> R $pro_price</b> </p>

	 							<p>$pro_desc</p>
	 				
	 							<a href = index.php style='float:left;'>Go Back</a>

	 							<a href = 'index.php?pro_id=$pro_id'><button style='float:right;'>Add to cart</button></a>

	 						</div>";
	 						}
	 						}
	 					?>	


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