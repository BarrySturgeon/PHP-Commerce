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
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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

				<a href="../index.php"><img id="logo" src="images/logo.PNG"></a>

			</div>
			<!--Header ends here-->

			<!--Naivagation bar starts-->
			<div class="menubar" >


				<ul id="menu">
					<li><a href="../index.php">Home</li>
					<li><a href="../all_products.php">Products</li>
					<li><a href="customer/my_account.php">My Account</li>
					<li><a href="#">Sign Up</li>
					<li><a href="cart.php">Shopping Cart</li>
					<li><a href="#">Contact Us</li>
				</ul>
				
				 
				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search for something">
						<input type="submit" name="search" value="Search">
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

				<div id="sidebar">

					<div id="sidebar_title" style="text-decoration: none;">My Account</div>
					
					<ul id="sidebar_style">

						<!-- Function to get user image and dispaly it in user account, not needed. -->
						<?php 

							$user = $_SESSION['customer_email'];

							$get_img = "select * from customers where customer_email = '$user'";
							$run_img = mysqli_query($con, $get_img);
							$row_img = mysqli_fetch_array($run_img);
							$c_image = $row_img['customer_image'];

							$c_name = $row_img['customer_name'];


							echo ""; 

						?>

					
						
						<li><a href="my_account.php?my_orders">My Orders</a></li>
						<li><a href="my_account.php?edit_account">Edit Account</a></li>
						<li><a href="my_account.php?change_pass">Change Password</a></li>
						<li><a href="my_account.php?delete_account">Delete Account</a></li>
						<li><a href="logout.php?delete_account">Logout</a></li>

					<ul>

					

					
				</div>

				<div id="content_area">
					<?php cart(); ?>

					<div id="shopping_cart">
						<span style="float:right; font-size: 14px; padding: 5px; line-height: 40px;">

							<?php 
								if (isset($_SESSION['customer_email'])) {
									echo "<b>Welcome </b>". $_SESSION['customer_email'];
								}
							?>

						 	 

							<?php

							if (!isset($_SESSION['customer_email'])) {
								echo "<a href='checkout.php'>Login</a>";
							}
							else{
								echo "<a href='logout.php'>Logout</a>";
							}

							 ?>

						</span>
					</div>


					<div id="product_box">
							
						

						<?php 
							if (!isset($_GET['my_orders'])) {
								if (!isset($_GET['edit_account'])) {
									if (!isset($_GET['change_pass'])) {
										if (!isset($_GET['delete_account'])) {
														
								echo "<h2 style='padding: 20px;'>Welcome $c_name;</h2>
								<b>You can see your orders progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
									}
								}
								}
							}
						?>

						<?php 

							if (isset($_GET['edit_account'])) {
								include("edit_account.php");
							}

							if (isset($_GET['change_pass'])) {
								include("change_pass.php");
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