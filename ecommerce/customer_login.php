<?php 
	include("includes/db.php");
?>

<div>
	<form method="post" action="">
		<table width="500" align="center" bgcolor="ghostwhite" style="margin: auto; padding-top: 20px; border-radius: 50px; border-style: solid; border-width: 1px; border-color: dimgrey; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
			<tr align="center"> 
				<td colspan="3"><h2>Login or register to buy!</h2></td>
			</tr>
			<tr>
				<td align="right"><b>Email:</b></td>
				<td><input type="text" name="email" placeholder="Enter email" required></td>
			</tr>
			<tr>
				<td align="right"><b>Password:</b></td>
				<td><input type="password" name="pass" placeholder="Enter password" required></td>
			</tr>

			<tr align="center">
				<td colspan="3"><a href="checkout.php?forgot_pass" style="text-decoration: none; color: black;">Forgot password?</a></td>
			</tr>

			<tr align="center">
				<td colspan="3"><input type="submit" name="login" value="login"></td>
			</tr>


		</table>

		<h2 style="float: center;  margin: auto; padding-top: 30px;"><a href="customer_register.php" style="text-decoration: none; color: black;">New? Register here!</a></h2>

	</form>

	<?php 

	if (isset($_POST['login'])) {
		$c_email = $_POST['email'];
		$c_pass = $_POST['pass'];

		$sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
		$run_c = mysqli_query($con, $sel_c);

		$check_customer = mysqli_num_rows($run_c);

		if ($check_customer==0) {
			echo "<script>alert('Password or email is incorrect')</script>";
			exit();
		}

		$ip = getIp();
		$sel_cart = "select * from cart where ip_add = '$ip'";
		$run_cart = mysqli_query($con, $sel_cart);
		$check_cart = mysqli_num_rows($run_cart);

		if ($check_customer>0 AND $check_cart==0) {
			$_SESSION['customer_email'] = $c_email;
			echo "<script>alert('Successfully logged in!')</script>";
			echo "<script>window.open('customer/my_account.php', '_self')</script>";
		}else{
			$_SESSION['customer_email'] = $c_email;
			echo "<script>alert('Successfully logged in!')</script>";
			echo "<script>window.open('checkout.php', '_self')</script>";			
		}

	}


	?>


</div>