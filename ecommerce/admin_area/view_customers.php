<?php 
	if (!isset($_SESSION['user_email'])) {
		echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
	}
	else{

	
?>

<table width="798" align="center" style="background-color: white;">

	<tr align="center">
		<td colspan="6"><h2>View All Customers</h2></td>
	</tr>
	<tr align="center" >
		<th>S.N</th>
		<th>Name</th>
		<th>Email</th>
		<th>Delete</th>
	</tr>


	<?php 
		include("includes/db.php");

		$get_c = "select * from customers";
		$run_c = mysqli_query($con, $get_c);

		$i = 0;

		while ($row_c = mysqli_fetch_array($run_c)) {

			$c_id = $row_c['customer_id'];			
			$c_name = $row_c['customer_name'];
			$c_email = $row_c['customer_email'];
			$i++;
			
		
		

	?>



	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $c_name; ?></td>
		<td><?php echo $c_email; ?></td>
		<!--<td><img src="product_images/<?php echo $pro_image;?>" width="60" height="60"/></td>-->
		
		<td><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Delete</a></td>

	</tr>

	<?php } ?>
	
</table>

<?php } ?>