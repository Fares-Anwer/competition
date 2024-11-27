<?php require_once '../../core/init.php'; ?>


<?php

if (isset($_GET['product_id'])) {
	$product_id = $_GET['product_id'];

	$sql = "DELETE FROM events WHERE product_id = :product_id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":product_id", $product_id);
	if ($stmt->execute()) {
		$_SESSION['delete_product_msg'] = "Product has been Deleted Successfully";
		header('Location: ../index.php?view_events');
	}
}
?>

