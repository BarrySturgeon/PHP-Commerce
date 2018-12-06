



<div>
	<?php
		include("includes/db.php");
		$total = 0;
 		global $con;
 		$ip = getIp();
 		$sel_price = "select * from cart where ip_add='$ip'";
 		$run_price = mysqli_query($con, $sel_price);
 		while ($p_price=mysqli_fetch_array($run_price)) {
 			$pro_id = $p_price['p_id'];
 			$pro_price = "select * from products where product_id='$pro_id'";
 			$run_pro_price = mysqli_query($con, $pro_price);
 			while ($pp_price = mysqli_fetch_array($run_pro_price)) {
 				$product_price = array($pp_price['product_price']);
 				$product_name = $pp_price['product_title'];
 				$values = array_sum($product_price);
 				$total += $values;
 			}
 		}	

	?>



	
	<h2 align="center">Pay now with Payfast: </h2>	

	<form action="https://sandbox.payfast.co.za/eng/process" method="post" name="frmPay" id="frmPay">

	<!-- Receiver Details -->
	<input type="hidden" name="merchant_id" value="10009899">
	<input type="hidden" name="merchant_key" value="c54z7a6xpjuhn">


	<input type="hidden" name="return_url" value="">
	<input type="hidden" name="cancel_url" value="">
	<input type="hidden" name="notify_url" value="">

	<!-- Payer Details -->
	<input type="hidden" name="name_first" value="Bob">
	<input type="hidden" name="name_last" value="Smith">
	<input type="hidden" name="email_address" value="sbtu01@payfast.co.za"> 

	<!-- Transaction Details -->
	<input type="hidden" name="m_payment_id" value="">
	<input type="hidden" name="amount" value="<?php echo $total; ?>">
	<input type="hidden" name="item_name" value="<?php echo $product_name; ?>">
	<input type="hidden" name="item_description" value="">

	<!-- Transaction Options -->
	<input type="hidden" name="email_confirmation" value="">

	<!-- Security -->
	<!-- <input type="hidden" name="signature" value="<?php echo $md5; ?>">-->

	<input type="submit" name="submit" value="submit">

	</form>
	

	<p style="text-align: center;"><img src="payfast.jpg" width="200" height="150"></p>


</div>