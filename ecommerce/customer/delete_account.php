
<br>
<h2 style="text-align: center;">Do you really want to delete your account?</h2>
<form action="" method="post">


	<input type="submit" name="yes" value="Yes, delete my account">
	<input type="submit" name="no" value="No, I take it back">


	
</form>
	

<?php 
	include("includes/db.php");

		$user = $_SESSION['customer_email'];

		if (isset($_POST['yes'])) {
			$delete_customer = "delete from customers where customer_email='$user'";
			$run_customer = mysqli_query($con, $delete_customer);
			echo "<script>alert('We are sorry to see you go!')</script>";
			echo "<script>window.open('../index.php','_self')</script>";

		}

		if (isset($_POST['no'])) {
			echo "<script>alert('Glad to have you back!')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";
		}

?>