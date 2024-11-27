<?php require_once '../../core/init.php'; ?>


<?php

if (isset($_GET['enevt_id'])) {
	$enevt_id = $_GET['enevt_id'];

	$sql = "DELETE FROM events WHERE enevt_id = :enevt_id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":enevt_id", $enevt_id);
	if ($stmt->execute()) {
		$_SESSION['delete_enevt_msg'] = "enevt has been Deleted Successfully";
		header('Location: ../index.php?view_enevts');
	}
}
?>

