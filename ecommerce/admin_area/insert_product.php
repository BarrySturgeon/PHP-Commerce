<!DOCTYPE>
<?php 
	include("includes/db.php");
	if (!isset($_SESSION['user_email'])) {
		echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
	}
	else{

	
?>

<html>
	<head>
		<title>Inserting Product</title>
		<!--<link rel="stylesheet" href="/ecommerce/styles/style.css" media="all">	-->
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  		<script>tinymce.init({ selector:'textarea' });</script>

	</head>

<body bgcolor="gainsboro">
	

	<form action="insert_product.php" method="post" enctype="multipart/form-data">

		<table align="center" width="795" height="600" bgcolor="white">
			<tr align="center">
				<td colspan="7"><h2>Insert new Product:</h2></td>
			</tr>

			<tr>
				<td align="center"><b>Product Title:</b></td>
				<td><input type="text" name="product_title" size="60" required/></td>
			</tr>

			<tr>
				<td align="center"><b>Product Category:</b></td>
				<td>
					<select name="product_cat" required>
						<option>Select a Category</option>
						<?php 

						$get_cats = "select * from categories";

						$run_cats = mysqli_query($con, $get_cats);

						while ($row_cats = mysqli_fetch_array($run_cats)){
		
							$cat_id = $row_cats ['cat_id'];
							$cat_title = $row_cats ['cat_title'];

						echo "<option value='$cat_id'>$cat_title</a></option>";
						}
						?>

					</select>
				</td>
			</tr>

			<tr>
				<td align="center"><b>Product Brand:</b></td>
				<td>

					<select name="product_brand" required>
						<option>Select a Brand</option>
						<?php 

						$get_brands = "select * from brands";

						$run_brands = mysqli_query($con, $get_brands);

						while ($row_brands = mysqli_fetch_array($run_brands)){
		
							$brand_id = $row_brands ['brand_id'];
							$brand_title = $row_brands ['brand_title'];

						echo "<option value='$brand_id'>$brand_title</a></option>";
						}
						?>

					</select>
					
				</td>
			</tr>

			<tr>
				<td align="center"><b>Product Image:</b></td>
				<td><input type="file" name="product_image" required></td>
			</tr>	

			<tr>
				<td align="center"><b>Product Price:</b></td>
				<td><input type="number" name="product_price" required></td>
			</tr>

			<tr>
				<td align="center"><b>Product Description:</b></td>
				<td style="padding-right:25px"><textarea name="product_desc" cols="15" rows="10" ></textarea></td>
			</tr>

			<tr>
				<td align="center"><b>Product Keywords:</b></td>
				<td><input type="text" name="product_keywords" required size="60"></td>
			</tr>

			<tr>
				<td align="center"><b>Product Model Number:</b></td>
				<td><input type="text" name="product_model_num" required size="60"></td>
			</tr>

			<tr>
				<td align="center"><b>Product Branch:</b></td>
				<td >
					<select name="product_branch">
						<option value="1">1 - JHB Branch</option>
						<option value="2">2 - PTA:A Branch</option>
						<option value="3">3 - PTA:B Branch</option>
					</select>
				</td>

			</tr>

			<tr align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"></td>
			</tr>

		</table>
	</form>



</body>
</html>


<?php 
	
	if (isset($_POST['insert_post'])) {
		
		//getting text data from fields
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];
		$product_branch = $_POST['product_branch'];
		$product_model_num = $_POST['product_model_num'];

		//getting image
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];

		move_uploaded_file($product_image_tmp, "product_images/$product_image");

	  	$insert_product = "insert into products (product_cat,product_brand, product_title, product_price, product_desc, product_image, product_keywords, product_branch, product_model_num) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords', '$product_branch', '$product_model_num')";

	  	$insert_pro = mysqli_query($con, $insert_product);

	  	if ($insert_pro) {
	  		echo "<script>alert('Product has been inserted')</script>";
	  		echo "<script>window.open('index.php?insert_product','_self')</script>";

	  	}
	
		}


?>

<?php }  ?>