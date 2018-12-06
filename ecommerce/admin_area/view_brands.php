
<?php
	if (!isset($_SESSION['user_email'])) {
		echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
	}
	else{
?>

<table width="798" align="center" style="background-color: white; padding: 10px;">

	<tr align="center">
		<td colspan="6"><br><h2>View All Brands</h2><br></td>
	</tr>
	<tr align="center" >
		<th>Brand Id</th>
		<th>Brand Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>


	<?php 
		include("includes/db.php");

		$get_brand = "select * from brands";
		$run_brand = mysqli_query($con, $get_brand);

		$i = 0;

		while ($row_brand = mysqli_fetch_array($run_brand)) {

			$brand_id = $row_brand['brand_id'];			
			$brand_title = $row_brand['brand_title'];
			$i++;

	?>



	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $brand_title; ?></td>
		<td><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></td>
		<td><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">Delete</a></td>

	</tr>

	<?php } ?>
	
</table>

<?php } ?>