<?php
	if (!isset($_SESSION['user_email'])) {
		echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
	}
	else{
?>

<table width="798" align="center" style="background-color: white; padding: 10px;">

	<tr align="center">
		<td colspan="6"><br><h2>View All Categories</h2><br></td>
	</tr>
	<tr align="center" >
		<th>Category Id</th>
		<th>Category Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>


	<?php 
		include("includes/db.php");

		$get_cat = "select * from categories";
		$run_cat = mysqli_query($con, $get_cat);

		$i = 0;

		while ($row_cat = mysqli_fetch_array($run_cat)) {

			$cat_id = $row_cat['cat_id'];			
			$cat_title = $row_cat['cat_title'];
			$i++;

	?>



	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $cat_title; ?></td>
		<td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
		<td><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>

	</tr>

	<?php } ?>
	
</table>

<?php } ?>