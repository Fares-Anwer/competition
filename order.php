<?php require_once 'core/init.php'; ?>

<?php
if (isset($_GET['c_id'])) {
	$customer_id = $_GET['c_id'];

	$ip_add = $getFromU->getRealUserIp();
	$status = "pending";
	$invoice_no = mt_rand();

	$select_carts = $getFromU->select_events_by_ip($ip_add);
	foreach ($select_carts as $select_cart) {
		$product_id = $select_cart->p_id;
		$product_qty = $select_cart->qty;

		$product_price = $select_cart->product_price;
		$sub_total = $product_price * $product_qty;



		$delete_cart = $getFromU->delete_cart($ip_add);

		$_SESSION['order_sub_msg'] = "Your Order has been Submitted Successfully";
		header('Location: customer/my_account.php?my_orders');
	}
}

?>


